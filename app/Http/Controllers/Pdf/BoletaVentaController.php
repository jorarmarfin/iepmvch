<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Caja;
use App\Models\Institucion;
use App\Models\Serie;
use App\Services\NumberToLetterConverter;
use Illuminate\Http\Request;
use PDF;
class BoletaVentaController extends Controller
{
    public function show($id)
    {
        $institucion = Institucion::first();
        $caja = Caja::with('detalles')->find($id);
        $serie = Serie::where('nombre','boleta')->first();
        $items = $caja->detalles;
    	PDF::SetTitle('Recibo de matricula');
        PDF::AddPage('U','A4');
        ReportHeaderBoletaVenta($fecha=false);


        #RUC
        PDF::SetXY(150,10);
        PDF::SetFont('times','B',13);
        PDF::Cell(50,5,"BOLETA DE VENTA",0,0,'C');
        PDF::SetXY(150,15);
        PDF::Cell(50,5,"ELECTRONICA",0,0,'C');
        PDF::SetXY(150,20);
        PDF::Cell(50,5,"RUC: $institucion->ruc",0,0,'C');
        PDF::SetFont('times','B',12);
        PDF::SetXY(150,27);
        PDF::Cell(50,5,$serie->prefijo.pad($caja->serie,3,'0','L').'-'.pad($caja->numero,8,'0','L'),0,0,'C');

        PDF::SetXY(20,40);
        PDF::Cell(180,20,"",1,0,'C');
        #Razon social
        PDF::SetXY(20,40);
        PDF::SetFont('times','B',10);
        PDF::Cell(20,5,'Señor (es): ',0,0,'R');
        #Razon social
        PDF::SetXY(40,40);
        PDF::SetFont('times','',10);
        PDF::Cell(100,5,$caja->razonsocial,0,0,'L');
        #
        PDF::SetXY(20,45);
        PDF::SetFont('times','B',9);
        PDF::Cell(20,5,'DNI : ',0,0,'R');
        #
        PDF::SetXY(40,45);
        PDF::SetFont('times','',9);
        PDF::Cell(100,5,$caja->numidentificacion,0,0,'L');
        #
        PDF::SetXY(20,50);
        PDF::SetFont('times','B',9);
        PDF::Cell(20,5,'Direccion : ',0,0,'R');
        #
        PDF::SetXY(40,50);
        PDF::SetFont('times','',9);
        PDF::Cell(100,5,$caja->direccion,0,0,'L');
        #
        PDF::SetXY(20,55);
        PDF::SetFont('times','B',9);
        PDF::Cell(20,5,'Alumno : ',0,0,'R');
        #
        PDF::SetXY(40,55);
        PDF::SetFont('times','',9);
        PDF::Cell(100,5,$caja->matricula->alumno->nombre_completo
            .'('.$caja->matricula->grado_matriculado.')',0,0,'L');
        #
        #Fecha de emision
        PDF::SetXY(140,40);
        PDF::SetFont('times','B',10);
        PDF::Cell(30,5,'Fecha de emision: ',0,0,'R');
        #Fecha de emision
        PDF::SetXY(170,40);
        PDF::SetFont('times','',10);
        PDF::Cell(30,5,$caja->fechaemision,0,0,'L');
        #Fecha de emision
        PDF::SetXY(140,45);
        PDF::SetFont('times','B',10);
        PDF::Cell(30,5,'Moneda: ',0,0,'R');
        #Fecha de emision
        PDF::SetXY(170,45);
        PDF::SetFont('times','',10);
        PDF::Cell(30,5,$caja->moneda,0,0,'L');


        #Items
        $this->TitulosItems();

        $altodecelda=10;
        $incremento = 80;

        $items = $items->each(function ($item,$key) use($altodecelda,$incremento){
            PDF::SetXY(20,$key*$altodecelda+$incremento);
            PDF::SetFont('times','',10);
            PDF::Cell(20,10,$item->cantidad,1,0,'C');

            PDF::SetXY(40,$key*$altodecelda+$incremento);
            PDF::SetFont('times','',10);
            PDF::Cell(100,10,$item->producto->nombre,1,0,'L');

            PDF::SetXY(140,$key*$altodecelda+$incremento);
            PDF::SetFont('times','',10);
            PDF::Cell(20,10,'S/.'.$item->preciounitario,1,0,'R');

            PDF::SetXY(160,$key*$altodecelda+$incremento);
            PDF::SetFont('times','',10);
            PDF::Cell(20,10,'S/.'.$item->descuento,1,0,'R');

            PDF::SetXY(180,$key*$altodecelda+$incremento);
            PDF::SetFont('times','',10);
            PDF::Cell(20,10,'S/.'.$item->subtotal,1,0,'R');
        });
        $sub_x = $items->count()*20;
        #Total
        PDF::SetXY(150,$incremento+$sub_x);
        PDF::SetFont('times','B',10);
        PDF::Cell(30,10,'Importe Total:',1,0,'R');
        #total
        PDF::SetXY(180,$incremento+$sub_x);
        PDF::SetFont('times','',10);
        PDF::Cell(20,10,'S/.'.$caja->total_venta,1,0,'R');
        #Son
        $convert = new NumberToLetterConverter();

        PDF::SetXY(20,$incremento+$sub_x+20);
        PDF::Cell(180,20,"",1,0,'C');

        PDF::SetXY(20,$incremento+$sub_x+20);
        PDF::SetFont('times','B',10);
        PDF::Cell(180,5,'Son: '.$convert->to_word($caja->total_venta),0,0,'L');

        PDF::SetXY(20,$incremento+$sub_x+25);
        PDF::SetFont('times','',9);
        PDF::Cell(180,5,'Usted puede verificar la validez de su boleta de venta en la siguiente direccion',0,1,'L');
        PDF::SetXY(20,$incremento+$sub_x+30);
        PDF::Cell(180,5,'http://www.sunat.gob.pe/ol-ti-itconsvalicpe/ConsValiCpe.htm',0,0,'L');


        PDF::Output(public_path('storage/tmp/').'boletaventa.pdf','FI');
    }
    public function TitulosItems()
    {
        $y = 70;
        PDF::SetXY(20,$y);
        PDF::SetFont('times','B',10);
        PDF::Cell(20,10,'Cantidad',1,0,'C');

        PDF::SetXY(40,$y);
        PDF::SetFont('times','B',10);
        PDF::Cell(100,10,'Descripcion',1,0,'C');

        PDF::SetXY(140,$y);
        PDF::SetFont('times','B',10);
        PDF::Cell(20,10,'PU',1,0,'C');

        PDF::SetXY(160,$y);
        PDF::SetFont('times','B',10);
        PDF::Cell(20,10,'Descuento',1,0,'C');

        PDF::SetXY(180,$y);
        PDF::SetFont('times','B',10);
        PDF::Cell(20,10,'Subtotal',1,0,'C');
    }
}
