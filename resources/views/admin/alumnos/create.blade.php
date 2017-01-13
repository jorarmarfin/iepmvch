@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12">
			@include('alerts.errors')
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Form Sample </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="javascript:;" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
				{!! Form::open(['route'=>'admin.alumnos.store','method'=>'POST','class'=>'horizontal-form']) !!}
                    <div class="form-body">
                        <h3 class="form-section">Datos Personales</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									{!! Form::label('paterno', 'Apellido Paterno', ['class'=>'control-label']) !!}
									{!! Form::text('paterno', null, ['class'=>'form-control','placeholder'=>'Apellido Paterno']) !!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
									{!! Form::label('lblMaterno', 'Apellido Materno', ['class'=>'control-label']) !!}
									{!! Form::text('materno', null, ['class'=>'form-control','placeholder'=>'Apellido Materno']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									{!! Form::label('lblNombres', 'Nombres', ['class'=>'control-label']) !!}
									{!! Form::text('nombres', null, ['class'=>'form-control','placeholder'=>'Nombres completos']) !!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
									{!! Form::label('lblDNI', 'Numero de DNI', ['class'=>'control-label']) !!}
									{!! Form::text('dni', null, ['class'=>'form-control','placeholder'=>'Numero de DNI']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                {!!Form::label('lblGrado', 'Grado que desea matricular',['class'=>'control-label']);!!}
                                    {!!Form::select('idgrado',$grado, null , ['class'=>'form-control']);!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblFecha', 'Fecha de nacimiento', ['class'=>'control-label']) !!}
                                    {!!Form::date('fecha', null , ['class'=>'form-control','placeholder'=>'Fecha de nacimiento']);!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <h3 class="form-section">Address</h3>
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label>Street</label>
                                    <input type="text" class="form-control"> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control"> </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control"> </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Post Code</label>
                                    <input type="text" class="form-control"> </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control"> </select>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="button" class="btn default">Cancel</button>
                        <button type="submit" class="btn blue">
                            <i class="fa fa-check"></i> Save</button>
                    </div>
				{!! Form::close() !!}
                <!-- END FORM-->
            </div>
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>

@stop



@section('plugins-styles')
{!! Html::style(asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')) !!}
@stop
@section('js-plugins')
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