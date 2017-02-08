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
                    <i class="fa fa-users"></i>
                    Hermanos
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
                                <img src="{{ asset('/storage/'.$matricula->alumno->foto) }}" width="170px">
                            </div>
                        </div><!--span-->
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Nombre del alumno:</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{ $matricula->alumno->nombre_completo }} </p>
                                        </div>
                                    </div>
                                </div><!--/span-->
                            </div><!--row-->
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-6">Grado : </label>
                                        <div class="col-md-6">
                                            <p class="form-control-static"> {{ $matricula->grado_matriculado }} </p>
                                        </div>
                                    </div>
                                </div><!--/span-->
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-6">Año de Ingreso I.E.P.:</label>
                                        <div class="col-md-6">
                                            <p class="form-control-static"> {{ $matricula->year }} </p>
                                        </div>
                                    </div>
                                </div><!--/span-->
                            </div><!--row-->
                        </div><!--span-->
                    </div><!--row-->
                </div>
             </form>
            {!! Form::open(['route'=>'admin.hermanos.store','method'=>'POST','class'=>'form-horizontal']) !!}
            <div class="form-body">
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::hidden('idalumno', $matricula->idalumno ) !!}
                        {!! Form::hidden('idmatricula', $matricula->id ) !!}
                        {!! Form::label('lblNombres', 'Nombres', ['class'=>'control-label']) !!}
                        {!! Form::text('nombres', null, ['class'=>'form-control','placeholder'=>'nombres']) !!}
                    </div><!--span-->
                    <div class="col-md-3">
                        {!! Form::label('lblCU', 'Colegio / Universidad / Trabaja', ['class'=>'control-label']) !!}
                        {!! Form::text('descripcion', null, ['class'=>'form-control','placeholder'=>'Colegio / Universidad / Trabaja']) !!}
                    </div><!--span-->
                    <div class="col-md-3">
                        {!! Form::label('lblEdad', 'Edad', ['class'=>'control-label']) !!}
                        {!! Form::text('edad', null, ['class'=>'form-control','placeholder'=>'Edad']) !!}
                    </div><!--span-->
                    <div class="col-md-3">
                        <div style="margin-top:25px">
                            {!!Form::enviar('Guardar')!!}{!!Form::back(route('admin.matricula.index'))!!}
                        </div>
                    </div><!--span-->
                </div><!--row-->
            </div>
            {!! Form::close() !!}
            <p></p>
            <!-- END FORM-->
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover" id="CheckListData">
                            <thead>
                                <tr>
                                    <th> Nombre </th>
                                    <th> Colegio / Universidad / Trabaja</th>
                                    <th> Edad </th>
                                    <th> Opciones </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($hermanos as $item)
                                <tr>
                                    <td> {{ $item->nombres }}        </td>
                                    <td> {{ $item->descripcion }}    </td>
                                    <td> {{ $item->edad }}           </td>
                                    <td> {!!Form::boton('Eliminar',route('admin.hermanos.delete',$item->id),'red','fa fa-trash',null,['data-toggle'=>'confirmation','data-original-title'=>'¡Esta seguro!'])!!} </td>
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
{!! Html::style('assets/global/plugins/datatables/datatables.min.css') !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
@stop

@section('plugins-js')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-table/bootstrap-table.min.js') !!}
{!! Html::script('assets/global/scripts/datatable.js') !!}
{!! Html::script('assets/global/plugins/datatables/datatables.min.js') !!}
{!! Html::script('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js') !!}

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
Hermanos del alumno
@stop

@section('page-subtitle')
@stop