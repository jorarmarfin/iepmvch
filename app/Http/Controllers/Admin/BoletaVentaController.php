<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Caja;
use App\Models\CajaDetalle;
use App\Models\Producto;
use App\Models\Serie;
use Illuminate\Http\Request;
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
        $data['total_gravado'] = 0;
        $data['total_exonerado'] = 0;
        $data['total_venta'] = 0;
        $items = $data['items'];
        foreach ($items as $key => $item) {
            $producto = Producto::find($item['idproducto']);
            $items[$key]['preciounitario'] = $producto->precio;

            $subtotal = ($producto->precio*$item['cantidad']) - $item['descuento'];

            $items[$key]['montoigv'] = $subtotal*igv()/100;
            $items[$key]['subtotal'] = $subtotal;
            $items[$key]['total'] = $items[$key]['montoigv']+$items[$key]['subtotal'];
            $items[$key]['idtipoigv'] = EstadoId('TIPO IGV','Gravado-Operacion Onerosa');

            $data['total_gravado'] += $subtotal*igv()/100;
            $data['total_venta'] += $subtotal;
        }
        $data['total_venta'] += $data['total_gravado'];

        $serie = Serie::where('nombre','boleta')->first();
        $data['prefijo'] = $serie->prefijo;
        $data['serie'] = $serie->serie;
        $data['numero'] = $serie->nombre;
        //dd($items);
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
    public function edit($id)
    {
        //
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
