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
                    Ingreso de Actitud
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
{!! Form::open(['route'=>'docentes.actitud.ingresa','method'=>'POST']) !!}
                        <table class="table table-striped table-hover table-bordered table-condensed" id="Practicas">
                            <thead>
                                <tr>
                                    <th> Periodo </th>
                                    <th> Alumno </th>
                                    <th> Participa en Cases</th>
                                    <th> Cumple con las tareas Oportunamente</th>
                                    <th> Presenta y mantiene el cuaderno al dia</th>
                                    <th> Se esfuerza por superar sus errores</th>
                                    <th> Evidencia una correcta caligrafia, ortografia, orden y limpieza</th>
                                    <th> Promedio</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($practicaresumen as $item)
                                <tr>
                                    <td> {{ $item->periodo_academico }} </td>
                                    <td> {{ $item->alumno->nombre_completo }} </td>
                                        {!!Form::hidden('id['.$loop->index.']',$item->id);!!}
                                    @for ($i = 0; $i < 5; $i++)
                                    <td>
                                        @if (ActitudActiva($item->idperiodoacademico,$i+1))
                                            {!!Form::textnota('ac_'.pad($i+1,2,'0','L').'['.$loop->index.']', $item['ac_'.pad($i+1,2,'0','L')] );!!}
                                        @else
                                            {{ $item['ac_'.pad($i+1,2,'0','L')] }}
                                        @endif
                                    </td>
                                    @endfor
                                    <td> {{ $item->promedio_actitud }} </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    {!!Form::enviar('Guardar')!!}
{!! Form::close() !!}
                    </div><!--/span-->
                </div><!--/row-->

            </div><!--/Porlet Body-->
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>

@stop
@section('js-scripts')
<script>
$(document).ready(function() {

    $('#Practicas').dataTable({
        "language": {
            "emptyTable": "No hay datos disponibles",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
            "search": "Buscar :",
            "lengthMenu": "_MENU_ registros",
            "infoFiltered": " - filtrado para _MAX_ registros"
        },
        "lengthMenu": [ 25, 50, 75, 100 ],
        "bProcessing": true,
        "pagingType": "bootstrap_full_number",
        "order": [[0,"asc"],[1,"asc"]],

    });

});
</script>
@stop

@section('plugins-styles')
{!! Html::style(asset('assets/global/plugins/bootstrap-table/bootstrap-table.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/datatables/datatables.min.css')) !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
@stop

@section('plugins-js')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-table/bootstrap-table.min.js') !!}
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
{{ $asignatura }}
@stop

@section('page-subtitle')
@stop