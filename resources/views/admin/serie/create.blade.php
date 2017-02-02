@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12">
			@include('alerts.errors')
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Nueva Serie </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="javascript:;" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
				{!! Form::open(['route'=>'admin.serie.store','method'=>'POST','class'=>'horizontal-form']) !!}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
									{!! Form::label('lblNombre', 'Nombre de la serie (solo letras)', ['class'=>'control-label']) !!}
									{!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Nombre de la asignatura','maxlength'=>'10']) !!}
                                </div>
                            </div><!--/span-->
                            <div class="col-md-1">
                                <div class="form-group">
                                    {!! Form::label('lblPrefijo', 'Prefijo', ['class'=>'control-label']) !!}
                                    {!! Form::text('prefijo', null, ['class'=>'form-control','placeholder'=>'Prefijo']) !!}
                                </div>
                            </div><!--/span-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('lblSerie', 'Serie', ['class'=>'control-label']) !!}
                                    {!! Form::text('serie', null, ['class'=>'form-control','placeholder'=>'Serie']) !!}
                                </div>
                            </div><!--/span-->
                            <div class="col-md-5">
                                <div class="form-group">
                                    {!! Form::label('lblNumero', 'Numero secuencial', ['class'=>'control-label']) !!}
                                    {!! Form::text('numero', null, ['class'=>'form-control','placeholder'=>'Numero secuencial']) !!}
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->

                        {!! Form::hidden('idestado', EstadoId('ESTADO ALUMNO','Regular')) !!}
                    <div class="form-actions right">
                        {!!Form::enviar('Guardar')!!}
                        {!!Form::back(route('admin.serie.index'))!!}
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
Serie / Crear
@stop

@section('page-subtitle')
@stop