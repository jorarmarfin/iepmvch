@extends('layouts.base')

@section('content')
@include('alerts.errors')
<div class="row">
    <div class="col-md-12">
        {!! Alert::render() !!}
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-table"></i>
                    Alumno : {{ $evaluacionpadres->matricula->alumno->nombre_completo }}
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
            {!! Form::model($evaluacionpadres,['route'=>['docentes.padres.update',$evaluacionpadres],'method'=>'PUT']) !!}
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th colspan="4"> ESCALA DE CALIFICACION DE PADRES DE FAMILIA </th>
                            </tr>
                            <tr>
                                <th> C </th>
                                <th> B </th>
                                <th> A </th>
                                <th> AD </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> Nunca </td>
                                <td> algunas Veces </td>
                                <td> Casi Siempre </td>
                                <td> Siempre </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped table-hover table-bordered table-condensed" id="Asignaturas">
                        <thead>
                            <tr>
                                <th> Acciones Principales </th>
                                <th> Calificar </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> Envía al Estudiante todos los dias con el uniforme </td>
                                <td> {!!Form::textnota('ap1' );!!} </td>
                            </tr>
                            @if (!str_contains($evaluacionpadres->matricula->grado_matriculado, 'Inicial'))
                                <tr>
                                    <td> Envía al Estudiante con el uniforme deportivo solo cuando tiene educacion fisica o taller </td>
                                    <td> {!!Form::textnota('ap2' );!!} </td>
                                </tr>
                            @endif
                            <tr>
                                <td> Se asegura que el estudiante asista bien aseado y peinado a la I.E.P. (corte escolar - varones) </td>
                                <td> {!!Form::textnota('ap3' );!!} </td>
                            </tr>
                            <tr>
                                <td> Está al pendiente que el estudiante cumpla con todas las areas academicas asignadas </td>
                                <td> {!!Form::textnota('ap4' );!!} </td>
                            </tr>
                            <tr>
                                <td> Está al pendiente que el estudiante asista a clases con todos sus materiales y utiles para trabajar </td>
                                <td> {!!Form::textnota('ap5' );!!} </td>
                            </tr>
                            <tr>
                                <td> Está al pendiente que el estudiante que el estudiante conserve en buen estado sus materiales escolares </td>
                                <td> {!!Form::textnota('ap6' );!!} </td>
                            </tr>
                            <tr>
                                <td> Está al pendiente del desempeño escolar del estudiante y se involucra en el proceso de aprendizaje </td>
                                <td> {!!Form::textnota('ap7' );!!} </td>
                            </tr>
                            <tr>
                                <td> Asiste a la I.E.P. regularmente a preguntarle a los profesores sobre la conducta del estudiante </td>
                                <td> {!!Form::textnota('ap8' );!!} </td>
                            </tr>
                            <tr>
                                <td> Asiste a las reuniones de padres de familia y escuela de padres </td>
                                <td> {!!Form::textnota('ap9' );!!} </td>
                            </tr>
                            <tr>
                                <td> Atiende las indicaciones y sugerencias de los docentes </td>
                                <td> {!!Form::textnota('ap10' );!!} </td>
                            </tr>
                            <tr>
                                <td> Asiste a las citaciones de la I.E.P. (Docentes, Psicologia y Dirección) </td>
                                <td> {!!Form::textnota('ap11' );!!} </td>
                            </tr>
                            <tr>
                                <td> Revisa y firma el cuaderno de control diariamente de manera responsable </td>
                                <td> {!!Form::textnota('ap12' );!!} </td>
                            </tr>
                        </tbody>
                    </table>
                {!! Field::textarea('comentario',null,['label'=>'Comentario y recomendaciones del Tutor','placeholder'=>'Ingrese comentario del tutor']) !!}
                    {!!Form::enviar('Guardar')!!}
                </div><!--/span-->
            </div><!--/row-->
            {!! Form::close() !!}
            </div><!--/Porlet Body-->
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>

@stop
@section('js-scripts')
<script>
$(document).ready(function() {


    $('#Asignaturas').dataTable({
        "language": {
            "emptyTable": "No hay datos disponibles",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
            "search": "Buscar Alumnos :",
            "lengthMenu": "_MENU_ registros",
            "infoFiltered": " - filtrado para _MAX_ registros"
        },
        "lengthMenu": [ 25, 50, 75, 100 ],
        "bProcessing": true,
        "pagingType": "bootstrap_full_number",
        "order": [],
        "info":false,
        "paging":false,
        "bFilter":false

    });

});
</script>
@stop

@section('plugins-styles')
{!! Html::style(asset('assets/global/plugins/bootstrap-table/bootstrap-table.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/datatables/datatables.min.css')) !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
@stop

@section('plugins-js')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-table/bootstrap-table.min.js') !!}
{!! Html::script(asset('assets/global/plugins/select2/js/select2.full.min.js')) !!}
{!! Html::script(asset('assets/global/plugins/select2/js/i18n/es.js')) !!}
{!! Html::script('assets/global/scripts/datatable.js') !!}
{!! Html::script('assets/global/plugins/datatables/datatables.min.js') !!}
{!! Html::script('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}

@stop


@section('menu-user')
@include('menu.profile-admin')
@stop

@section('sidebar')
@include(Auth::user()->menu)
@stop


@section('user-name')
{!!Auth::user()->name!!}
@stop

@section('breadcrumb')
@stop


@section('page-title')
Evaluacion de la participacion de los padres de familia y recomendaciones del tutor
@stop

@section('page-subtitle')
@stop