@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12">
			@include('alerts.errors')
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Detalle de alumno </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    <a href="javascript:;" class="reload"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                    <div class="form-actions right">
                        <a href="{{ route('admin.alumnos.index') }}" class="btn default">REGRESAR</a>
                    </div>
                <!-- BEGIN FORM-->
                <form class="form-horizontal" role="form">
                    <div class="form-body">
                        <h2 class="margin-bottom-20"> Ficha de : {{ $alumno->nombre_completo }} </h2>
                        <h3 class="form-section">Informacion Personal</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <img src="{{ asset('/storage/'.$alumno->foto) }}" width="300px">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Apellido Paterno:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $alumno->paterno }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Apellido Materno:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $alumno->materno }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Sexo:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $alumno->sexo }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Cumpleaños:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $alumno->fechanacimiento }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Grado:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $alumno->grado }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">DNI:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $alumno->dni }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Edad:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $alumno->edad }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Pais nacimiento:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $alumno->pais.' / '.$alumno->ubigeo_nacimiento->descripcion  }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Religion:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $alumno->religion }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Sacramentos:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $alumno->sacramentos }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <h3 class="form-section">Dirección</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Direccion:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> {{ $alumno->direccion }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Localidad:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> {{ $alumno->ubigeo->descripcion }} </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Telefonos:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> {{ $alumno->telefonos }} </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Telefono de emergencia 1:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> {{ $alumno->telefonoemergencia1 }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <!--/span-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Telefono de emergencia 2:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> {{ $alumno->telefonoemergencia2 }} </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                    </div>
                    <div class="form-actions right">
                        <a href="{{ route('admin.alumnos.index') }}" class="btn default">REGRESAR</a>
                    </div>
                </form>
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
Datos de Alumno
@stop

@section('page-subtitle')
@stop