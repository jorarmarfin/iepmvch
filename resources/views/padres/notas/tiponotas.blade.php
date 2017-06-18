@extends('layouts.base')

@section('content')
@include('alerts.errors')
<div class="row">
    <div class="col-md-4">
        {!! Alert::render() !!}
        <div class="list-group">
            <a href="{{ route('padres.notas.mostrarnota',[$trimestre,$idalumno,'Practica']) }}" class="list-group-item ">
                <h4 class="list-group-item-heading">Practicas</h4>
            </a>
            <a href="{{ route('padres.notas.mostrarnota',[$trimestre,$idalumno,'Trimestral']) }}" class="list-group-item ">
                <h4 class="list-group-item-heading">Notas Trimestrales</h4>
            </a>
        </div>
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
Notas
@stop

@section('page-subtitle')
@stop