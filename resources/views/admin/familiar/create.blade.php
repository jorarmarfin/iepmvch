@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12">
			@include('alerts.errors')
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Nuevo Familiar </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="javascript:;" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
				{!! Form::open(['route'=>'admin.familiar.store','method'=>'POST','class'=>'horizontal-form','files'=>true]) !!}
                    <div class="form-actions right">
                        {!!Form::enviar('Guardar')!!}
                        {!!Form::back(route('admin.familiar.lists',$idalumno))!!}
                    </div>
                    <div class="form-body">
                        <h3 class="form-section">Datos Personales</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!!Form::label('lblViveEs', 'Vive con el Estudiante',['class'=>'control-label col-md-6']);!!}
                                    <div class="input-group col-md-6">
                                        <div class="icheck-inline">
                                            <label>
                                                {!! Form::radio('viveconestudiante', true) !!}
                                                Si
                                            </label>
                                            <label>
                                                {!! Form::radio('viveconestudiante', false,true) !!}
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblPaterno', 'Apellido paterno', ['class'=>'control-label']) !!}
                                    {!! Form::text('paterno', null, ['class'=>'form-control','placeholder'=>'Apelido paterno']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									{!! Form::label('lblMaterno', 'Apellido materno', ['class'=>'control-label']) !!}
									{!! Form::text('materno', null, ['class'=>'form-control','placeholder'=>'Apellido materno']) !!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
									{!! Form::label('lblNombres', 'Nombres completos', ['class'=>'control-label']) !!}
									{!! Form::text('nombres', null, ['class'=>'form-control','placeholder'=>'Nombres completos']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblDNI', 'Numero de DNI', ['class'=>'control-label']) !!}
                                    {!! Form::text('dni', null, ['class'=>'form-control','placeholder'=>'Numero de DNI']) !!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblFecha', 'Fecha de nacimiento', ['class'=>'control-label']) !!}
                                    {!!Form::date('fechanacimiento', null , ['class'=>'form-control','placeholder'=>'Fecha de nacimiento']);!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!!Form::label('lblPais', 'Pais de nacimiento',['class'=>'control-label']);!!}
                                    {!!Form::select('idpais',$pais, IdPeru() , ['class'=>'form-control']);!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblUbigeo', 'Lugar de nacimiento', ['class'=>'control-label']) !!}
                                    {!!Form::select('idubigeonacimiento',[], null , ['class'=>'form-control','id'=>'idubigeonacimiento']);!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblReligion', 'Religion que profesa', ['class'=>'control-label']) !!}
                                    {!!Form::text('religion', null , ['class'=>'form-control','placeholder'=>'Religion que profesa'])!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblSexo', 'Sexo', ['class'=>'control-label']) !!}
                                    {!!Form::select('idsexo', $sexo, IdMasculino() , ['class'=>'form-control'])!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblEstCivil', 'Estado Civil', ['class'=>'control-label']) !!}
                                    {!!Form::select('idestadocivil', $estadocivil, IdMasculino() , ['class'=>'form-control'])!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblGradoIn', 'Grado de instruccion', ['class'=>'control-label']) !!}
                                    {!!Form::text('gradoinstruccion', null, ['class'=>'form-control','placeholder'=>'Grado de instruccion'])!!}
                                </div>

                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblProfesion', 'Profesion', ['class'=>'control-label']) !!}
                                    {!!Form::text('profesion', null, ['class'=>'form-control','placeholder'=>'Profesion'])!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblTipo', 'Tipo de familiar', ['class'=>'control-label']) !!}
                                    {!!Form::select('idtipo', $tipofamiliar, null , ['class'=>'form-control'])!!}
                                </div>

                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('lblDireccion', 'Domicilio - calle', ['class'=>'control-label']) !!}
                                    {!! Form::text('direccion', null, ['class'=>'form-control','placeholder'=>'Nombres completos']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblUbigeo', 'Dsitrito de residencia:', ['class'=>'control-label']) !!}
                                    {!!Form::select('idubigeo',[], null , ['class'=>'form-control','id'=>'idubigeo']);!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblCelular', 'Telefono celular:', ['class'=>'control-label']) !!}
                                    {!! Form::text('celular', null, ['class'=>'form-control','placeholder'=>'Celular']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblFijo', 'Telefono Fijo:', ['class'=>'control-label']) !!}
                                    {!! Form::text('telefonofijo', null, ['class'=>'form-control','placeholder'=>'Telefono Fijo']) !!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblLaboral', 'Telefono de Trabajo:', ['class'=>'control-label']) !!}
                                    {!! Form::text('telefonolaboral', null, ['class'=>'form-control','placeholder'=>'Telefono de trabajo']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblEmail', 'Email', ['class'=>'control-label']) !!}
                                    {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>'Email']) !!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblApoderado', '¿Es Apoderado?', ['class'=>'control-label']) !!}
                                    <div class="input-group col-md-6">
                                        <div class="icheck-inline">
                                            <label>
                                                {!! Form::radio('esapoderado', true) !!}
                                                Si
                                            </label>
                                            <label>
                                                {!! Form::radio('esapoderado', false) !!}
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblAutorizo', 'Autorizo para incorporar y utilizar los siguientes datos', ['class'=>'control-label']) !!}
                                    <div class="input-group col-md-6">
                                        <div class="icheck-inline">
                                            <label>
                                                {!! Form::radio('autorizo', true) !!}
                                                Si
                                            </label>
                                            <label>
                                                {!! Form::radio('autorizo', false) !!}
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div><!--/row-->
                        {!! Form::hidden('idalumno', $idalumno) !!}
                    <div class="form-actions right">
                        {!!Form::enviar('Guardar')!!}
                        {!!Form::back(route('admin.familiar.lists',$idalumno))!!}
                    </div>
				{!! Form::close() !!}
                <!-- END FORM-->
            </div>
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>

@stop

@section('js-scripts')
<script>
$(document).ready(function() {

    $("#idubigeonacimiento").select2({

        ajax: {
            url: '{{ url("/ubigeo") }}',
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
    $("#idubigeo").select2({

        ajax: {
            url: '{{ url("/ubigeo") }}',
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
    $('input').iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal',
        increaseArea: '20%' // optional
    });
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
Creando familiar para {{ NombreAlumno($idalumno) }}
@stop

@section('page-subtitle')
@stop