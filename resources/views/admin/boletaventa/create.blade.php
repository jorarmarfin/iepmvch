@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12">
			@include('alerts.errors')
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-money"></i> Nueva boleta </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="javascript:;" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
            <!-- BEGIN FORM-->
			{!! Form::open(['route'=>'admin.boletaventa.store','method'=>'POST','class'=>'horizontal-form mt-repeater']) !!}
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('lblNombre', 'Nombre del cliente', ['class'=>'control-label']) !!}
                            {!! Form::text('recibi', 'luis', ['class'=>'form-control','placeholder'=>'Nombre del cliente']) !!}
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('lblTipoDocumento', 'Tipo de documento', ['class'=>'control-label']) !!}
                            {!! Form::select('idtipodocumento',$tipodocumento, EstadoId('TIPO DOCUMENTO','Boleta de Venta'), ['class'=>'form-control','placeholder'=>'Seleccionar Tipo de documento']) !!}
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('lblFecha', 'Fecha de emision', ['class'=>'control-label']) !!}
                            {!! Form::date('created_at', null, ['class'=>'form-control']) !!}
                        </div>
                    </div><!--/span-->
                </div><!--/row-->
                 {{-- Form::hidden('idestado', EstadoId('ESTADO ALUMNO','Regular')) --}}
                <div class="form-group mt-repeater"><!--Bloque ha repetir-->
                    <div data-repeater-list="items">
                        <div data-repeater-item class="mt-repeater-item">
                            <div class="row mt-repeater-row">
                                <div class="col-md-11">
                                    <div class="form-group col-md-2">
                                        {!! Form::label('lblProducto', 'Producto', ['class'=>'control-label']) !!}
                                        {!! Form::select('idproducto',$productos, null, ['class'=>'form-control','placeholder'=>'Productos']) !!}
                                    </div>
                                    <div class="form-group col-md-2">
                                        {!! Form::label('lblCantidad', 'Cantidad', ['class'=>'control-label']) !!}
                                        {!! Form::text('cantidad', 1, ['class'=>'form-control','placeholder'=>'Cantidad']) !!}
                                    </div>
                                    <div class="form-group col-md-2">
                                        {!! Form::label('lblTipoIGV', 'Tipo', ['class'=>'control-label']) !!}
                                        {!! Form::select('idtipoigv', $tipoigv,null, ['class'=>'form-control','placeholder'=>'Tipo']) !!}
                                    </div>
                                    <div class="form-group col-md-2">
                                        {!! Form::label('lblPrecioU', 'Precio Unitario', ['class'=>'control-label']) !!}
                                        {!! Form::text('precio', null, ['class'=>'form-control','placeholder'=>'precio']) !!}
                                    </div>
                                    <div class="form-group col-md-2">
                                        {!! Form::label('lblSubtotal', 'Subtotal', ['class'=>'control-label']) !!}
                                        {!! Form::text('subtotal', null, ['class'=>'form-control','placeholder'=>'subtotal']) !!}
                                    </div>
                                    <div class="form-group col-md-2">
                                        {!! Form::label('lbltotal', 'total', ['class'=>'control-label']) !!}
                                        {!! Form::text('total', null, ['class'=>'form-control','placeholder'=>'total']) !!}
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                                        <i class="fa fa-close"></i>
                                    </a>
                                </div>
                                <!--/span-->
                            </div>
                        </div>
                    </div>
                    <a href="javascript:;" data-repeater-create class="btn green-meadow mt-repeater-add">
                        <i class="fa fa-plus"></i>
                        Agregar producto
                    </a>
                </div><!--/Bloque ha repetir-->


            </div>
            <div class="form-actions right">
                {!!Form::enviar('Guardar')!!}
                {!!Form::back(route('admin.boletaventa.index'))!!}
            </div>
			{!! Form::close() !!}
            <!-- END FORM-->
            </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>

@stop

@section('js-scripts')
<script>
$(document).ready(function() {
    $('.mt-repeater').repeater({
        show: function () {
            $(this).slideDown();
            Totales();
          },
        hide : function (remove) {
            $(this).slideUp(remove);
        }
    });
    Totales();

function Totales() {
    var prod_0  = "select[name=items\\[0\\]\\[idproducto\\]]";
    var pre_0  = "input[name=items\\[0\\]\\[precio\\]]";
    var cant_0  = "input[name=items\\[0\\]\\[cantidad\\]]";
    var sub_0  = "input[name=items\\[0\\]\\[subtotal\\]]";
    var tot_0  = "input[name=items\\[0\\]\\[total\\]]";
    var igv = {{ igv() }}
    $(prod_0).change(function(){
       $.ajax({
           url: '{{ url("/productos") }}',
           type: 'get',
           dataType: 'json',
           data: {varsearch: $(this).val()},
           success: function (producto) {
                $(pre_0).val(producto.precio);
                $(sub_0).val(parseFloat($(cant_0).val())*parseFloat(producto.precio));
                $(tot_0).val(parseFloat((igv/100)*$(sub_0).val()) + parseFloat($(sub_0).val()));
           }
       });
    });
    $(cant_0).change(function(){
        $(sub_0).val(parseFloat($(cant_0).val())*parseFloat($(pre_0).val()));
        $(tot_0).val(parseFloat((igv/100)*$(sub_0).val()) + parseFloat($(sub_0).val()));
    });

    var prod_1  = "select[name=items\\[1\\]\\[idproducto\\]]";
    var pre_1  = "input[name=items\\[1\\]\\[precio\\]]";
    var cant_1  = "input[name=items\\[1\\]\\[cantidad\\]]";
    var sub_1  = "input[name=items\\[1\\]\\[subtotal\\]]";
    var tot_1  = "input[name=items\\[1\\]\\[total\\]]";
    $(prod_1).change(function(){
       $.ajax({
           url: '{{ url("/productos") }}',
           type: 'get',
           dataType: 'json',
           data: {varsearch: $(this).val()},
           success: function (producto) {
                $(pre_1).val(producto.precio);
                $(sub_1).val(parseFloat($(cant_1).val())*parseFloat(producto.precio));
                $(tot_1).val(parseFloat((igv/100)*$(sub_1).val()) + parseFloat($(sub_1).val()));
           }
       });
    });
    $(cant_1).change(function(){
        $(sub_1).val(parseFloat($(cant_1).val())*parseFloat($(pre_1).val()));
        $(tot_1).val(parseFloat((igv/100)*$(sub_1).val()) + parseFloat($(sub_1).val()));
    });


}



});
</script>
@stop


@section('plugins-styles')
{!! Html::style(asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/icheck/skins/all.css')) !!}
@stop
@section('plugins-js')
{!! Html::script(asset('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')) !!}
{!! Html::script(asset('assets/global/plugins/select2/js/select2.full.min.js')) !!}
{!! Html::script(asset('assets/global/plugins/select2/js/i18n/es.js')) !!}
{!! Html::script(asset('assets/global/plugins/icheck/icheck.min.js')) !!}
{!! Html::script(asset('assets/global/plugins/jquery-repeater/jquery.repeater.js')) !!}
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
Boleta de Ventas / crear
@stop

@section('page-subtitle')
@stop