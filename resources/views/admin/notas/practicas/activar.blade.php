@extends('layouts.base')

@section('content')
@include('alerts.errors')
<div class="row">
    <div class="col-md-12">
        {!! Alert::render() !!}
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-table"></i>
                    Activar Practicas
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
{!! Form::open(['route'=>'admin.notas.activar.store','method'=>'POST']) !!}
                        <table class="table table-striped table-hover table-bordered table-condensed ParaActivar">
                            <thead>
                                <tr>
                                    <th> Trimestre </th>
                                    <th> P01</th>
                                    <th> P02</th>
                                    <th> P03</th>
                                    <th> P04</th>
                                    <th> P05</th>
                                    <th> P06</th>
                                    <th> P07</th>
                                    <th> P08</th>
                                    <th> P09</th>
                                    <th> P10</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($Lista as $item)
                                <tr>
                                    <td>
                                        {{ $item->periodo_academico }}
                                        {!!Form::hidden('id[]', $item->id );!!}
                                    </td>
                                    <td class="icheck" align="center">  {{ Form::checkbox('pc01['.$loop->index.']', 1,$item->pc01) }}</td>
                                    <td class="icheck" align="center">  {{ Form::checkbox('pc02['.$loop->index.']', 1,$item->pc02) }}</td>
                                    <td class="icheck" align="center">  {{ Form::checkbox('pc03['.$loop->index.']', 1,$item->pc03) }}</td>
                                    <td class="icheck" align="center">  {{ Form::checkbox('pc04['.$loop->index.']', 1,$item->pc04) }}</td>
                                    <td class="icheck" align="center">  {{ Form::checkbox('pc05['.$loop->index.']', 1,$item->pc05) }}</td>
                                    <td class="icheck" align="center">  {{ Form::checkbox('pc06['.$loop->index.']', 1,$item->pc06) }}</td>
                                    <td class="icheck" align="center">  {{ Form::checkbox('pc07['.$loop->index.']', 1,$item->pc07) }}</td>
                                    <td class="icheck" align="center">  {{ Form::checkbox('pc08['.$loop->index.']', 1,$item->pc08) }}</td>
                                    <td class="icheck" align="center">  {{ Form::checkbox('pc09['.$loop->index.']', 1,$item->pc09) }}</td>
                                    <td class="icheck" align="center">  {{ Form::checkbox('pc10['.$loop->index.']', 1,$item->pc10) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!!Form::enviar('Guardar')!!}
{!! Form::close() !!}
                    </div><!--/span-->
                </div><!--/row-->

            </div><!--/Porlet Body-->
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Alert::render() !!}
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-table"></i>
                    Activar Trimestre
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-6">
{!! Form::open(['route'=>'admin.notas.activar.trimestre','method'=>'POST']) !!}
                        <table class="table table-striped table-hover table-bordered table-condensed ParaActivar">
                            <thead>
                                <tr>
                                    <th> Trimestre </th>
                                    <th> Nota Trimestral</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($Lista as $item)
                                <tr>
                                    <td>
                                        {{ $item->periodo_academico }}
                                        {!!Form::hidden('id[]', $item->id );!!}
                                    </td>
                                    <td class="icheck" align="center">  {{ Form::checkbox('examen['.$loop->index.']', 1,$item->examen) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!!Form::enviar('Guardar')!!}
{!! Form::close() !!}
                    </div><!--/span-->
                </div><!--/row-->

            </div><!--/Porlet Body-->
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Alert::render() !!}
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-table"></i>
                    Activar Comportamiento
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-6">
{!! Form::open(['route'=>'admin.notas.activar.comportamiento','method'=>'POST']) !!}
                        <table class="table table-striped table-hover table-bordered table-condensed ParaActivar">
                            <thead>
                                <tr>
                                    <th> Trimestre </th>
                                    <th> Nota comportamiento</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($Lista as $item)
                                <tr>
                                    <td>
                                        {{ $item->periodo_academico }}
                                        {!!Form::hidden('id[]', $item->id );!!}
                                    </td>
                                    <td class="icheck" align="center">  {{ Form::checkbox('comportamiento['.$loop->index.']', 1,$item->comportamiento) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!!Form::enviar('Guardar')!!}
{!! Form::close() !!}
                    </div><!--/span-->
                </div><!--/row-->

            </div><!--/Porlet Body-->
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>

@stop


@section('plugins-styles')
{!! Html::style(asset('assets/global/plugins/bootstrap-table/bootstrap-table.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/datatables/datatables.min.css')) !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
{!! Html::style(asset('assets/global/plugins/icheck/skins/all.css')) !!}
@stop

@section('plugins-js')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-table/bootstrap-table.min.js') !!}
{!! Html::script('assets/global/scripts/datatable.js') !!}
{!! Html::script('assets/global/plugins/datatables/datatables.min.js') !!}
{!! Html::script('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
{!! Html::script(asset('assets/global/plugins/icheck/icheck.min.js')) !!}

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
Activar Practicas
@stop

@section('page-subtitle')
@stop