@extends('layouts.base')

@section('content')
@include('alerts.errors')
<div class="row">
    <div class="col-md-12">
        {!! Alert::render() !!}

        <table class="table table-striped table-hover table-bordered table-condensed" id="Practicas">
            <thead>
                <tr>
                    <th> Alumno </th>
                    <th> Notas</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($comportamiento as $item)
                <tr>
                    <td> {{ $item->matricula->alumno->nombre_completo }} </td>
                    <td> {!!Form::textnota('notas' );!!} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
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