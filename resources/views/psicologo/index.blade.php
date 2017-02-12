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
Panel de Administracion de Psicologia
@stop

@section('page-subtitle')
@stop

@section('content')

@stop


