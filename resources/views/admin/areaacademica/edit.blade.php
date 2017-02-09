@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12">
    {!! Alert::render() !!}
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-book"></i>
                    Editar Area
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
                {!! Form::model($areaacademica,['route'=>['admin.areaacademica.update',$areaacademica],'method'=>'PUT']) !!}
                    <div class="row">
                        <div class="col-md-2 form-group">
                            {!! Form::label('lblCodigo', 'Codigo', ['class'=>'label-control']) !!}
                            {!! Form::text('codigo', null, ['class'=>'form-control']) !!}
                        </div><!--span-->
                        <div class="col-md-4 form-group">
                            {!! Form::label('lblInicial', 'Nombre en Inicial', ['class'=>'label-control']) !!}
                            {!! Form::text('inicial', null, ['class'=>'form-control']) !!}
                        </div><!--span-->
                        <div class="col-md-4 form-group">
                            {!! Form::label('lblPrimaria', 'Nombre en Primaria', ['class'=>'label-control']) !!}
                            {!! Form::text('primaria', null, ['class'=>'form-control']) !!}
                        </div><!--span-->
                    </div><!--row-->
                    <div class="row">
                        <div class="col-md-6 form-group">
                            {!! Form::label('lblSecundaria', 'Nombre en Secundaria', ['class'=>'label-control']) !!}
                            {!! Form::text('secundaria', null, ['class'=>'form-control']) !!}
                        </div><!--span-->
                    </div><!--row-->
                    {!!Form::enviar('Guardar')!!}{!!Form::back(route('admin.areaacademica.index'))!!}
                {!! Form::close() !!}
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
Plan Curricular / Area Academica
@stop

@section('page-subtitle')
@stop