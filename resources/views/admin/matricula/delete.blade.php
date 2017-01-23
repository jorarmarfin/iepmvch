@extends('layouts.base')

@section('content')
@include('alerts.errors')
<div class="row">
    <div class="col-md-12">
        {!! Alert::render() !!}
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-table"></i>
                    Listado de matriculas realizadas
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
            {!! Form::model($matricula,['route'=>['admin.matricula.destroy',$matricula],'method'=>'DELETE']) !!}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('lblAlumno', 'Matricula de: '.NombreAlumno($matricula->idalumno), ['class'=>'control-label']) !!}
                            {!! Form::hidden('idalumno', null) !!}
                        </div>
                    </div><!--/span-->
                </div><!--/row-->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('lblGrado', 'Escoger el grado al que fue promovido', ['class'=>'control-label']) !!}
                            {!!Form::select('idgradoseccion', $gradoseccion, null , ['class'=>'form-control'])!!}
                        </div>
                    </div><!--/span-->
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('lblTipo', 'Tipo de Matricula', ['class'=>'control-label']) !!}
                            {!!Form::select('idtipo', $tipomatricula, null , ['class'=>'form-control'])!!}
                        </div>
                    </div><!--/span-->
                    <div class="col-md-4">
                        <div class="form-group">
                            {!!Form::label('lblFecha', 'Año',['class'=>'control-label']);!!}
                            {!!Form::text('year', null , ['class'=>'form-control']);!!}
                        </div>
                    </div><!--/span-->
                </div><!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p></p>
                        {!!Form::enviar('Eliminar','red')!!}
                        {!!Form::back(route('admin.matricula.index'))!!}
                        </div>
                    </div><!--/span-->
                </div><!--/row-->
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
Modulo de matricula
@stop

@section('page-subtitle')
@stop