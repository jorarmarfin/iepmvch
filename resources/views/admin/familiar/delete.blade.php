@extends('layouts.base')

@section('content')
<div class="note note-danger">
    <h4 class="block">Cuidado! Esta seguro de eliminar este Familiar</h4>
    <p> No podra desacer esta opcion </p>
    <p> Si tiene alumnos relacionados, se perdera el familiar de ellos tambien </p>
</div>
<div class="row">
	<div class="col-md-12">
			@include('alerts.errors')
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box red">
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
                <!-- BEGIN FORM-->
                {!! Form::model($familiar,['route'=>['admin.familiar.destroy',$familiar],'method'=>'DELETE']) !!}
                    <div class="form-actions right">
                    {!!Form::enviar('Eliminar','red')!!}
                    {!!Form::back(route('admin.familiar.lists',$idalumno))!!}
                    </div>
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
                                        <p class="form-control-static"> {{ $familiar->direcion }} </p>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Telefono Fijo:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->telefonofijo }} </p>
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
                                    <label class="control-label col-md-6">Email:</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"> {{ $familiar->email }} </p>
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
                        </div><!--/row-->
                        <h3 class="form-section">Alumnos Relacionados con este familiar</h3>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> Alumnos </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($Lista as $item)
                                    <tr >
                                        <td> {{ $item->nombre_completo }} </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                    <div class="form-actions right">
                    {!!Form::enviar('Eliminar','red')!!}
                    {!!Form::back(route('admin.familiar.lists',$idalumno))!!}
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
Mostrando familiar de {{ NombreAlumno($idalumno) }}
@stop

@section('page-subtitle')
@stop