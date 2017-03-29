@extends('layouts.base')

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
Panel de Administracion
@stop

@section('page-subtitle')
@stop

@section('content')
@if (Auth::user()->role->nombre == 'Administrador')
	@include('admin.index')
@elseif(Auth::user()->role->nombre == 'Psicologo')
	@include('psicologo.index')
@elseif(Auth::user()->role->nombre == 'Padre')
	@include('padres.index')
@endif

@stop


