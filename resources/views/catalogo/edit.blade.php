@extends('layouts.base')

@section('content')
<div class="portlet box green">
	<div class="portlet-title">
		<div class="caption"><i class="fa fa-edit"></i>Formulario de Usuarios </div>
	</div>
	<div class="portlet-body form">
		{!! Form::model($catalogo,['route'=>['catalogo.update',$catalogo],'method'=>'PUT']) !!}
			<div class="form-body">
				@if (Session::get('tablename') != 'jefatura')
					<div class="form-group">
						{!!Form::label('lblCodigo', 'Codigo');!!}
						{!!Form::text('codigo', null , ['class'=>'form-control','placeholder'=>'Codigo']);!!}
					</div>
				@endif
				<div class="form-group">
					{!!Form::label('lblNombre', 'Nombre del cargo');!!}
					{!!Form::text('nombre', null , ['class'=>'form-control','placeholder'=>'Nombre del cargo']);!!}
				</div>
				<div class="form-group">
					{!!Form::label('lblDescripcion', 'Descripcion');!!}
					{!!Form::text('descripcion', null , ['class'=>'form-control','placeholder'=>'Descripcion']);!!}
				</div>

            	<div class="form-group">
					{!!Form::submit('Guardar',['class'=>'btn yellow-gold uppercase'])!!}
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
Editar {{ Session::get('tablename') }}
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