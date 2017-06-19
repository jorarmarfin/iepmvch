<?php

namespace App\Http\Controllers\Admin\Registro;

use App\Http\Controllers\Controller;
use App\Models\Capacidad;
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

        $altodecelda=5;
        $incremento = 100;
        $numMaxLineas = 10;
        $x = 0;
        $y = 0;
        $i = 0;

        foreach ($registros as $key => $registro) {
            if($i%$numMaxLineas==0 && $i!=0){
                PDF::AddPage('U', 'A4');
                Reportheader();
                $this->TituloColumnas($registro);
                $y = 0;
            }
            #
            PDF::SetXY($x+10, $y*$altodecelda+$incremento);
            PDF::SetFont('helvetica', '', 10);
            PDF::Cell(5, 5, $i+1, 1, 1, 'C');
            #
            PDF::SetXY($x+15, $y*$altodecelda+$incremento);
            PDF::SetFont('helvetica', '', 7);
            PDF::Cell(55, 5, $registro->alumno->nombre_completo, 1, 1, 'L',0,'',1);


            $y++;
            $i++;
        }


        PDF::Output(public_path('storage/tmp/')."Registro.pdf",'FI');
    }
    function TituloColumnas($registro){
        $y=45;
        $x=10;
        $capacidad = Capacidad::where('idpersonalasignatura',$registro->idpersonalasignatura)
                                ->where('idperiodoacademico',89)
                                ->get();
        $indicadores = Capacidad::select('capacidad.id','cd.nombre')
                                ->join('capacidad_detalle as cd','cd.idcapacidad','=','capacidad.id')
                                ->where('idpersonalasignatura',$registro->idpersonalasignatura)
                                ->where('idperiodoacademico',89)
                                ->orderBy('capacidad.id')
                                ->get();
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
        PDF::SetLineWidth(0.1);
        #
        PDF::SetXY($x+10, 20);
        PDF::SetFont('times', 'BI', 9);
        PDF::Cell(50, 5, 'Área :'.$registro->area.'/'.$registro->asignatura, 0, 0, 'C',0,'',1);
        #
        PDF::SetXY($x+70, 20);
        PDF::SetFont('times', 'BI', 9);
        PDF::Cell(40, 5, 'Grado :'.$registro->grado, 0, 0, 'C');
        #
        PDF::SetXY($x+130, 20);
        PDF::SetFont('times', 'BI', 9);
        PDF::Cell(20, 5, 'Ciclo :'.$registro->ciclo, 0, 0, 'C');
        #
        PDF::SetXY($x+180, 20);
        PDF::SetFont('times', 'BI', 9);
        PDF::Cell(70, 5, 'Profesor :'.$registro->profesor, 0, 0, 'C');
        #
        PDF::SetXY($x+5, 25);
        PDF::SetFont('times', 'BI', 11);
        PDF::Cell(120, 5, 'I Trimestre', 1, 1, 'C');
        #
        PDF::SetXY($x+5, 30);
        PDF::SetFont('times', 'BI', 11);
        PDF::Cell(55, 10, 'CAPACIDADES', 1, 1, 'C');
        #
        PDF::SetXY($x+5, 40);
        PDF::SetFont('times', '', 18);
        PDF::MultiCell(55, 60, 'Apellidos y Nombres ', 1, 'C', 0, 0, '', '', true, 0, false, true, 40, 'M');
        #
        PDF::StartTransform();
        PDF::SetXY($x, $y+55);
        PDF::SetFont('times', 'BI', 11);
        PDF::Rotate(90);
        PDF::Cell(70, 5, 'Nº DE ORDEN3', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::SetXY($x+60, 30);
        PDF::SetFont('times', '', 4);
        $capacidad1 = (array_key_exists(0,$capacidad->toArray())) ? $capacidad[0]->nombre : '' ;
        PDF::MultiCell(40, 10, $capacidad1, 1, 'C', 0, 0, '', '', true,1,false, true, 10, 'M');
        #
        PDF::SetXY($x+100, 30);
        PDF::SetFont('times', '', 4);
        $capacidad1 = (array_key_exists(1,$capacidad->toArray())) ? $capacidad[1]->nombre : '' ;
        PDF::MultiCell(40, 10, $capacidad1, 1, 'C', 0, 0, '', '', true,1,false, true, 10, 'M');
        #
        PDF::SetXY($x+140, 30);
        PDF::SetFont('times', '', 4);
        $capacidad1 = (array_key_exists(2,$capacidad->toArray())) ? $capacidad[2]->nombre : '' ;
        PDF::MultiCell(40, 10, $capacidad1, 1, 'C', 0, 0, '', '', true,1,false, true, 10, 'M');
        #
        PDF::SetXY($x+180, 30);
        PDF::SetFont('times', '', 4);
        $capacidad1 = (array_key_exists(3,$capacidad->toArray())) ? $capacidad[3]->nombre : '' ;
        PDF::MultiCell(40, 10, $capacidad1, 1, 'C', 0, 0, '', '', true,1,false, true, 10, 'M');
        #
        PDF::StartTransform();
        PDF::SetXY($x+60, $y+55);
        PDF::SetFont('times', '', 4);
        PDF::Rotate(90);
        $indicadores0 = (array_key_exists(0,$indicadores->toArray())) ? $indicadores[0]->nombre : '' ;
        PDF::MultiCell(60, 8, $indicadores0, 1, 'C', 0, 0, '', '', true,1,false, true, 8, 'M');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+68, $y+55);
        PDF::SetFont('times', '', 4);
        PDF::Rotate(90);
        $indicadores1 = (array_key_exists(1,$indicadores->toArray())) ? $indicadores[1]->nombre : '' ;
        PDF::MultiCell(60, 8, $indicadores1, 1, 'C', 0, 0, '', '', true,1,false, true, 8, 'M');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+76, $y+55);
        PDF::SetFont('times', '', 4);
        PDF::Rotate(90);
        $indicadores2 = (array_key_exists(2,$indicadores->toArray())) ? $indicadores[2]->nombre : '' ;
        PDF::MultiCell(60, 8, $indicadores2, 1, 'C', 0, 0, '', '', true,1,false, true, 8, 'M');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+84, $y+55);
        PDF::SetFont('times', '', 4);
        PDF::Rotate(90);
        $indicadores3 = (array_key_exists(3,$indicadores->toArray())) ? $indicadores[3]->nombre : '' ;
        PDF::MultiCell(60, 8, $indicadores3, 1, 'C', 0, 0, '', '', true,1,false, true, 8, 'M');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+92, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'NIVEL DEL LOGRO', 1, 0, 'C');
        PDF::StopTransform();
        #Capacidad 2
        PDF::StartTransform();
        PDF::SetXY($x+100, $y+55);
        PDF::SetFont('times', '', 4);
        PDF::Rotate(90);
        $indicadores4 = (array_key_exists(4,$indicadores->toArray())) ? $indicadores[4]->nombre : '' ;
        PDF::MultiCell(60, 8, $indicadores4, 1, 'C', 0, 0, '', '', true,1,false, true, 8, 'M');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+108, $y+55);
        PDF::SetFont('times', '', 4);
        PDF::Rotate(90);
        $indicadores5 = (array_key_exists(5,$indicadores->toArray())) ? $indicadores[5]->nombre : '' ;
        PDF::MultiCell(60, 8, $indicadores5, 1, 'C', 0, 0, '', '', true,1,false, true, 8, 'M');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+116, $y+55);
        PDF::SetFont('times', '', 4);
        PDF::Rotate(90);
        $indicadores6 = (array_key_exists(6,$indicadores->toArray())) ? $indicadores[6]->nombre : '' ;
        PDF::MultiCell(60, 8, $indicadores6, 1, 'C', 0, 0, '', '', true,1,false, true, 8, 'M');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+124, $y+55);
        PDF::SetFont('times', '', 4);
        PDF::Rotate(90);
        $indicadores7 = (array_key_exists(7,$indicadores->toArray())) ? $indicadores[7]->nombre : '' ;
        PDF::MultiCell(60, 8, $indicadores7, 1, 'C', 0, 0, '', '', true,1,false, true, 8, 'M');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+132, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'NIVEL DEL LOGRO', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+140, $y+55);
        PDF::SetFont('times', '', 4);
        PDF::Rotate(90);
        $indicadores8 = (array_key_exists(8,$indicadores->toArray())) ? $indicadores[8]->nombre : '' ;
        PDF::MultiCell(60, 8, $indicadores8, 1, 'C', 0, 0, '', '', true,1,false, true, 8, 'M');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+148, $y+55);
        PDF::SetFont('times', '', 4);
        PDF::Rotate(90);
        $indicadores9 = (array_key_exists(9,$indicadores->toArray())) ? $indicadores[9]->nombre : '' ;
        PDF::MultiCell(60, 8, $indicadores9, 1, 'C', 0, 0, '', '', true,1,false, true, 8, 'M');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+156, $y+55);
        PDF::SetFont('times', '', 4);
        PDF::Rotate(90);
        $indicadores10 = (array_key_exists(10,$indicadores->toArray())) ? $indicadores[10]->nombre : '' ;
        PDF::MultiCell(60, 8, $indicadores10, 1, 'C', 0, 0, '', '', true,1,false, true, 8, 'M');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+164, $y+55);
        PDF::SetFont('times', '', 4);
        PDF::Rotate(90);
        $indicadores11 = (array_key_exists(11,$indicadores->toArray())) ? $indicadores[11]->nombre : '' ;
        PDF::MultiCell(60, 8, $indicadores11, 1, 'C', 0, 0, '', '', true,1,false, true, 8, 'M');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+172, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'NIVEL DEL LOGRO', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+180, $y+55);
        PDF::SetFont('times', '', 4);
        PDF::Rotate(90);
        $indicadores12 = (array_key_exists(12,$indicadores->toArray())) ? $indicadores[12]->nombre : '' ;
        PDF::MultiCell(60, 8, $indicadores12, 1, 'C', 0, 0, '', '', true,1,false, true, 8, 'M');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+188, $y+55);
        PDF::SetFont('times', '', 4);
        PDF::Rotate(90);
        $indicadores13 = (array_key_exists(13,$indicadores->toArray())) ? $indicadores[13]->nombre : '' ;
        PDF::MultiCell(60, 8, $indicadores13, 1, 'C', 0, 0, '', '', true,1,false, true, 8, 'M');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+196, $y+55);
        PDF::SetFont('times', '', 4);
        PDF::Rotate(90);
        $indicadores14 = (array_key_exists(14,$indicadores->toArray())) ? $indicadores[14]->nombre : '' ;
        PDF::MultiCell(60, 8, $indicadores14, 1, 'C', 0, 0, '', '', true,1,false, true, 8, 'M');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+204, $y+55);
        PDF::SetFont('times', '', 4);
        PDF::Rotate(90);
        $indicadores15 = (array_key_exists(15,$indicadores->toArray())) ? $indicadores[15]->nombre : '' ;
        PDF::MultiCell(60, 8, $indicadores15, 1, 'C', 0, 0, '', '', true,1,false, true, 8, 'M');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+212, $y+55);
        PDF::SetFont('times', '', 9);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'NIVEL DEL LOGRO', 1, 0, 'C');
        PDF::StopTransform();
        #
        PDF::StartTransform();
        PDF::SetXY($x+220, $y+55);
        PDF::SetFont('times', '', 8);
        PDF::Rotate(90);
        PDF::Cell(60, 8, 'PROMEDIO DE LOGRO DE COMPETENCIAS', 1, 0, 'C',0,'',1);
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
        PDF::Cell(60, 8, 'PROMEDIO TRIMESTRAL', 1, 0, 'C');
        PDF::StopTransform();
        #




        PDF::SetLineWidth(0.2);
    }
}
