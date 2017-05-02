@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12">
    {!! Alert::render() !!}
    @include('alerts.errors')
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-table"></i>
                    Modulo de Asistencia
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
            {!! Form::open(['route'=>'admin.asistencia.store','method'=>'POST']) !!}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('lblGrado', 'Escoger grado ', ['class'=>'control-label']) !!}
                                {!!Form::select('idgradoseccion', $gradoseccion, null , ['id'=>'idgradoseccion','class'=>'form-control'])!!}
                            </div>
                        </div><!--/span-->
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('lblFecha', 'Fecha', ['class'=>'control-label']) !!}
                                <div class="input-group ">
                                    {!!Form::text('fecha', null , ['id'=>'fecha','class'=>'form-control','placeholder'=>'Fecha de egreso']);!!}
                                    <span class="input-group-btn ">
                                        <button class="btn " type="button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <p></p>
                            {!!Form::enviar('Filtrar','purple-plum','fa fa-filter')!!}
                            {!!Form::botonmodal('Resumen por grado','#Resumen','blue','fa fa-book')!!}
                            </div>
                        </div><!--/span-->
                    </div><!--/row-->
                {!! Form::close() !!}
            <p></p>
                <table class="table table-striped table-hover" id="PersonalData">
                    <thead>
                        <tr>
                            <th> Paterno </th>
                            <th> Materno </th>
                            <th> Nombres </th>
                            <th> Foto </th>
                            <th> Estado </th>
                            <th> fecha </th>
                            <th> Opciones </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($Lista as $item)
                        <tr>
                            <td> {{ $item->alumno->paterno }} </td>
                            <td> {{ $item->alumno->materno }} </td>
                            <td> {{ $item->alumno->nombres }} </td>
                            <td><a href="{{ route('admin.personal.show',$item->alumno->id) }}"><img src="{{ asset('/storage/'.$item->alumno->foto) }}"  width='25px'> </a></td>
                            <td> {!! $item->estado_layout !!}  </td>
                            <td> {{ $item->fecha }}  </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs green-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Opciones
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-left" role="menu">
                                        @foreach ($estadoasistencia as $key => $estado)
                                            <li>
                                                <a href="{{ route('admin.asistencia.estado',[$item->id,$key]) }}">
                                                    <i class="fa fa-check"></i> {{ $estado }} </a>
                                            </li>
                                        @endforeach
                                            <li>
                                                <a href="{{ route('admin.asistencia.show',$item->id) }}">
                                                    <i class="fa fa-trash"></i> Eliminar </a>
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
<div class="modal fade" id="Resumen" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Resumen de Asistencia</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover" id="ResumenFechas">
                    <thead>
                        <tr>
                            <th> Grado </th>
                            <th> Fecha </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@stop

@section('js-scripts')
<script>
$('#fecha').datepicker({
    todayHighlight:true,
    language:"es",
    format: 'yyyy-mm-dd'
});
$('#PersonalData').dataTable({
    "language": {
        "emptyTable": "No hay datos disponibles",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
        "search": "Buscar Personal :",
        "lengthMenu": "_MENU_ registros"
    },
    "bProcessing": true,
    "pagingType": "bootstrap_full_number",
    "order": [[0,"asc"],[1,"asc"],[2,"asc"]]
});
$('#Resumen').on('show.bs.modal', function (e) {
        var idgs = $('#idgradoseccion').val();
        var tdgs = $("#idgradoseccion option:selected").text();
        $.ajax({
            url: '/admin/asistencia-resumen',
            data: {varsearch: idgs},
        })
        .done(function(data) {
            var tabla = $('#ResumenFechas');
            tabla.empty();
            for (var i in data) {
                tabla.append("<thead>" +
                                "<tr>" +
                                    "<th> Grado </th>" +
                                    "<th> Fecha </th>" +
                                "</tr>" +
                            "</thead>")
                tabla.append("<tr>" +
                                "<td> "+ tdgs +" </td>" +
                                "<td> "+ data[i]['fecha'] +" </td>" +
                            "</tr>");
            }
        })
        .fail(function() {
            console.log("error");
        });

    });
</script>
@stop

@section('plugins-styles')
{!! Html::style('assets/global/plugins/datatables/datatables.min.css') !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
{!! Html::style(asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')) !!}
@stop

@section('plugins-js')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/scripts/datatable.js') !!}
{!! Html::script('assets/global/plugins/datatables/datatables.min.js') !!}
{!! Html::script('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
{!! Html::script(asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')) !!}
{!! Html::script(asset('assets/global/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js')) !!}
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