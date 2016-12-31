@extends('layouts.base')

@section('menu-user')
@include('menu.profile-admin')
@stop

@section('sidebar')
@include(Auth::user()->menu)
@stop

@section('user-img')
{{ asset('storage/'.Auth::user()->foto) }}
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
asdaaa
@stop


