@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12">
			@include('alerts.errors')
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Nuevo alumno </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="javascript:;" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
				{!! Form::open(['route'=>'admin.alumnos.store','method'=>'POST','class'=>'horizontal-form','files'=>true]) !!}
                    <div class="form-actions right">
                        {!!Form::enviar('Guardar')!!}
                        {!!Form::back(route('admin.alumnos.index'))!!}
                    </div>
                    <div class="form-body">
                        <h3 class="form-section">Datos Personales</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									{!! Form::label('paterno', 'Apellido Paterno', ['class'=>'control-label']) !!}
									{!! Form::text('paterno', null, ['class'=>'form-control','placeholder'=>'Apellido Paterno']) !!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
									{!! Form::label('lblMaterno', 'Apellido Materno', ['class'=>'control-label']) !!}
									{!! Form::text('materno', null, ['class'=>'form-control','placeholder'=>'Apellido Materno']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									{!! Form::label('lblNombres', 'Nombres', ['class'=>'control-label']) !!}
									{!! Form::text('nombres', null, ['class'=>'form-control','placeholder'=>'Nombres completos']) !!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
									{!! Form::label('lblDNI', 'Numero de DNI', ['class'=>'control-label']) !!}
									{!! Form::text('dni', null, ['class'=>'form-control','placeholder'=>'Numero de DNI']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                {!!Form::label('lblGrado', 'Grado Actual del alumno',['class'=>'control-label']);!!}
                                    {!!Form::select('idgrado',$grado, null , ['class'=>'form-control']);!!}
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
                                <div class="form-group">
                                    {!! Form::label('lblSexo', 'Sexo', ['class'=>'control-label']) !!}
                                    {!!Form::select('idsexo', $sexo, IdMasculino() , ['class'=>'form-control'])!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!!Form::label('lblSacramentos', 'Sacramentos',['class'=>'control-label']);!!}
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label>
                                                {!!Form::checkbox('bautismo',true)!!}
                                                 Bautizo
                                            </label>
                                            <label>
                                                {!!Form::checkbox('comunion',true)!!}
                                                Comunión
                                            </label>
                                            <label>
                                                {!!Form::checkbox('confirmacion',true)!!}
                                                Confirmación
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('lblDireccion', 'Domicilio - calle', ['class'=>'control-label']) !!}
                                    {!! Form::text('direccion', null, ['class'=>'form-control','placeholder'=>'Direccion completa']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblUbigeo', 'Dsitrito de residencia', ['class'=>'control-label']) !!}
                                    {!!Form::select('idubigeo',[], null , ['class'=>'form-control','id'=>'idubigeo']);!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblTelefonos', 'Telefonos', ['class'=>'control-label']) !!}
                                    {!! Form::text('telefonos', null, ['class'=>'form-control','placeholder'=>'Telefonos','maxlength'=>'100']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblTelefonoE1', 'Telefono de emergencia 1 / Preguntar por:', ['class'=>'control-label']) !!}
                                    {!! Form::text('telefonoemergencia1', null, ['class'=>'form-control','placeholder'=>'Telefono de emergencia','maxlength'=>'100']) !!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblTelefonoE2', 'Telefono de emergencia 2 / Preguntar por:', ['class'=>'control-label']) !!}
                                    {!! Form::text('telefonoemergencia2', null, ['class'=>'form-control','placeholder'=>'Telefono de emergencia','maxlength'=>'100']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblResEco', 'Responsable economico', ['class'=>'control-label']) !!}
                                    <div class="input-group">
                                        <div class="icheck-inline">
                                            <label>
                                                {!! Form::radio('responsableeconomico', 'padre',true) !!}
                                                Padre
                                            </label>
                                            <label>
                                                {!! Form::radio('responsableeconomico', 'madre') !!}
                                                Madre
                                            </label>
                                            <label>
                                                {!! Form::radio('responsableeconomico', 'apoderado') !!}
                                                Apoderado
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblColegio', 'Colegio de procedencia', ['class'=>'control-label']) !!}
                                    {!! Form::text('colegioprocedencia', null, ['class'=>'form-control','placeholder'=>'Colegio de procedencia']) !!}
                                </div>
                            </div>
                            <!--/span-->
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblEstado', 'Estado Alumno', ['class'=>'control-label']) !!}
                                    {!! Form::select('idestado', $estadoalumno,EstadoId('ESTADO ALUMNO','Regular'), ['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <h3 class="form-section">Fotografia</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::file('file', []) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <h3 class="form-section">Observacion</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!!Form::label('lblEsEspecial', 'Es un niño especial',['class'=>'control-label col-md-2']);!!}
                                    <div class="input-group col-md-10">
                                        <div class="icheck-inline">
                                            <label>
                                                {!! Form::radio('esespecial',1) !!}
                                                Si
                                            </label>
                                            <label>
                                                {!! Form::radio('esespecial',0,true) !!}
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    {!! Form::textarea('discapacidad', null, ['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!!Form::label('lblObservacion', 'Observacion, deudas, etc',['class'=>'control-label']);!!}
                                    {!! Form::textarea('observacion', null, ['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        {!! Form::hidden('idestado', EstadoId('ESTADO ALUMNO','Regular')) !!}
                    <div class="form-actions right">
                        {!!Form::enviar('Guardar')!!}
                        {!!Form::back(route('admin.alumnos.index'))!!}
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
Modulo de matricula
@stop

@section('page-subtitle')
@stop