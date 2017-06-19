<?php

namespace App\Http\Controllers\Admin\Registro;

use App\Http\Controllers\Controller;
use App\Models\Catalogo;
use App\Models\Grado;
use App\Models\GradoSeccion;
use App\Models\Matricula;
use App\Models\Registro;
use Illuminate\Http\Request;
use PDF;
class RegistroController extends Controller
{
    public function index()
    {
    	$niveles = Catalogo::select('id','nombre')->Table('NIVEL EDUCATIVO')->get();
        return view('admin.registro.index',compact('niveles'));
    }
    public function reporte($idnivel)
    {
    	return view('admin.registro.reporte',compact('idnivel'));
    }
    public function pdf($idnivel)
    {
    	$grados = Grado::where('idnivel',$idnivel)->where('activo',1)->get();

    	$gradoseccion = GradoSeccion::whereIn('idgrado',$grados->pluck('id'))->get();
    	$matriculas = Matricula::whereIn('idgradoseccion',$gradoseccion->pluck('id'))->get();
    	$registros = Registro::whereIn('idmatricula',$matriculas->pluck('id'))
    						 ->where('idperiodoacademico',89)->get();

    	PDF::SetTitle('Registro de Notas');
        PDF::AddPage('L','A4');

        $this->TituloColumnas($registros[0]);

        PDF::Output(public_path('storage/tmp/')."Registro.pdf",'FI');
    }
    function TituloColumnas($registro){
        $y=45;
        $x=10;
        #INSIGNEA
        PDF::Image(asset('assets/pages/img/insignia.jpg'),15,10,9);
        #TITULO REPORTE
        PDF::SetXY(35,10);
        PDF::SetTextColor(255,0,0);
        PDF::SetFont('helvetica','BI',12);
        PDF::Cell(150,5,"Registro Oficial de Evaluación del nivel ".$registro->nivel." de la IEP. MVCH - 2017",0,2,'C');
        #
        PDF::SetXY(35,29);
        PDF::SetTextColor(255,0,0);
        PDF::SetFont('helvetica','B',12);
        PDF::Cell(150,5,'',0,2,'C');

        PDF::SetTextColor(0);
        #
        PDF::SetLineWidth(0.5);
        #
        PDF::SetXY($x+10, 20);
        PDF::SetFont('times', 'BI', 9);
        PDF::Cell(50, 5, 'Área :'.$registro->area.'/'.$registro->asignatura, 1, 0, 'C',0,'',1);
        #
        PDF::SetXY($x+70, 20);
        PDF::SetFont('times', 'BI', 9);
        PDF::Cell(40, 5, 'Grado :'.$registro->grado, 1, 0, 'C');
        #
        PDF::SetXY($x+130, 20);
        PDF::SetFont('times', 'BI', 9);
        PDF::Cell(20, 5, 'Ciclo :'.$registro->ciclo, 1, 0, 'C');
        #
        PDF::SetXY($x+180, 20);
        PDF::SetFont('times', 'BI', 9);
        PDF::Cell(70, 5, 'Profesor :'.$registro->profesor, 1, 0, 'C');
        #
        PDF::SetXY($x+5, 25);
        PDF::SetFont('times', 'BI', 11);
        PDF::Cell(55, 5, 'Trimestre', 1, 1, 'C');
        #
        PDF::SetXY($x+5, 30);
        PDF::SetFont('times', 'BI', 11);
        PDF::Cell(55, 10, 'CAPACIDADES', 1, 1, 'C');
        #
        PDF::StartTransform();
        PDF::SetXY($x, $y+55);
        PDF::SetFont('times', 'BI', 11);
        PDF::Rotate(90);
        PDF::Cell(70, 5, 'Nº DE ORDEN3', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::SetXY($x+60, 30);
        PDF::SetFont('times', '', 9);
        PDF::Cell(40, 10, 'CAPACIDAD 1', 1, 1, 'C',0,'',1);
        #
        PDF::SetXY($x+5, 40);
        PDF::SetFont('times', '', 18);
        //PDF::MultiCell(55, 60, 'Apellidos y Nombres', 1, 'C', 0, 1, '', '', true);
        PDF::MultiCell(55, 60, 'Apellidos y Nombres ', 1, 'C', 0, 0, '', '', true, 0, false, true, 40, 'M');
        #
        PDF::SetXY($x+100, 30);
        PDF::SetFont('times', '', 9);
        PDF::Cell(40, 10, 'CAPACIDAD 1', 1, 1, 'C');
        #
        PDF::SetXY($x+140, 30);
        PDF::SetFont('times', '', 9);
        PDF::Cell(40, 10, 'CAPACIDAD 1', 1, 1, 'C');
        #
        PDF::SetXY($x+180, 30);
        PDF::SetFont('times', '', 9);
        PDF::Cell(40, 10, 'CAPACIDAD 1', 1, 1, 'C');
        #
        PDF::StartTransform();
        PDF::SetXY($x+60, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+68, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+76, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+84, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+92, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #Capacidad 2
        PDF::StartTransform();
        PDF::SetXY($x+100, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+108, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+116, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+124, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+132, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+140, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+148, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+156, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+164, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+172, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+180, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+188, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+196, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+204, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+212, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'Indicador', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+220, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'PROMEDIO DE LOGRO DE COMPETENCIAS', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+228, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'EVALUACIÓN TRIMESTRAL', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+236, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'NIVEL DE LOGRO', 1, 0, 'C');
        PDF::StopTransform();
        #




        PDF::SetLineWidth(0.2);
    }
}
