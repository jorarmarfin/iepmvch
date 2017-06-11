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
            {!! Form::model($indicador,['route'=>['docentes.capacidad.indicadores.update',$indicador],'method'=>'PUT']) !!}
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
            </div><!--/Porlet Body-->
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
Modulo de Capacidades e indicadores
@stop

@section('page-subtitle')
@stop