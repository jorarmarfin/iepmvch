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
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('lblFecha', 'Fecha de emision', ['class'=>'control-label']) !!}
                            <div class="input-group  date " data-provide="datepicker">
                                {!! Form::text('fechaemision', null, ['class'=>'form-control','id'=>'fechaemision']) !!}
                                <span class="input-group-btn">
                                    <button class="btn default" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div><!--/span-->
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('lblTipoDocumento', 'Tipo de documento de identificacion', ['class'=>'control-label']) !!}
                            {!! Form::select('ididentificacion',$tipoidentificacion, EstadoId('TIPO DOCUMENTO IDENTIDAD','DNI'), ['class'=>'form-control','placeholder'=>'Seleccionar Tipo de documento']) !!}
                        </div>
                    </div><!--/span-->
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('lblNumeroId', 'Numero de Identificacion', ['class'=>'control-label']) !!}
                            {!! Form::text('ididentificacion',null,  ['class'=>'form-control','placeholder'=>'Numero de identificacion']) !!}
                        </div>
                    </div><!--/span-->
                </div><!--/row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('lblRazonSocial', 'Razon Social', ['class'=>'control-label']) !!}
                            {!! Form::text('razonsocial', null, ['class'=>'form-control','placeholder'=>'Apellidos y nombres, denominación o razón social del adquirente o usuario ']) !!}
                        </div>
                    </div><!--/span-->
                    {!!Form::hidden('idtipomoneda', EstadoId('TIPO MONEDA','Nuevo Sol') );!!}
                </div>
                <!--/row-->
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
                                        {!!Form::hidden('idtipoigv', EstadoId('TIPO IGV','Gravado-Operacion Onerosa') );!!}
                                    <div class="form-group col-md-2">
                                        {!! Form::label('lblPrecioU', 'Precio Unitario', ['class'=>'control-label']) !!}
                                        {!! Form::text('precio', null, ['class'=>'form-control','placeholder'=>'precio']) !!}
                                    </div>
                                    <div class="form-group col-md-2">
                                        {!! Form::label('lblDescuento', 'Descuento', ['class'=>'control-label']) !!}
                                        {!! Form::text('descuento', 0, ['class'=>'form-control','placeholder'=>'descuento']) !!}
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
                                <strong class="col-sm-10"> SUBTOTAL: </strong>
                                <strong class="col-sm-2"><div id="subtotal"></div></strong>
                            </li>
                            <li>
                                <strong class="col-sm-10"> DESCUENTO: </strong>
                                <strong class="col-sm-2"> <div id="descuento"></div></strong>
                            </li>
                            <li>
                                <strong class="col-sm-10"> IGV: </strong>
                                <strong class="col-sm-2"> <div id="igv"></div></strong>
                            </li>
                            <li>
                                <strong class="col-sm-10"> TOTAL: </strong>
                                <strong class="col-sm-2"> <div id="total"></div></strong>
                            </li>
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
$(document).ready(function() {
var aumento = 0;

    $('#fechaemision').datepicker({
        todayBtn: 'true',
        format: 'yyyy-mm-dd',
        orientation: "left",
        autoclose: 'true'
    });

    $('.mt-repeater').repeater({
        show: function () {
            $(this).slideDown();
            Totales();
            aumento += parseFloat(aumento);
          },
        hide : function (remove) {
            $(this).slideUp(remove);
            Totales();
            aumento -= parseFloat(aumento);
        },
        defaultValues: {
                'cantidad': '1',
                'descuento': '0'
            },
    });
    Totales();

    function Totales() {
        var prod = [];
        var pre = [];
        var des = [];
        var cant = [];
        var sub = [];
        var tot = [];
        var igv = {{ igv() }};
        for (var i = 0; i <= 100; i++) {
            prod[i] = "select[name=items\\["+i+"\\]\\[idproducto\\]]";
            pre[i] = "input[name=items\\["+i+"\\]\\[precio\\]";
            des[i] = "input[name=items\\["+i+"\\]\\[descuento\\]";
            cant[i] = "input[name=items\\["+i+"\\]\\[cantidad\\]]";
            sub[i] = "input[name=items\\["+i+"\\]\\[subtotal\\]]";
            tot[i] = "input[name=items\\["+i+"\\]\\[total\\]]";

            ejecutar(prod,pre,des,cant,sub,tot,igv,i);
        }//fin del for

    }

    function ejecutar(prod,pre,des,cant,sub,tot,igv,i) {
        var v_prod = $(prod[i]);
        var v_pre  = $(pre[i]);
        var v_des  = $(des[i]);
        var v_cant = $(cant[i]);
        var v_sub  = $(sub[i]);
        var v_tot  = $(tot[i]);
        v_prod.change(function() {
            $.ajax({
                   url: '{{ url("/productos") }}',
                   type: 'get',
                   dataType: 'json',
                   data: {varsearch: $(this).val()},
                   success: function (producto) {
                        v_pre.val(producto.precio);
                        subtotales(v_sub,v_pre,v_des,v_tot,igv);

                   }
               });

        });
        v_cant.change(function(){
             subtotales(v_sub,v_pre,v_des,v_tot,igv);

        });

        v_des.change(function(){
             subtotales(v_sub,v_pre,v_des,v_tot,igv);

        });


    }

    function calculaigv(monto,igv) {
        var gravado = (igv/100)*monto;
        return gravado;
    }

    function subtotales(sub,pre,des,tot,igv) {
        sub.val(pre.val()-des.val());
        tot.val( calculaigv(sub.val(),igv) + parseFloat(sub.val()));
        //$('#subtotal').text('S/. '+subtotal_g);
    }
    function calculo_totales_general() {
        var pre = [];
        var des = [];
        var sub = [];
        var tot = [];
        var igv = {{ igv() }};
        var subtotal_g = 0;
        for (var i = 0; i <= 100; i++) {
            pre[i] = "input[name=items\\["+i+"\\]\\[precio\\]";
            des[i] = "input[name=items\\["+i+"\\]\\[descuento\\]";
            sub[i] = "input[name=items\\["+i+"\\]\\[subtotal\\]]";
            tot[i] = "input[name=items\\["+i+"\\]\\[total\\]]";

            subtotal_g += parseFloat($(pre[i]).val());
        }//fin del for
        console.log(aumento);
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