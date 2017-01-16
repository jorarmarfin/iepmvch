@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12">
{!! Alert::render() !!}
        <!-- BEGIN Portlet PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-user-md"></i>
                        Reserva Psicologica
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="" class="fullscreen"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                <a href="{{ route('admin.reservapsicologica.create') }}" class="btn green">
                    <i class="fa fa-plus"></i>
                    Nueva reserva
                </a>
                <p></p>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> Persona </th>
                                <th> Grado </th>
                                <th> Motivo </th>
                                <th> Observacion </th>
                                <th> Estado </th>
                                <th> fecha </th>
                                <th> Opciones </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($Lista as $item)
                            <tr >
                                <td> {{ $item->persona }} </td>
                                <td> {{ $item->grado->nombre }} </td>
                                <td> {{ $item->motivo }} </td>
                                <td> {{ $item->observacion }} </td>
                                <td> {{ $item->Estado->nombre }} </td>
                                <td> {{ $item->fecha }} </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-xs green-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-left" role="menu">
                                            <li>
                                                <a href="{{route('admin.reservapsicologica.create',$item->id)}}">
                                                    <i class="icon-docs"></i> New </a>
                                            </li>
                                            <li>
                                                <a href="{{route('admin.reservapsicologica.edit',$item->id)}}">
                                                    <i class="fa fa-edit"></i> Edit </a>
                                            </li>
                                            <li>
                                                <a href="{{route('admin.reservapsicologica.show',$item->id)}}">
                                                    <i class="fa fa-trash"></i> Delete </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>

@stop

@section('plugins-styles')
{!! Html::style('assets/global/plugins/bootstrap-table/bootstrap-table.min.css') !!}
@stop

@section('js-plugins')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-table/bootstrap-table.min.js') !!}
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
Modulo de matricula
@stop

@section('page-subtitle')
@stop