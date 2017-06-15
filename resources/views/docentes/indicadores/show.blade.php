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
                    Capacidad
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
            {!! Form::open(['route'=>'docentes.capacidad.indicadores.store','method'=>'POST']) !!}
            {!!Form::hidden('idcapacidad', $capacidad->id );!!}
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label('Capacidad:') !!}
                        {!! $capacidad->nombre !!}
                    </div><!--span-->
                    <div class="col-md-12">
                        {!! Field::textarea('nombre',null,['label'=>'Nombre del Indicador','placeholder'=>'Ingresar capacidad','rows'=>'2']) !!}
                    </div><!--span-->
                </div><!--row-->
                {!!Form::enviar('Guardar')!!}
            {!! Form::close() !!}
           <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover table-bordered table-condensed" id="Capacidades">
                            <thead>
                                <tr>
                                    <th> Indicador </th>
                                    <th> Opciones </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($Lista as $item)
                                <tr>
                                    <td> {{ $item->nombre }} </td>
                                    <td>
                                        {!!Form::boton('Editar',route('docentes.capacidad.indicadores.edit',$item->id),'yellow','fa fa-edit','btn-xs')!!}
                                        {!!Form::boton('Eliminar',route('docentes.capacidad.indicadores.delete',$item->id),'red','fa fa-edit','btn-xs')!!}
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