@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12">
			@include('alerts.errors')
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Detalle de Personal </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    <a href="javascript:;" class="reload"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                    <div class="form-actions right">
                    {!!Form::back(route('admin.personal.index'))!!}
                    </div>
                <!-- BEGIN FORM-->
                <form class="form-horizontal" role="form">
                    <div class="form-body">
                        <h2 class="margin-bottom-20"> Ficha de {{ $personal->tipo }}: {{ $personal->nombre_completo }} </h2>
                        <h3 class="form-section">Informacion Personal</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <img src="{{ asset('/storage/'.$personal->foto) }}" width="300px">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Apellido Paterno:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $personal->paterno }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Apellido Materno:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $personal->materno }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Nombres:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $personal->nombres }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Cumpleaños:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $personal->fechanacimiento }} </p>
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
                                                <p class="form-control-static"> {{ $personal->sexo }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">DNI:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $personal->dni }} </p>
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
                                                <p class="form-control-static"> {{ $personal->edad }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Pais nacimiento:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $personal->pais.' / '.$personal->ubigeo_nacimiento  }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Email:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $personal->email }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Estado Civil:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $personal->estado_civil }} </p>
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
                                        <p class="form-control-static"> {{ $personal->direccion }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Localidad:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> {{ $personal->ubigeo }} </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">numero hijos:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> {{ $personal->numerohijos }} </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Telefono fijo:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> {{ $personal->telefonofijo }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <!--/span-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Celular:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> {{ $personal->celular }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <h3 class="form-section">Datos academicos</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Universidad:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $personal->universidad }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Culmino:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $personal->culmino_carrera }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-6">Carrera:</label>
                                    <p class="form-control-static "> {!! $personal->carrera !!} </p>
                                </div>
                            </div><!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-6">Gestion universidad:</label>
                                    <p class="form-control-static "> {!! $personal->gestion_universidad !!} </p>
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-6">Grado Obtenido:</label>
                                    <p class="form-control-static "> {!! $personal->gradoobtenido !!} </p>
                                </div>
                            </div><!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-6">Grado Obte:</label>
                                    <p class="form-control-static "> {!! $personal->carrera !!} </p>
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-6">Fecha egreso:</label>
                                    <p class="form-control-static "> {!! $personal->fechaegreso !!} </p>
                                </div>
                            </div><!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-6">Numero de Colegiatura:</label>
                                    <p class="form-control-static "> {!! $personal->numerocolegiatura !!} </p>
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                         <h3 class="form-section">Datos de Pension</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Sistema de Pension:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $personal->sistema_pension }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-6">AFP:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $personal->afp }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Es vigente:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $personal->es_vigente }} </p>
                                    </div>
                                </div>
                            </div><!--/span-->

                        </div><!--/row-->
                    </div>
                    <div class="form-actions right">
                    {!!Form::back(route('admin.personal.index'))!!}
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