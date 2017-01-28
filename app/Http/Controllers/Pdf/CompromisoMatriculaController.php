<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Matricula;
use Illuminate\Http\Request;
use PDF;
class CompromisoMatriculaController extends Controller
{
    public function compromisomatricula($id)
    {
    	$matricula = Matricula::find($id);
    	PDF::SetTitle('Compromiso de matricula');
        PDF::AddPage('U','A4');
        ReportHeader();
        #
        PDF::SetXY(20,35);
        PDF::SetFont('helvetica','',22);
        PDF::Cell(170,15,"Compromiso de Matricula $matricula->year",0,0,'C');




        PDF::Output(public_path('storage/tmp/').'compromiso.pdf','FI');
    }
}
