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
                <div class="row">
                    <div class="col-md-12">
{!! Form::open(['route'=>'docentes.practicas.ingresa','method'=>'POST']) !!}
                        <table class="table table-striped table-hover table-bordered table-condensed" id="Practicas">
                            <thead>
                                <tr>
                                    <th> Periodo </th>
                                    <th> Alumno </th>
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
                                    <th> Promedio</th>
                                    <th> Opciones </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($practicaresumen as $item)
                                <tr>
                                    <td> {{ $item->periodo_academico }} </td>
                                    <td> {{ $item->alumno->nombre_completo }} </td>
                                    <td>
                                        {!!Form::hidden('id['.$loop->index.']',$item->id);!!}
                                        @if (PracticaActiva($item->idperiodoacademico,1))
                                            {!!Form::textnota('pc01['.$loop->index.']', $item->pc01 );!!}
                                        @else
                                            {{ $item->pc01 }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (PracticaActiva($item->idperiodoacademico,2))
                                            {!!Form::textnota('pc02['.$loop->index.']', $item->pc02 );!!}
                                        @else
                                            {{ $item->pc02 }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (PracticaActiva($item->idperiodoacademico,3))
                                            {!!Form::textnota('pc03['.$loop->index.']', $item->pc03 );!!}
                                        @else
                                            {{ $item->pc03 }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (PracticaActiva($item->idperiodoacademico,4))
                                            {!!Form::textnota('pc04['.$loop->index.']', $item->pc04 );!!}
                                        @else
                                            {{ $item->pc04 }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (PracticaActiva($item->idperiodoacademico,5))
                                            {!!Form::textnota('pc05['.$loop->index.']', $item->pc05 );!!}
                                        @else
                                            {{ $item->pc05 }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (PracticaActiva($item->idperiodoacademico,6))
                                            {!!Form::textnota('pc06['.$loop->index.']', $item->pc06 );!!}
                                        @else
                                            {{ $item->pc06 }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (PracticaActiva($item->idperiodoacademico,7))
                                            {!!Form::textnota('pc07['.$loop->index.']', $item->pc07 );!!}
                                        @else
                                            {{ $item->pc07 }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (PracticaActiva($item->idperiodoacademico,8))
                                            {!!Form::textnota('pc08['.$loop->index.']', $item->pc08 );!!}
                                        @else
                                            {{ $item->pc08 }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (PracticaActiva($item->idperiodoacademico,9))
                                            {!!Form::textnota('pc09['.$loop->index.']', $item->pc09 );!!}
                                        @else
                                            {{ $item->pc09 }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (PracticaActiva($item->idperiodoacademico,10))
                                            {!!Form::textnota('pc10['.$loop->index.']', $item->pc10 );!!}
                                        @else
                                            {{ $item->pc10 }}
                                        @endif
                                    </td>
                                    <td> {{ $item->ppc }} </td>
                                    <td>                  </td>
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
@section('js-scripts')
<script>
$(document).ready(function() {

    $('#Practicas').dataTable({
        "language": {
            "emptyTable": "No hay datos disponibles",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
            "search": "Buscar :",
            "lengthMenu": "_MENU_ registros",
            "infoFiltered": " - filtrado para _MAX_ registros"
        },
        "lengthMenu": [ 25, 50, 75, 100 ],
        "bProcessing": true,
        "pagingType": "bootstrap_full_number",
        "order": [[0,"asc"],[1,"asc"]],

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