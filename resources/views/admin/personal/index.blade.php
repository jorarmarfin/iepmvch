@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12">
    {!! Alert::render() !!}
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-table"></i>
                    Lista de Personal
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
            {!!Form::boton('Nuevo Personal',route('admin.personal.create'),'green','fa fa-plus')!!}
            <p></p>
                <table class="table table-striped table-hover" id="Alumnos">
                    <thead>
                        <tr>
                            <th> Paterno </th>
                            <th> Materno </th>
                            <th> Nombres </th>
                            <th> Grado actual</th>
                            <th> Foto </th>
                            <th> Estado </th>
                            <th> Opciones </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($Lista as $item)
                        <tr>
                            <td> {{ $item->paterno }} </td>
                            <td> {{ $item->materno }} </td>
                            <td> {{ $item->nombres }} </td>
                            <td> {{ $item->grado }} </td>
                            <td><a href="{{ route('admin.personal.show',$item->id) }}"><img src="{{ asset('/storage/'.$item->foto) }}"  width='25px'> </a></td>
                            <td> {!! LinkActivo($item->activo) !!}  </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs green-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Opciones
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-left" role="menu">
                                        <li>
                                            <a href="{{ route('admin.personal.show',$item->id) }}">
                                                <i class="fa fa-eye"></i> Show </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.personal.edit',$item->id) }}">
                                                <i class="fa fa-edit"></i> Edit </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.personal.delete',$item->id) }}">
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

@section('js-scripts')
<script>
$('#Alumnos').dataTable({
    "language": {
        "emptyTable": "No hay datos disponibles",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
        "search": "Buscar Personal :",
        "lengthMenu": "_MENU_ registros"
    },
    "bProcessing": true,
    "pagingType": "bootstrap_full_number",
    "order": [1,"asc"]
});
</script>
@stop

@section('plugins-styles')
{!! Html::style('assets/global/plugins/datatables/datatables.min.css') !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
@stop

@section('plugins-js')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
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
Modulo de personal
@stop

@section('page-subtitle')
@stop