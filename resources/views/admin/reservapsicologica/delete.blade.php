@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="note note-danger">
            <h4 class="block">Peligro! Esta seguro de eliminar este registro</h4>
            <p> No podrá deshacer esta acción </p>
        </div>
		@include('alerts.errors')
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box red">
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
				{!! Form::model($data,['route'=>['admin.reservapsicologica.destroy',$data],'method'=>'DELETE','class'=>'form-horizontal']) !!}
                    <div class="form-body">
						<div class="form-group">
							{!!Form::label('lblPersona', 'Persona para atender',['class'=>'col-md-3 control-label']);!!}
							<div class="col-md-9">
							{!!Form::text('persona', null , ['class'=>'form-control','placeholder'=>'Persona','disabled']);!!}
							</div>
						</div>
						<div class="form-group">
							{!!Form::label('lblGrado', 'Grado que desea matricular',['class'=>'col-md-3 control-label']);!!}
							<div class="col-md-9">
							{!!Form::select('idgrado',$grado, null , ['class'=>'form-control','disabled']);!!}
							</div>
						</div>
						<div class="form-group">
							{!!Form::label('lblMotivo', 'Motivo de consulta',['class'=>'col-md-3 control-label']);!!}
							<div class="col-md-9">
							{!!Form::text('motivo', null , ['class'=>'form-control','placeholder'=>'Motivo de la consulta','disabled']);!!}
							</div>
						</div>

						<div class="form-group">
							{!!Form::label('lblObservacion', 'Observacion',['class'=>'col-md-3 control-label']);!!}
							<div class="col-md-9">
							{!!Form::textarea('observacion', null , ['class'=>'form-control','placeholder'=>'Observacion','disabled']);!!}
							</div>
						</div>
						<div class="form-group">
							{!!Form::label('lblFecha', 'Fecha',['class'=>'col-md-3 control-label']);!!}
							<div class="col-md-9">
								<div class="input-group date form_datetime">
								{!!Form::text('fecha', null , ['class'=>'form-control','placeholder'=>'fecha y hora','disabled']);!!}
	                                <span class="input-group-btn">
	                                    <button class="btn default date-set" type="button">
	                                        <i class="fa fa-calendar"></i>
	                                    </button>
	                                </span>
	                            </div>
							</div>

						</div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
								{!!Form::submit('Borrar',['class'=>'btn red uppercase'])!!}
								<a href="{{ route('admin.reservapsicologica.index') }}" class="btn default">REGRESAR</a>
                            </div>
                        </div>
                    </div>
				{!! Form::close() !!}
                <!-- END FORM-->
            </div>
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>

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
Reserva Psicologica
@stop

@section('page-subtitle')
@stop