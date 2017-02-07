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
                {!!Form::hidden('idtipooperacion', EstadoId('TIPO DOCUMENTO','Boleta de Venta') );!!}
                {!!Form::hidden('idtipodocumento', EstadoId('TIPO OPERACION','Venta Interna') );!!}
            <div class="form-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('lblFecha', 'Fecha de emision', ['class'=>'control-label']) !!}
                            <div class="input-group date datepicker" data-date-format="yyyy-mm-dd">
                                {!! Form::text('fechaemision', null, ['class'=>'form-control']) !!}
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
                            {!! Form::text('numidentificacion',null,  ['class'=>'form-control','placeholder'=>'Numero de identificacion','id'=>'numidentificacion']) !!}
                        </div>
                    </div><!--/span-->
                </div><!--/row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('lblRazonSocial', 'Razon Social', ['class'=>'control-label']) !!}
                            {!! Form::text('razonsocial', null, ['id'=>'razonsocial','class'=>'form-control','placeholder'=>'Apellidos y nombres, denominación o razón social del adquirente o usuario ']) !!}
                        </div>
                    </div><!--/span-->
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('lblDireccion', 'Direccion', ['class'=>'control-label']) !!}
                            {!! Form::text('direccion',null, ['id'=>'direccion','class'=>'form-control','placeholder'=>'Direccion del que paga']) !!}
                        </div>
                    </div><!--/span-->
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('lblMatricula', 'Alumno Matriculado', ['class'=>'control-label']) !!}
                            {!! Form::select('idmatricula',[] ,null, ['id'=>'idmatricula','class'=>'form-control','placeholder'=>'Seleccionar Alumno matriculado']) !!}
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
                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        {!! Form::label('lblProducto', 'Producto', ['class'=>'control-label']) !!}
                                        {!! Form::select('idproducto',$productos, null, ['class'=>'form-control producto_linea','placeholder'=>'Productos','id'=>'idproducto[]']) !!}
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="form-group col-md-3" >
                                        {!! Form::label('lblCantidad', 'Cantidad', ['class'=>'control-label']) !!}
                                        {!! Form::text('cantidad', 1, ['class'=>'form-control cantidad_linea','placeholder'=>'Cantidad']) !!}
                                    </div>
                                    <div class="form-group col-md-3">
                                        {!! Form::label('lblPrecioU', 'Precio Unitario', ['class'=>'control-label']) !!}
                                        {!! Form::text('precio', null, ['class'=>'form-control precio_linea','placeholder'=>'precio','disabled']) !!}
                                    </div>
                                    <div class="form-group col-md-2">
                                        {!! Form::label('lblDescuento', 'Descuento', ['class'=>'control-label']) !!}
                                        {!! Form::text('descuento', 0, ['class'=>'form-control descuento_linea','placeholder'=>'descuento']) !!}
                                    </div>
                                    <div class="form-group col-md-2">
                                        {!! Form::label('lblSubtotal', 'Subtotal', ['class'=>'control-label']) !!}
                                        {!! Form::text('subtotal', 0, ['class'=>'form-control subtotal_linea','placeholder'=>'subtotal','disabled']) !!}
                                    </div>
                                    <div class="form-group col-md-2">
                                        {!! Form::label('lbltotal', 'total', ['class'=>'control-label']) !!}
                                        {!! Form::text('total', 0, ['class'=>'form-control total_linea','placeholder'=>'total','disabled']) !!}
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
                    <a href="javascript:;" data-repeater-create class="btn green-meadow mt-repeater-add ">
                        <i class="fa fa-plus"></i>
                        Agregar producto
                    </a>&nbsp;
                    <a href="#" id="actualizartotales"  class="btn green ">
                        <i class="fa fa-refresh"></i>
                        Actualizar Totales
                    </a>
                </div><!--/Bloque ha repetir-->
                <div class="row ">
                    <div class="col-xs-4 ">

                    </div>
                    <div class="col-xs-8 invoice-block text-right">
                        <ul class="list-unstyled amounts">
                            <li>
                                <strong class="col-sm-10"> SUBTOTAL: </strong>
                                <strong class="col-sm-2"><div id="subtotal_general"></div></strong>
                            </li>
                            <li>
                                <strong class="col-sm-10"> DESCUENTO: </strong>
                                <strong class="col-sm-2"> <div id="descuento_general"></div></strong>
                            </li>
                            {{-- <li>
                                <strong class="col-sm-10"> IGV: </strong>
                                <strong class="col-sm-2"> <div id="igv_general"></div></strong>
                            </li> --}}
                            <li>
                                <strong class="col-sm-10"> TOTAL: </strong>
                                <strong class="col-sm-2"> <div id="total_general"></div></strong>
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
    $("#idmatricula").select2({

        ajax: {
            url: '{{ url("/alumnos-matriculados") }}',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    varsearch: params.term // search term
                };
            },
            processResults: function(data) {
                // parse the results into the format expected by Select2.
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data
                return {
                    results: data
                };
            },
            cache: true
        },
        width: '100%',
        minimumInputLength: 3,
        templateResult: format,
        templateSelection: format,
        escapeMarkup: function(markup) {
            return markup;
        } // let our custom formatter work
    });
    function format(res){
        var markup=res.text;
        return markup;
    }

    $('#numidentificacion').easyAutocomplete({
        url: function(name) {
         return "{{ url("/numidentificacion") }}?varsearch=" + name ;
        },

        getValue: "dni",
        list: {
            onSelectItemEvent: function() {
                var v_razonsocial = $("#numidentificacion").getSelectedItemData().nombres;
                var v_direccion = $("#numidentificacion").getSelectedItemData().direccion;

                $("#razonsocial").val(v_razonsocial).trigger("change");
                $("#direccion").val(v_direccion).trigger("change");
            }
        }
    });

    $('.datepicker').datepicker({
        autoclose: true,
        todayBtn: 'linked',
        language: 'es',
        todayHighlight:true
    });

    $('.mt-repeater').repeater({
        show: function () {
            $(this).slideDown();
            Parciales();
            calculo_totales();
          },
        hide : function (remove) {
            $(this).slideUp(remove);
            Parciales();
            calculo_totales();
        },
        defaultValues: {
                'cantidad': '1',
                'descuento': '0',
                'subtotal': '0',
                'total': '0'
            },
    });
    Parciales();
    //calculo_totales();

    function Parciales() {
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
                        subtotales(v_sub,v_pre,v_cant,v_des,v_tot,igv);

                   }
               });
        });
        v_cant.change(function(){
             subtotales(v_sub,v_pre,v_cant,v_des,v_tot,igv);
             calculo_totales();
        });

        v_des.change(function(){
             subtotales(v_sub,v_pre,v_cant,v_des,v_tot,igv);
             calculo_totales();
        });
    }

    function calculaigv(monto,igv) {
        var gravado = (igv/100)*monto;
        return gravado;
    }

    function subtotales(sub,pre,cant,des,tot,igv) {
        sub.val((pre.val()*cant.val())-des.val());
        tot.val( calculaigv(sub.val(),igv) + parseFloat(sub.val()));
        calculo_totales();
    }

    function calculo_totales() {
        var descuento_g = 0;
        var subtotal_g = 0;
        var igv_g = 0;
        var total_g = 0;
        $('.descuento_linea').each(function(index, value) {
            descuento_g += eval($(this).val());
        });
        $('.subtotal_linea').each(function(index, value) {
            subtotal_g += eval($(this).val());
        });
        $('.total_linea').each(function(index, value) {
            total_g += eval($(this).val());
        });

        $('#subtotal_general').text(subtotal_g);
        $('#descuento_general').text(descuento_g);
        //$('#igv_general').text(Math.round10(total_g - subtotal_g,-2));
        $('#total_general').text(total_g);

    }
    $('#actualizartotales').click(function() {
        calculo_totales();
    });

    (function() {
      /**
       * Ajuste decimal de un número.
       *
       * @param {String}  tipo  El tipo de ajuste.
       * @param {Number}  valor El numero.
       * @param {Integer} exp   El exponente (el logaritmo 10 del ajuste base).
       * @returns {Number} El valor ajustado.
       */
      function decimalAdjust(type, value, exp) {
        // Si el exp no está definido o es cero...
        if (typeof exp === 'undefined' || +exp === 0) {
          return Math[type](value);
        }
        value = +value;
        exp = +exp;
        // Si el valor no es un número o el exp no es un entero...
        if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
          return NaN;
        }
        // Shift
        value = value.toString().split('e');
        value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
        // Shift back
        value = value.toString().split('e');
        return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
      }

      // Decimal round
      if (!Math.round10) {
        Math.round10 = function(value, exp) {
          return decimalAdjust('round', value, exp);
        };
      }
      // Decimal floor
      if (!Math.floor10) {
        Math.floor10 = function(value, exp) {
          return decimalAdjust('floor', value, exp);
        };
      }
      // Decimal ceil
      if (!Math.ceil10) {
        Math.ceil10 = function(value, exp) {
          return decimalAdjust('ceil', value, exp);
        };
      }
    })();
});
</script>
@stop


@section('plugins-styles')
{!! Html::style(asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/EasyAutocomplete/easy-autocomplete.min.css')) !!}
@stop
@section('plugins-js')
{!! Html::script(asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')) !!}
{!! Html::script(asset('assets/global/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js')) !!}
{!! Html::script(asset('assets/global/plugins/select2/js/select2.full.min.js')) !!}
{!! Html::script(asset('assets/global/plugins/select2/js/i18n/es.js')) !!}
{!! Html::script(asset('assets/global/plugins/jquery-repeater/jquery.repeater.js')) !!}
{!! Html::script(asset('assets/global/plugins/EasyAutocomplete/jquery.easy-autocomplete.min.js')) !!}
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