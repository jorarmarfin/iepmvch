@extends('layouts.base')

@section('content')
<div class="note note-danger">
    <h4 class="block">Cuidado! Esta seguro de eliminar esta boleta: {{ 'B'.pad($caja->serie,3,'0','L').'-'.pad($caja->numero,8,'0','L') }}</h4>
    <p> No podra desacer esta opcion </p>
</div>
<div class="row">
    <div class="col-md-12">
    {!! Alert::render() !!}
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-table"></i>
                    BORRAR BOLETA
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label col-md-6"> <strong> Fecha de Emision: </strong></label>
                            <label class="control-label col-md-6 text-left"> {{ $caja->fechaemision }}</label>
                        </div>
                    </div> <!--/span-->
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="control-label col-md-6"> <strong> Documento de identidad: </strong></label>
                            <label class="control-label col-md-6 text-left"> {{ $caja->numidentificacion }}</label>
                        </div>
                    </div> <!--/span-->
                </div> {{-- row --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4"> <strong> Razon Social: </strong></label>
                            <p class="control-label col-md-8 text-left"> {{ $caja->razonsocial }}</p>
                        </div>
                    </div> <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4"> <strong> Direccion: </strong></label>
                            <p class="control-label col-md-8 text-left"> {{ $caja->direccion }}</p>
                        </div>
                    </div> <!--/span-->
                </div> {{-- row --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4"> <strong> Alumno: </strong></label>
                            <p class="control-label col-md-8 text-left"> {{ $caja->matricula->alumno->nombre_completo }}</p>
                        </div>
                    </div> <!--/span-->
                </div> {{-- row --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4"> <strong> Total venta: </strong></label>
                            <p class="control-label col-md-8 text-left"> {{ $caja->total_venta }}</p>
                        </div>
                    </div> <!--/span-->
                </div> {{-- row --}}
            <p></p>
                <table class="table table-striped table-hover" id="Boletas">
                    <thead>
                        <tr>
                            <th> Cantidad </th>
                            <th> Producto </th>
                            <th> Precio Unitario</th>
                            <th> Descuento</th>
                            <th> Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($caja->detalles as $item)
                        <tr>
                            <td> {{ $item->cantidad }} </td>
                            <td> {{ $item->producto->nombre.' '.$item->tipo_pension }} </td>
                            <td> {{ $item->preciounitario }} </td>
                            <td> {{ $item->descuento }} </td>
                            <td> {{ $item->total }} </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            {!! Form::model($caja,['route'=>['admin.boletaventa.destroy',$caja],'method'=>'DELETE']) !!}
                {!!Form::enviar('Eliminar','red','fa-trash')!!}
                {!!Form::back(route('admin.boletaventa.index'))!!}
            {!! Form::close() !!}
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
Boleta de venta
@stop

@section('page-subtitle')
@stop