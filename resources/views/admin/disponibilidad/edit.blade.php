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
            {!! Form::model($disponibilidad,['route'=>['admin.disponibilidad.update',$disponibilidad],'method'=>'PUT']) !!}
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

            {!!Form::enviar('Actualizar')!!}
            {!!Form::back(route('admin.disponibilidad.index'))!!}
            {!! Form::close() !!}
            </div>
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>

@stop

@section('js-scripts')
<script>
$('.timepicker-default').timepicker({
        autoclose: true,
        showSeconds: true,
        minuteStep: 1,
        showMeridian: false
    });
</script>
@stop

@section('plugins-styles')
{!! Html::style('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') !!}
@stop

@section('plugins-js')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
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