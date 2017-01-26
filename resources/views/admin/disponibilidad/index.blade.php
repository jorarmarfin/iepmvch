@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12">
    {!! Alert::render() !!}
    @include('alerts.errors')
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-table"></i>
                    Disponibilidad horaria
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
            {!! Form::open(['route'=>'admin.disponibilidad.store','method'=>'POST']) !!}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {!!Form::select('idpersonal',$personalData, null , ['class'=>'form-control','placeholder'=>'Escoger Personal']);!!}
                    </div>
                </div><!--/span-->
                <div class="col-md-3">
                    <div class="form-group">
                        {!!Form::select('iddia',$diasemana, null , ['class'=>'form-control','placeholder'=>'Escoger Dia de la semana']);!!}
                    </div>
                </div><!--/span-->
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="fa fa-clock-o"></i>
                            {!! Form::text('inicio', null, ['class'=>'form-control timepicker timepicker-default','placeholder'=>'hora de inicio']) !!}
                        </div>
                    </div>
                </div><!--/span-->
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="fa fa-clock-o"></i>
                            {!! Form::text('fin', null, ['class'=>'form-control timepicker timepicker-default','placeholder'=>'hora de inicio']) !!}
                        </div>
                    </div>
                </div><!--/span-->
            </div><!--/row-->

            {!!Form::enviar('Guardar')!!}
            {!!Form::back(route('admin.personal.index'))!!}
            {!! Form::close() !!}
            <p></p>
                <table class="table table-striped table-hover" id="HorarioDisponible">
                    <thead>
                        <tr>
                            <th> Personal </th>
                            <th> Dia </th>
                            <th> Inicio </th>
                            <th> fin </th>
                            <th> Opciones </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($Lista as $item)
                        <tr>
                            <td> {{ $item->personal }} </td>
                            <td> {{ $item->dia }} </td>
                            <td> {{ $item->inicio }} </td>
                            <td> {{ $item->fin }} </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs green-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Opciones
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-left" role="menu">
                                        <li>
                                            <a href="{{ route('admin.disponibilidad.edit',$item->id) }}">
                                                <i class="fa fa-edit"></i> Edit </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.disponibilidad.delete',$item->id) }}">
                                                <i class="fa fa-trash"></i> Delete </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>

@stop

@section('js-scripts')
<script>
$('#HorarioDisponible').dataTable({
    "language": {
        "emptyTable": "No hay datos disponibles",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
        "search": "Buscar Personal :",
        "lengthMenu": "_MENU_ registros"
    },
    "bProcessing": true,
    "pagingType": "bootstrap_full_number",
    "order": [1,"asc"]
});

$('.timepicker-default').timepicker({
        autoclose: true,
        showSeconds: true,
        minuteStep: 1
    });
</script>
@stop

@section('plugins-styles')
{!! Html::style('assets/global/plugins/datatables/datatables.min.css') !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
{!! Html::style('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') !!}
@stop

@section('plugins-js')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/scripts/datatable.js') !!}
{!! Html::script('assets/global/plugins/datatables/datatables.min.js') !!}
{!! Html::script('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') !!}
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
Modulo de personal
@stop

@section('page-subtitle')
@stop