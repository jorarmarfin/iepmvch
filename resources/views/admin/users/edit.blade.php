@extends('layouts.base')

@section('content')
{!! Alert::render() !!}
<div class="portlet box yellow-gold">
	<div class="portlet-title">
		<div class="caption"><i class="fa fa-gift"></i>Formulario de Usuarios </div>
	</div>
	<div class="portlet-body form">
		{!! Form::model($user,['route'=>['admin.users.update',$user],'method'=>'PUT','files'=>true,'class'=>'form-horizontal']) !!}
			<div class="form-body">
				<div class="form-group">
					{!!Form::label('lblNombre', 'Nombre del usuario');!!}
					{!!Form::text('name', null , ['class'=>'form-control','placeholder'=>'Nombre del usuario']);!!}
				</div>
				<div class="form-group">
					{!!Form::label('lblEmail', 'Email');!!}
					{!!Form::email('email', null , ['class'=>'form-control','placeholder'=>'Email']);!!}
				</div>
				<div class="form-group">
					{!!Form::label('lblRol', 'Rol');!!}
					{!!Form::select('idrole',$roles,null, ['class'=>'form-control']);!!}
				</div>
				<div class="form-group">
					<div class="col-sm-4">
						<img src="{{ asset('/storage/'.Auth::user()->foto) }}" width="30%">
						{!!Form::file('file',['class'=>'form-control'])!!}
					</div>
				</div>


			</div>
			<div class="form-actions">
				{!!Form::submit('Actualizar',['class'=>'btn green uppercase'])!!}
				<a href="{{ route('admin.users.index') }}" class="btn default">REGRESAR</a>
			</div>
		{!! Form::close() !!}
	</div>
</div>
@include('admin.users.modals.create')
@stop

@section('user-img')
{{ asset('/storage/fotos/'.Auth::user()->foto) }}
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

@section('page-title')
@stop

@section('page-subtitle')

@stop




