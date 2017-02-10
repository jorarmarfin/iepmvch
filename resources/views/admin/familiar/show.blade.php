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
                    {!!Form::back(route('admin.familiar.lists',$idalumno))!!}
                    </div>
                <!-- BEGIN FORM-->
                <form class="form-horizontal" role="form">
                    <div class="form-body">
                        <h2 class="margin-bottom-20"> Ficha de : {{ $familiar->nombre_completo.' ('.$familiar->tipo.')' }} </h2>
                        <h3 class="form-section">Informacion Personal </h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Apellido Paterno:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->paterno }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Apellido Materno:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->materno }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Nombres:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->nombres }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">DNI:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->dni }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Fecha de Nacimiento:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->fechanacimiento }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Pais:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->pais }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Localidad:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->ubigeo_nacimiento }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Fecha de Nacimiento:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->fechanacimiento }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Religion:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->religion }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Estado Civil:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->estado_civil }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Grado de Instruccion:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->gradoinstruccion }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Profesion:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->profesion }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Direccion:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->direccion }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Distrito:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->ubigeo }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Celular:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->celular }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Telefono laboral:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->telefonolaboral }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Telefono Fijo:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->telefonofijo }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Email:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->email }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <h3 class="form-section">Alumnos</h3>
                    </div>
                    <div class="form-actions right">
                    {!!Form::back(route('admin.familiar.lists',$idalumno))!!}
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
Mostrando familiar de {{ NombreAlumno($idalumno) }}
@stop

@section('page-subtitle')
@stop