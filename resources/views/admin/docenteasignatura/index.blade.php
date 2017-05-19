@extends('layouts.base')

@section('content')
@include('alerts.errors')
{!! Alert::render() !!}
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-book"></i>
                    Docente Grado
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
            {!! Form::open(['route'=>'admin.personalasignatura.store','method'=>'POST']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('lblpersonal', 'Personal');!!}
                            {!!Form::select('idpersonal',$allpersonal ,null , ['class'=>'form-control','placeholder'=>'Personal','id'=>'Personal']);!!}
                        </div>
                    </div><!--span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('lblGradoSeccion', 'Grado Seccion',['class'=>'col-md-12']);!!}
                            {!!Form::select('idgradoseccion',$gradoseccion ,null , ['class'=>'form-control','id'=>'GradoSeccion']);!!}
                        </div>
                    </div><!--span-->
                </div><!--row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!!Form::label('lblAsignatura', 'Areas');!!}
                            {!!Form::select('idareas[]',[] ,null , ['class'=>'form-control','id'=>'Areas','multiple']);!!}
                        </div>
                    </div><!--span-->
                </div><!--row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!!Form::label('lblAsignatura', 'Sub Areas');!!}
                            {!!Form::select('idasignaturagradoseccion[]',[] ,null , ['class'=>'form-control','id'=>'Asignatura','multiple']);!!}
                        </div>
                    </div><!--span-->
                </div><!--row-->
                {!!Form::enviar('Guardar')!!}
            {!! Form::close() !!}
            <p></p>
                <table class="table table-striped table-hover" id="Asignaturas">
                    <thead>
                        <tr>
                            <th> Personal </th>
                            <th> Area </th>
                            <th> SubArea </th>
                            <th> Opciones </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($Lista as $item)
                        <tr>
                            <td> {{ $item->nombre_personal }} </td>
                            <td> {{ $item->nombre_area }} </td>
                            <td> {{ $item->nombre_asignatura }} </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs green-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Opciones
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-left" role="menu">
                                        <li>
                                            <a href="{{ route('admin.personalasignatura.edit',$item->id) }}">
                                                <i class="fa fa-edit"></i> Edit </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.personalasignatura.delete',$item->id) }}">
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

@stop

@section('js-scripts')
<script>
$('#Personal').select2();

$.fn.FillSelect =function (values) {
    var options = '';
    $.each(values,function(key,row){
        options += '<option value="' + row.id+ '">'+ row.text +'</option>'
    });
    $(this).html(options);
}

$('#GradoSeccion').change(function() {
    $('#Asignatura').empty();
    var idgradoseccion = $(this).val();


    if (idgradoseccion == '') {
        $('#Asignatura').empty();
    }else{
        $.getJSON('personal-ags-combo/'+idgradoseccion,null,function (values) {
            $('#Asignatura').FillSelect(values);
        });
        $.getJSON('personal-area-combo/'+idgradoseccion,null,function (values) {
            $('#Areas').FillSelect(values);
        });
    }
});

$('.mt-multiselect').multiselect({
    buttonWidth:'100%',
    includeSelectAllOption: true,
    buttonClass:'btn btn-default'

});
$('#Asignaturas').dataTable({
    "language": {
        "emptyTable": "No hay datos disponibles",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
        "search": "Buscar :",
        "lengthMenu": "_MENU_ registros"
    },
    "bProcessing": true,
    "pagingType": "bootstrap_full_number",
    "order": [0,"asc"]
});
</script>
@stop



@section('plugins-styles')
{!! Html::style('assets/global/plugins/datatables/datatables.min.css') !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
{!! Html::style('assets/global/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css') !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')) !!}
@stop

@section('plugins-js')
{!! Html::script(asset('assets/global/plugins/select2/js/select2.full.min.js')) !!}
{!! Html::script(asset('assets/global/plugins/select2/js/i18n/es.js')) !!}
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/scripts/datatable.js') !!}
{!! Html::script('assets/global/plugins/datatables/datatables.min.js') !!}
{!! Html::script('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js') !!}
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
Plan Curricular / Asignaturas Grado Seccion
@stop

@section('page-subtitle')
@stop