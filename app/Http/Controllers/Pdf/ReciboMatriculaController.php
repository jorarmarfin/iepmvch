<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Institucion;
use Illuminate\Http\Request;
use PDF;
class ReciboMatriculaController extends Controller
{
    public function recibomatricula($id)
    {
        $institucion = Institucion::first();
    	PDF::SetTitle('Recibo de matricula');
        PDF::AddPage('L','A5');
        ReportHeaderRecibo();

        PDF::SetXY(150,10);
        PDF::Cell(50,25,"",1,0,'C');
        #RUC
        PDF::SetXY(150,10);
        PDF::SetFont('helvetica','B',13);
        PDF::Cell(50,5,"BOLETA DE VENTA",0,0,'C');
        PDF::SetXY(150,15);
        PDF::Cell(50,5,"ELECTRONICA",0,0,'C');
        PDF::SetXY(150,20);
        PDF::Cell(50,5,"RUC: $institucion->ruc",0,0,'C');
        PDF::SetFont('helvetica','',12);
        PDF::SetXY(150,27);
        PDF::Cell(50,5,"FA14 - 018616",0,0,'C');

        PDF::Output(public_path('storage/tmp/').'recibo.pdf','FI');
    }

}
