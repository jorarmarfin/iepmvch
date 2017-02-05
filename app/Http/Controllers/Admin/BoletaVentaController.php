<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Caja;
use App\Models\CajaDetalle;
use App\Models\Institucion;
use App\Models\Producto;
use App\Models\Serie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Storage;
use File;
use Styde\Html\Facades\Alert;

class BoletaVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lista = Caja::OrderBy('id','desc')->get();
        return view('admin.boletaventa.index',compact('Lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.boletaventa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['total_descuentos'] = 0;
        $data['total_gravado'] = 0;
        $data['total_exonerado'] = 0;
        $data['total_venta'] = 0;
        $data['sumatoria_igv'] = 0;
        $items = $data['items'];
        $date = Carbon::now();
        foreach ($items as $key => $item) {
            $producto = Producto::find($item['idproducto']);
            $items[$key]['preciounitario'] = $producto->precio;

            $subtotal = ($producto->precio*$item['cantidad']) - $item['descuento'];

            $items[$key]['montoigv'] = $subtotal*igv()/100;
            $items[$key]['subtotal'] = $subtotal;
            $items[$key]['total'] = $items[$key]['montoigv']+$items[$key]['subtotal'];
            $items[$key]['idtipoigv'] = EstadoId('TIPO IGV','Gravado-Operacion Onerosa');
            $items[$key]['created_at'] = $date;
            $items[$key]['updated_at'] = $date;

            $data['total_descuentos'] += $item['descuento'];
            $data['total_gravado'] += $subtotal;
            $data['sumatoria_igv'] += $subtotal*igv()/100;
        }
        $data['total_venta'] = $data['total_gravado'] + $data['sumatoria_igv'];

        $serie = Serie::where('nombre','boleta')->first();
        $data['prefijo'] = $serie->prefijo;
        $data['serie'] = $serie->serie;
        $data['numero'] = $serie->nombre;
        dd($items);
        $caja = Caja::create($data);
        if ($caja->id>0) {
            foreach ($items as $key => $item) {
                $items[$key]['idcaja'] = $caja->id;
            }
            if(CajaDetalle::insert($items)){
                Alert::success('Boleta de venta Registrada con exito');
                return redirect()->route('admin.boletaventa.index');
            }
        }else{
            Alert::danger('Error');
            return redirect()->route('admin.boletaventa.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.boletaventa.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function file($id)
    {
        #Cabecera
        $institucion = Institucion::select('ruc')->first();
        $serie = Serie::where('nombre','boleta')->first();
        $caja = Caja::with('detalles')->find($id);

        $name = 'app/public/boletaventa/';
        $name .= $institucion->ruc.'-'.$serie->prefijo.pad($serie->serie,3,'0','L').'-'.pad($caja->numero,8,'0','L');
        $file = storage_path("$name.cab");
        $cursor = fopen($file, "w+");
        $content = $caja->codigo_operacion;
        $content .= '|'.$caja->fechaemision;
        $content .= '|0';
        $content .= '|'.$caja->codigo_identificacion;
        $content .= '|'.$caja->numidentificacion;
        $content .= '|'.str_clean($caja->razonsocial);
        $content .= '|'.$caja->codigo_moneda;
        $content .= '|'.$caja->descuento_global;
        $content .= '|'.$caja->sumatoria_otros_cargos;
        $content .= '|'.$caja->total_descuentos;
        $content .= '|'.$caja->total_gravado;
        $content .= '|'.$caja->total_inafecto;
        $content .= '|'.$caja->total_exonerado;
        $content .= '|'.$caja->sumatoria_igv;
        $content .= '|'.$caja->sumatoria_isc;
        $content .= '|'.$caja->sumatoria_otros_tributos;
        $content .= '|'.$caja->total_venta;
        if (is_writable($file)) {
            if (!$gestor = fopen($file, 'a')) {
                 echo "No se puede abrir el archivo ($file)";
                 exit;
            }
            fwrite($gestor, $content."\r\n");
            fclose($gestor);
        }
        #Detalle
        $name = $institucion->ruc.'-'.$serie->prefijo.pad($serie->serie,3,'0','L').'-'.pad($caja->numero,8,'0','L').'.det';
        Storage::disk('boletaventa')->put($name,'');
        $items = $caja->detalles;
        //dd($items);
        $tiemscontent = '';
        $items = $items->each(function ($item,$key)use($name){
            $itemcontent = $item->producto->codigo_unidad_medida;
            $itemcontent .= '|'.$item->cantidad;
            $itemcontent .= '|';
            $itemcontent .= '|';
            $itemcontent .= '|'.$item->producto->nombre;
            $itemcontent .= '|'.$item->preciounitario;
            $itemcontent .= '|'.$item->descuento;
            $itemcontent .= '|'.$item->montoigv;

            Storage::disk('boletaventa')->append($name, $itemcontent);
        });

        //return $file;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
