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
                {!!Form::hidden('idtipodocumento', EstadoId('TIPO DOCUMENTO','Boleta de Venta') );!!}
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('lblFecha', 'Fecha de emision', ['class'=>'control-label']) !!}
                            <div class="input-group  date " data-provide="datepicker">
                                {!! Form::text('fechaemision', null, ['class'=>'form-control']) !!}
                                <span class="input-group-btn">
                                    <button class="btn default" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div><!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('lblTipoDocumento', 'Tipo de documento', ['class'=>'control-label']) !!}
                            {!! Form::select('ididentificacion',$tipodocumento, EstadoId('TIPO DOCUMENTO','Boleta de Venta'), ['class'=>'form-control','placeholder'=>'Seleccionar Tipo de documento']) !!}
                        </div>
                    </div><!--/span-->
                </div><!--/row-->
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
                                        {!! Form::select('idproducto',$productos, null, ['class'=>'form-control','placeholder'=>'Productos','id'=>'idproducto[]']) !!}
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
                                        {!! Form::text('subtotal', null, ['class'=>'form-control','placeholder'=>'subtotal','disabled']) !!}
                                    </div>
                                    <div class="form-group col-md-2">
                                        {!! Form::label('lbltotal', 'total', ['class'=>'control-label']) !!}
                                        {!! Form::text('total', null, ['class'=>'form-control','placeholder'=>'total','disabled']) !!}
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
                <div class="row ">
                    <div class="col-xs-4 ">

                    </div>
                    <div class="col-xs-8 invoice-block text-right">
                        <ul class="list-unstyled amounts">
                            <li>
                                <strong>Sub - Total amount:</strong> $9265 </li>
                            <li>
                                <strong>Discount:</strong> 12.9% </li>
                            <li>
                                <strong>VAT:</strong> ----- </li>
                            <li>
                                <strong>Grand Total:</strong> $12489 </li>
                        </ul>
                        <br>
                    </div>
                </div>

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
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d',
    orientation: "left",
});

$(document).ready(function() {
    $('.mt-repeater').repeater({
        show: function () {
            $(this).slideDown();
            Totales();
          },
        hide : function (remove) {
            $(this).slideUp(remove);
        },
        defaultValues: {
                'cantidad': '1'
            },
    });
    Totales();

function Totales() {
    var prod = [];
    var pre = [];
    var cant = [];
    var sub = [];
    var tot = [];
    var igv = {{ igv() }}
    for (var i = 0; i <= 100; i++) {
        prod[i] = "select[name=items\\["+i+"\\]\\[idproducto\\]]";
        pre[i] = "input[name=items\\["+i+"\\]\\[precio\\]";
        cant[i] = "input[name=items\\["+i+"\\]\\[cantidad\\]]";
        sub[i] = "input[name=items\\["+i+"\\]\\[subtotal\\]]";
        tot[i] = "input[name=items\\["+i+"\\]\\[total\\]]";
    }//fin del for

        ejecutar(prod,pre,cant,sub,tot,igv,0);
        ejecutar(prod,pre,cant,sub,tot,igv,1);
        ejecutar(prod,pre,cant,sub,tot,igv,2);
        ejecutar(prod,pre,cant,sub,tot,igv,3);
        ejecutar(prod,pre,cant,sub,tot,igv,4);
        ejecutar(prod,pre,cant,sub,tot,igv,5);
        ejecutar(prod,pre,cant,sub,tot,igv,6);
        ejecutar(prod,pre,cant,sub,tot,igv,7);
        ejecutar(prod,pre,cant,sub,tot,igv,8);
        ejecutar(prod,pre,cant,sub,tot,igv,9);
        ejecutar(prod,pre,cant,sub,tot,igv,10);
        ejecutar(prod,pre,cant,sub,tot,igv,11);
        ejecutar(prod,pre,cant,sub,tot,igv,12);
        ejecutar(prod,pre,cant,sub,tot,igv,13);
}

function ejecutar(prod,pre,cant,sub,tot,igv,i) {
    $(prod[i]).change(function(){
           $.ajax({
               url: '{{ url("/productos") }}',
               type: 'get',
               dataType: 'json',
               data: {varsearch: $(this).val()},
               success: function (producto) {
                    $(pre[i]).val(producto.precio);
                    $(sub[i]).val(parseFloat($(cant[i]).val())*parseFloat(producto.precio));
                    $(tot[i]).val(parseFloat((igv/100)*$(sub[i]).val()) + parseFloat($(sub[i]).val()));
               }
           });
        });
        $(cant[i]).change(function(){
            $(sub[i]).val(parseFloat($(cant[i]).val())*parseFloat($(pre_i).val()));
            $(tot[i]).val(parseFloat((igv/100)*$(sub[i]).val()) + parseFloat($(sub[i]).val()));
        });
}


});
</script>
@stop


@section('plugins-styles')
{!! Html::style(asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/icheck/skins/all.css')) !!}
@stop
@section('plugins-js')
{!! Html::script(asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')) !!}
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