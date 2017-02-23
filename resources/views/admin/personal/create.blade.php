@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12">
			@include('alerts.errors')
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Nuevo Personal </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="javascript:;" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
				{!! Form::open(['route'=>'admin.personal.store','method'=>'POST','class'=>'horizontal-form','files'=>true]) !!}
                    <div class="form-actions right">
                        {!!Form::enviar('Guardar')!!}
                        {!!Form::back(route('admin.personal.index'))!!}
                    </div>
                    <div class="form-body">
                        <h3 class="form-section">Datos Personales</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									{!! Form::label('paterno', 'Apellido Paterno', ['class'=>'control-label']) !!}
									{!! Form::text('paterno', null, ['class'=>'form-control','placeholder'=>'Apellido Paterno']) !!}
                                </div>
                            </div> <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
									{!! Form::label('lblMaterno', 'Apellido Materno', ['class'=>'control-label']) !!}
									{!! Form::text('materno', null, ['class'=>'form-control','placeholder'=>'Apellido Materno']) !!}
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									{!! Form::label('lblNombres', 'Nombres', ['class'=>'control-label']) !!}
									{!! Form::text('nombres', null, ['class'=>'form-control','placeholder'=>'Nombres completos']) !!}
                                </div>
                            </div><!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
									{!! Form::label('lblDNI', 'Numero de DNI', ['class'=>'control-label']) !!}
									{!! Form::text('dni', null, ['class'=>'form-control','placeholder'=>'Numero de DNI']) !!}
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblFecha', 'Fecha de nacimiento', ['class'=>'control-label']) !!}
                                    {!!Form::date('fechanacimiento', null , ['class'=>'form-control','placeholder'=>'Fecha de nacimiento']);!!}
                                </div>
                            </div><!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblEmail', 'Email', ['class'=>'control-label']) !!}
                                    {!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'Email del personal']) !!}
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblEstCivil', 'Estado Civil', ['class'=>'control-label']) !!}
                                    {!!Form::select('idestadocivil', $estadocivil, EstadoCivilId('ESTADO CIVIL','Soltero') , ['class'=>'form-control'])!!}
                                </div>
                            </div><!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblSexo', 'Sexo', ['class'=>'control-label']) !!}
                                    {!!Form::select('idsexo', $sexo, IdMasculino() , ['class'=>'form-control'])!!}
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!!Form::label('lblPais', 'Pais de nacimiento',['class'=>'control-label']);!!}
                                    {!!Form::select('idpais',$pais, IdPeru() , ['class'=>'form-control']);!!}
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
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
                                    {!! Form::label('lblUbigeo', 'Distrito de residencia', ['class'=>'control-label']) !!}
                                    {!!Form::select('idubigeo',[], null , ['class'=>'form-control','id'=>'idubigeo']);!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblHijos', 'Numero de Hijos', ['class'=>'control-label']) !!}
                                    {!! Form::text('numerohijos', 0, ['class'=>'form-control','placeholder'=>'Numero Hijos']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblTelefonoFijo', 'Telefono Fijo', ['class'=>'control-label']) !!}
                                    {!! Form::text('telefonofijo', null, ['class'=>'form-control','placeholder'=>'Telefono Fijo','maxlength'=>'100']) !!}
                                </div>
                            </div><!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblCelular', 'Celular', ['class'=>'control-label']) !!}
                                    {!! Form::text('celular', null, ['class'=>'form-control','placeholder'=>'Celular','maxlength'=>'100']) !!}
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblUniversidad', 'Universidad', ['class'=>'control-label']) !!}
                                    {!! Form::text('universidad', null, ['class'=>'form-control','placeholder'=>'Universidad','maxlength'=>'100']) !!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblCulmino', 'Culmino', ['class'=>'control-label']) !!}
                                    <div class="input-group">
                                        <div class="icheck-inline">
                                            <label>
                                                {!! Form::radio('culmino', true,true) !!}
                                                Si
                                            </label>
                                            <label>
                                                {!! Form::radio('culmino', false) !!}
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblCarrera', 'Carrera', ['class'=>'control-label']) !!}
                                    {!! Form::text('carrera', null, ['class'=>'form-control','placeholder'=>'Carrera']) !!}
                                </div>
                            </div><!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblGestion', 'Gestion de la universidad', ['class'=>'control-label']) !!}
                                    {!!Form::select('idgestionuniversidad',$gestion, EstadoId('GESTION','Estatal') , ['class'=>'form-control','placeholder'=>'Selecionar Gestion']);!!}
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblGrado', 'Grado Obtenido', ['class'=>'control-label']) !!}
                                    {!! Form::text('gradoobtenido', null, ['class'=>'form-control','placeholder'=>'Grado Obtenido']) !!}
                                </div>
                            </div><!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblFecha', 'Fecha de egreso', ['class'=>'control-label']) !!}
                                    <div class="input-group ">
                                        {!!Form::text('fechaegreso', null , ['id'=>'fechaegreso','class'=>'form-control','placeholder'=>'Fecha de egreso']);!!}
                                        <span class="input-group-btn ">
                                            <button class="btn " type="button">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblColegiatura', 'Numero de colegiatura', ['class'=>'control-label']) !!}
                                    {!! Form::text('numerocolegiatura', null, ['class'=>'form-control','placeholder'=>'Numero de Colegiatura']) !!}
                                </div>
                            </div><!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblPension', 'Sistema de Pension', ['class'=>'control-label']) !!}
                                    {!! Form::select('idsistemapension',$sistemapension ,EstadoId('SISTEMA PENSION','AFP'), ['class'=>'form-control','placeholder'=>'Seleccionar Sistema de Pension']) !!}
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblAfp', 'Ingresar AFP si corresponde', ['class'=>'control-label']) !!}
                                    {!! Form::text('afp', null, ['class'=>'form-control','placeholder'=>'nombre del afp']) !!}
                                </div>
                            </div><!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblVigente', 'Está Vigente', ['class'=>'control-label']) !!}
                                    <div class="input-group">
                                        <div class="icheck-inline">
                                            <label>
                                                {!! Form::radio('vigente', true,true) !!}
                                                Si
                                            </label>
                                            <label>
                                                {!! Form::radio('vigente', false) !!}
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('lblTipo', 'Tipo de Personal', ['class'=>'control-label']) !!}
                                    {!! Form::select('idtipo',$tipopersonal, EstadoId('TIPO PERSONAL','Docente'), ['class'=>'form-control','placeholder'=>'Tipo de Personal']) !!}
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        <h3 class="form-section">Fotografia</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                    <div>
                                        <span class="btn green btn-file">
                                            <span class="fileinput-new"> Seleccionar Imagen </span>
                                            <span class="fileinput-exists"> Cambiar </span>
                                            {{ Form::file('file', []) }}
                                        </span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Quitar </a>
                                    </div>
                                </div>
                            </div><!--/span-->
                        </div><!--/row-->
                        {!! Form::hidden('idestado', EstadoId('ESTADO ALUMNO','Regular')) !!}
                    <div class="form-actions right">
                        {!!Form::enviar('Guardar')!!}
                        {!!Form::back(route('admin.personal.index'))!!}
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

    $("#fechaegreso").datepicker({
        minViewMode: 2
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
        width:'auto',
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
{!! Html::style(asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/icheck/skins/all.css')) !!}
{!! Html::style(asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')) !!}
@stop
@section('plugins-js')
{!! Html::script(asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')) !!}
{!! Html::script(asset('assets/global/plugins/select2/js/select2.full.min.js')) !!}
{!! Html::script(asset('assets/global/plugins/select2/js/i18n/es.js')) !!}
{!! Html::script(asset('assets/global/plugins/icheck/icheck.min.js')) !!}
{!! Html::script(asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')) !!}
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
Modulo de Personal
@stop

@section('page-subtitle')
@stop