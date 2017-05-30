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
                    Ingreso de notas
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
            {!!Form::boton('P01',route('docentes.practica.edit',[
                $practicaresumen[0]->idperiodoacademico,$practicaresumen[0]->idpersonalasignatura,1
            ]),'green-meadow margin-bottom-20')!!}
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover table-bordered table-condensed" id="Practicas">
                            <thead>
                                <tr>
                                    <th> Alumno </th>
                                    <th> P01</th>
                                    <th> P02</th>
                                    <th> P03</th>
                                    <th> P04</th>
                                    <th> P05</th>
                                    <th> P06</th>
                                    <th> Promedio</th>
                                    <th> Opciones </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($practicaresumen as $item)
                                <tr>
                                    <td> {{ $item->alumno->nombre_completo }} </td>
                                    <td> {{ $item->pc2_n }} </td>
                                    <td> {{ $item->pc2_n }} </td>
                                    <td> {{ $item->pc3_n }} </td>
                                    <td> {{ $item->pc4_n }} </td>
                                    <td> {{ $item->pc5_n }} </td>
                                    <td> {{ $item->pc6_n }} </td>
                                    <td> {{ $item->ppc }} </td>
                                    <td>                  </td>
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

    $('#Practicas').dataTable({
        "language": {
            "emptyTable": "No hay datos disponibles",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
            "search": "Buscar Alumnos :",
            "lengthMenu": "_MENU_ registros",
            "infoFiltered": " - filtrado para _MAX_ registros"
        },
        "lengthMenu": [ 25, 50, 75, 100 ],
        "bProcessing": true,
        "pagingType": "bootstrap_full_number",
        "order": [0,"asc"],

    });

});
</script>
@stop

@section('plugins-styles')
{!! Html::style(asset('assets/global/plugins/bootstrap-table/bootstrap-table.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/datatables/datatables.min.css')) !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
@stop

@section('plugins-js')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-table/bootstrap-table.min.js') !!}
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
{{ $asignatura }}
@stop

@section('page-subtitle')
@stop