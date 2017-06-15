@extends('layouts.base')

@section('content')
@include('alerts.errors')
{!! Alert::render() !!}
<div class="row">
    <div class="col-md-12">
        {!! Alert::render() !!}
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-table"></i>
                    {{ $personalasignatura->nombre_area.'/'.$personalasignatura->nombre_asignatura }}
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
            {!! Form::open(['route'=>'docentes.capacidades.store','method'=>'POST']) !!}
           {!!Form::hidden('idpersonalasignatura', $personalasignatura->id );!!}
           <div class="row">
                    <div class="col-md-6">
                        {!! Field::select('idperiodoacademico',$periodo,['label'=>'Periodo Academico','empty'=>'Selecionar periodo']) !!}
                    </div><!--span-->
                </div><!--row-->
                <div class="row">
                    <div class="col-md-12">
                        {!! Field::textarea('nombre',null,['label'=>'Nombre de la capacidad','placeholder'=>'Ingresar capacidad','rows'=>'2']) !!}
                    </div><!--span-->
                </div><!--row-->
                {!!Form::enviar('Guardar')!!}
            {!! Form::close() !!}
           <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover table-bordered table-condensed" id="Capacidades">
                            <thead>
                                <tr>
                                    <th> Periodo </th>
                                    <th> Capacidad </th>
                                    <th> Opciones </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($Lista as $item)
                                <tr>
                                    <td> {{ $item->periodo_academico }} </td>
                                    <td> {{ $item->nombre }} </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Opciones
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-left" role="menu">
                                                <li>
                                                    <a href="{{ route('docentes.capacidades.edit',$item->id) }}">
                                                        <i class="fa fa-edit"></i> Editar </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('docentes.capacidades.delete',$item->id) }}">
                                                        <i class="fa fa-eraser"></i> Eliminar </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('docentes.capacidad.indicadores.show',$item->id) }}">
                                                        <i class="fa fa-caret-square-o-up"></i> Indicadores </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
    $('#Capacidades').dataTable({
        "info": false,
        "searching": false,
        "paging": false,
        "order": [0,"asc"],

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
Modulo de Capacidades e indicadores
@stop

@section('page-subtitle')
@stop