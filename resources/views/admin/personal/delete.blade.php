@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12">
			@include('alerts.errors')
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box red">
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
                {!! Form::model($personal,['route'=>['admin.personal.destroy',$personal],'method'=>'DELETE','class'=>'form-horizontal']) !!}
                    <div class="form-actions right">

                   {!!Form::enviar('Borrar','red')!!}
                   {!!Form::back(route('admin.personal.index'))!!}
                    </div>
                <!-- BEGIN FORM-->
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



                    </div>
                    <div class="form-actions right">
                    {!!Form::enviar('Borrar','red')!!}
                    {!!Form::back(route('admin.personal.index'))!!}
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
Datos de Alumno
@stop

@section('page-subtitle')
@stop