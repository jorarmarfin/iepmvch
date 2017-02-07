@extends('layouts.base')

@section('content')
@include('alerts.errors')
<div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2">
        {!!Form::back(route('admin.matricula.index'))!!}
    </div>
</div>
<p></p>
<div class="row">
    <div class="col-md-12">
        {!! Alert::render() !!}
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-check"></i>
                    Chek List
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
             <form class="form-horizontal" role="form">
                <div class="form-body">
                    <div class="row">
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="{{ asset('/storage/'.$Lista[0]->alumno->foto) }}" width="170px">
                                </div>
                            </div><!--span-->
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Nombre del alumno:</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static"> {{ $Lista[0]->alumno->nombre_completo }} </p>
                                            </div>
                                        </div>
                                    </div><!--/span-->
                                </div><!--row-->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Grado : </label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $Lista[0]->matricula->grado_matriculado }} </p>
                                            </div>
                                        </div>
                                    </div><!--/span-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Nivel:</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static"> {{ $Lista[0]->matricula->nivel_matriculado }} </p>
                                            </div>
                                        </div>
                                    </div><!--/span-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-8">Año de Ingreso I.E.P.:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static"> {{ $Lista[0]->matricula->year }} </p>
                                            </div>
                                        </div>
                                    </div><!--/span-->
                                </div><!--row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Responsable de matricula : </label>
                                            <div class="col-md-8">
                                                <p class="form-control-static"> Quien sera no me dijo rosa </p>
                                            </div>
                                        </div>
                                    </div><!--/span-->
                                </div><!--row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Parentesco : </label>
                                            <div class="col-md-8">
                                                <p class="form-control-static"> ????? </p>
                                            </div>
                                        </div>
                                    </div><!--/span-->
                                </div><!--row-->
                            </div><!--span-->
                    </div><!--row-->
                </div>
             </form>
            <!-- END FORM-->
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover" id="CheckListData">
                            <thead>
                                <tr>
                                    <th> Requisitos </th>
                                    <th> Aplica</th>
                                    <th> Fecha </th>
                                    <th> Entregó </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($Lista as $item)
                                <tr>
                                    <td> {{ $item->requisito }} </td>
                                    <td> {!! $item->si_aplica !!}    </td>
                                    <td> {{ $item->fecha }} </td>
                                    <td>
                                    {!!Form::boton('',route('admin.checklist.entrego',[$item->id,'si']),'green-dark','fa fa-check','btn-xs')!!}
                                    {!!Form::boton('',route('admin.checklist.entrego',[$item->id,'no']),'red-pink','fa fa-remove','btn-xs')!!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!--/span-->
                </div><!--/row-->

            </div><!--/Porlet Body-->
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>

@stop
@section('js-scripts')
<script>
$(document).ready(function() {
    $('#CheckListData').dataTable({
        "language": {
            "emptyTable": "No hay datos disponibles",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
            "search": "Buscar :",
            "lengthMenu": "_MENU_ registros"
        },
        "bProcessing": true,
        "pagingType": "bootstrap_full_number"
    });

});
</script>
@stop

@section('plugins-styles')
{!! Html::style('assets/global/plugins/bootstrap-table/bootstrap-table.min.css') !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')) !!}
{!! Html::style('assets/global/plugins/datatables/datatables.min.css') !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
@stop

@section('plugins-js')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-table/bootstrap-table.min.js') !!}
{!! Html::script(asset('assets/global/plugins/select2/js/select2.full.min.js')) !!}
{!! Html::script(asset('assets/global/plugins/select2/js/i18n/es.js')) !!}
{!! Html::script('assets/global/scripts/datatable.js') !!}
{!! Html::script('assets/global/plugins/datatables/datatables.min.js') !!}
{!! Html::script('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}

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
Check List de Documentos de Matricula
@stop

@section('page-subtitle')
@stop