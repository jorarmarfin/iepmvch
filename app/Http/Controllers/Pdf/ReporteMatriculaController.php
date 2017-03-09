<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Matricula;
use Illuminate\Http\Request;
use PDF;
class ReporteMatriculaController extends Controller
{
    public function reporte()
    {
    	PDF::SetTitle('Listado de Matricula');
    	PDF::AddPage('U','A4');
    	Reportheader();


        $altodecelda=5;
        $incremento = 50;
        $numMaxLineas = 44;
        $x = 15;
        $y = 0;
        $i = 0;
        $matriculas = Matricula::Activas()->orderBy('idgrado')->OrderBy('paterno')->get();
        $this->TituloColumnas();
        foreach ($matriculas as $key => $matricula) {
            if($i%$numMaxLineas==0 && $i!=0){
                PDF::AddPage('U', 'A4');
                Reportheader();
                $this->TituloColumnas();
                $y = 0;
            }
            #
            PDF::SetXY($x+10, $y*$altodecelda+$incremento);
            PDF::SetFont('helvetica', '', 10);
            PDF::Cell(10, 5, $i+1, 1, 0, 'C');
            #
            PDF::SetXY($x+20, $y*$altodecelda+$incremento);
            PDF::SetFont('helvetica', '', 11);
            PDF::Cell(30, 5, $matricula->grado, 1, 1, 'L');
            #
            PDF::SetXY($x+50, $y*$altodecelda+$incremento);
            PDF::SetFont('helvetica', '', 11);
            PDF::Cell(90, 5, $matricula->paterno.'-'.$matricula->materno.', '.$matricula->nombres, 1, 1, 'L');

            $y++;
            $i++;
        }


    	PDF::Output(public_path('storage/tmp/')."Listado_matricula.pdf",'FI');
    }
    function TituloColumnas(){
        $y=45;
        $x=15;

        #TITULO REPORTE
        PDF::SetXY(35,32);
        PDF::SetTextColor(255,0,0);
        PDF::SetFont('helvetica','BI',12);
        PDF::Cell(150,5,"Listado de Matricula por grado",0,2,'C');
        #
        PDF::SetXY(35,29);
        PDF::SetTextColor(255,0,0);
        PDF::SetFont('helvetica','B',12);
        PDF::Cell(150,5,'',0,2,'C');

        PDF::SetTextColor(0);
        #
        PDF::SetLineWidth(0.5);
        #
        PDF::SetXY($x+10, $y);
        PDF::SetFont('times', 'BI', 11);
        PDF::Cell(10, 5, 'Nº', 1, 0, 'C');
        #
        PDF::SetXY($x+20, $y);
        PDF::SetFont('times', 'BI', 11);
        PDF::Cell(30, 5, 'GRADO', 1, 1, 'C');
        #
        PDF::SetXY($x+50, $y);
        PDF::SetFont('times', 'BI', 11);
        PDF::Cell(90, 5, 'APELLIDOS Y NOMBRES', 1, 1, 'C');
        #
        PDF::SetLineWidth(0.2);
    }
}
