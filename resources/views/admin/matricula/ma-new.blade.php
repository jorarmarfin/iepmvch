@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12">
        <!-- BEGIN Portlet PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-user-plus"></i>
                        Nueva Matrícula
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="javascript:;" class="fullscreen"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body">
	                <a href="{{ route('admin.reservapsicologica.create') }}" class="btn green-meadow"><i class="fa fa-user-md"></i> Reserva Psicologica</a>
	                <a href="{{ route('admin.alumnos.create') }}" class="btn green-meadow"><i class="fa fa-pencil"></i> Datos del Alumno</a>
	                <a href="#" class="btn green-meadow"><i class="fa fa-file-pdf-o"></i> Compromiso de matricula</a>

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
Modulo de matricula
@stop

@section('page-subtitle')
@stop