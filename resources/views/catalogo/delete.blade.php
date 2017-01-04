@extends('layouts.base')

@section('content')
{!! Alert::render() !!}
<div class="portlet box red">
	<div class="portlet-title">
		<div class="caption"><i class="fa fa-edit"></i>Eliminar registro</div>
	</div>
	<div class="portlet-body form">
		{!! Form::model($catalogo,['route'=>['catalogo.destroy',$catalogo],'method'=>'DELETE']) !!}
			<div class="form-body">
				<div class="form-group">
						{!!Form::label('lblCodigo', 'Codigo');!!}
						{!!Form::text('codigo', null , ['class'=>'form-control','placeholder'=>'Codigo']);!!}
					</div>
					<div class="form-group">
						{!!Form::label('lblNombre', 'Nombre');!!}
						{!!Form::text('nombre', null , ['class'=>'form-control','placeholder'=>'Nombre']);!!}
					</div>
					<div class="form-group">
						{!!Form::label('lblDescripcion', 'Descripcion');!!}
						{!!Form::text('descripcion', null , ['class'=>'form-control','placeholder'=>'Descripcion']);!!}
					</div>
            	<div class="form-group">
					{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
	            	<a href="{{ route('catalogo.index') }}" class="btn default">REGRESAR</a>
            	</div>
            </div>
		{!! Form::close() !!}
	</div>
</div>

@stop

@section('title')
Credencial:CNE
@stop

@section('page-title')
Eliminar {{ Session::get('tablename') }}
@stop

@section('page-subtitle')
@stop

@section('sidebar')
@include(Auth::user()->menu)
@stop

@section('user-menu')
@include('menu.profile-admin')
@stop


@section('user-name')
{!!Auth::user()->name!!}
@stop


@section('user-img')
{!! asset('storage/fotos/'.Auth::user()->foto) !!}
@stop