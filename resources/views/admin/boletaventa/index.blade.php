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
                    Lista de boletas de venta
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
            {!!Form::boton('Nueva Boleta',route('admin.boletaventa.create'),'green','fa fa-plus')!!}
            {!!Form::botonmodal('Actualizar Numeración','#Numeracion','green-meadow','fa fa-refresh')!!}
            <p></p>
                <table class="table table-striped table-hover" id="Boletas">
                    <thead>
                        <tr>
                            <th> Serie </th>
                            <th> Numero </th>
                            <th> Fecha Emision</th>
                            <th> Razon social</th>
                            <th> Total Venta</th>
                            <th> Opciones </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($Lista as $item)
                        <tr>
                            <td> {{ pad($item->serie,3,0,'L') }} </td>
                            <td> {{ pad($item->numero,8,'0','L') }} </td>
                            <td> {{ $item->fechaemision }} </td>
                            <td> {{ $item->razonsocial }} </td>
                            <td> {{ $item->total_venta }} </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs green-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Opciones
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-left" role="menu">
                                        <li>
                                            <a href="{{ route('admin.boletaventa.show',$item->id) }}">
                                                <i class="fa fa-file-pdf-o"></i> Show </a>
                                        </li>
                                        <li>
                                            <a href="{{ asset('/storage/boletaventa/'.$item->archivo_cabecera) }}">
                                                <i class="fa fa-file"></i> Cabecera </a>
                                        </li>
                                        <li>
                                            <a href="{{ asset('/storage/boletaventa/'.$item->archivo_detalle) }}">
                                                <i class="fa fa-file"></i> Detalle </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.boletaventa.delete',$item->id) }}">
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
<div class="modal fade" id="Numeracion" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Actualizar Numeracion</h4>
            </div>

            {!! Form::open(['route'=>'admin.boletaventa.storenumeracion','method'=>'POST']) !!}
            <div class="modal-body">
                {!! Form::label('lblNumeracion', 'Colocar el numero de serie al que desea actualizar ', ['class'=>'control-label']) !!}
                {!! Form::text('numero', null, ['class'=>'form-control']) !!}

            </div>
            <div class="modal-footer">
                {!! Form::enviar('Actualizarr') !!}
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@stop

@section('js-scripts')
<script>

$('#Boletas').dataTable({
    "language": {
        "emptyTable": "No hay datos disponibles",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
        "search": "Buscar :",
        "lengthMenu": "_MENU_ registros"
    },
    "bProcessing": true,
    "pagingType": "bootstrap_full_number"
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
Boleta de venta
@stop

@section('page-subtitle')
@stop