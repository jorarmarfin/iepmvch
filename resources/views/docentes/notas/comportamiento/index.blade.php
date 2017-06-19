@extends('layouts.base')

@section('content')
@include('alerts.errors')
<div class="row">
    <div class="col-md-4">
        {!! Alert::render() !!}
        <div class="list-group">
            @foreach ($periodos as $periodo)
            <a href="{{ route('docentes.comportamiento.grado',$periodo->id) }}" class="list-group-item ">
                <h4 class="list-group-item-heading">{{ $periodo->nombre }}</h4>
            </a>
            @endforeach
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
Notas de comportamiento
@stop

@section('page-subtitle')
@stop