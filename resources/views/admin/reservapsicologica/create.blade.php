@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12">
			@include('alerts.errors')
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus"></i>Crear Reserva Psicologica </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
				{!! Form::open(['route'=>'admin.reservapsicologica.store','method'=>'POST','class'=>'form-horizontal']) !!}
                    <div class="form-body">
						<div class="form-group">
							{!!Form::label('lblPersona', 'Persona para atender',['class'=>'col-md-3 control-label']);!!}
							<div class="col-md-9">
							{!!Form::text('persona', null , ['class'=>'form-control','placeholder'=>'Persona']);!!}
							</div>
						</div>
						<div class="form-group">
							{!!Form::label('lblGrado', 'Grado que desea matricular',['class'=>'col-md-3 control-label']);!!}
							<div class="col-md-9">
							{!!Form::select('idgrado',$grado, null , ['class'=>'form-control']);!!}
							</div>
						</div>
						<div class="form-group">
							{!!Form::label('lblMotivo', 'Motivo de consulta',['class'=>'col-md-3 control-label']);!!}
							<div class="col-md-9">
							{!!Form::text('motivo', null , ['class'=>'form-control','placeholder'=>'Motivo de la consulta']);!!}
							</div>
						</div>

						<div class="form-group">
							{!!Form::label('lblObservacion', 'Observacion',['class'=>'col-md-3 control-label']);!!}
							<div class="col-md-9">
							{!!Form::textarea('observacion', null , ['class'=>'form-control','placeholder'=>'Observacion']);!!}
							</div>
						</div>
						<div class="form-group">
							{!!Form::label('lblFecha', 'Fecha',['class'=>'col-md-3 control-label']);!!}
							<div class="col-md-9">
								<div class="input-group date form_datetime">
								{!!Form::text('fecha', null , ['class'=>'form-control','placeholder'=>'fecha y hora']);!!}
	                                <span class="input-group-btn">
	                                    <button class="btn default date-set" type="button">
	                                        <i class="fa fa-calendar"></i>
	                                    </button>
	                                </span>
	                            </div>
							</div>

						</div>
						<div class="form-group">
							{!!Form::label('lblPesonal', 'Pesonal que atendera',['class'=>'col-md-3 control-label']);!!}
							<div class="col-md-9">
							{!!Form::select('idpersonal',$psipersonal, null , ['class'=>'form-control','placeholder'=>'Seleccionar personal que atendera']);!!}
							</div>
						</div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
								{!!Form::enviar('Guardar')!!}
								{!!Form::back(route('admin.reservapsicologica.index'))!!}
                            </div>
                        </div>
                    </div>
				{!! Form::close() !!}
                <!-- END FORM-->
				<div class="row">
                	<div class="col-md-12">

                	<p><h3>Horario disponible de psicologos</h3></p>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> Personal </th>
                                <th> Dia </th>
                                <th> Inicio </th>
                                <th> fin </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($hp as $item)
                        <tr>
                            <td> {{ $item->personal }} </td>
                            <td> {{ $item->dia }} </td>
                            <td> {{ $item->inicio }} </td>
                            <td> {{ $item->fin }} </td>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                	</div><!--span-->
                </div><!--row-->
            </div>
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>

@stop

@section('js-scripts')
<script>
$(".form_datetime").datetimepicker({
	todayBtn: true,
    autoclose: true,
    isRTL: App.isRTL(),
    format: "yyyy-mm-dd hh:ii",
    pickerPosition: (App.isRTL() ? "bottom-right" : "bottom-left")
});
</script>
@stop

@section('plugins-styles')
{!! Html::style(asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')) !!}
@stop
@section('plugins-js')
{!! Html::script(asset('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')) !!}
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
Modulo de matricula
@stop

@section('page-subtitle')
@stop