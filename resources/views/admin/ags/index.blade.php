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
                    Lista de Sub areas con grados
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
            {!! Form::open(['route'=>'admin.ags.store','method'=>'POST']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('lblGradoSeccion', 'Grado Seccion');!!}
                            {!!Form::select('idgradoseccion',$gradoseccion2 ,null , ['class'=>'form-control','placeholder'=>'Grado Seccion']);!!}
                        </div>
                    </div><!--span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('lblArea', 'Area',['class'=>'col-md-12']);!!}
                            {!!Form::select('idarea[]',$areaactivado ,null , ['multiple'=>'multiple','class'=>'form-control mt-multiselect btn btn-default','data-label'=>'left']);!!}
                        </div>
                    </div><!--span-->
                    <div class="col-md-6">
                        {!! Form::label('lblCulminoSubArea', 'SubArea', ['class'=>'control-label']) !!}
                        <div class="input-group">
                            <div class="icheck-inline">
                                <label>
                                    {!! Form::radio('subarea', 1,1) !!}
                                    Si
                                </label>
                                <label>
                                    {!! Form::radio('subarea', 0) !!}
                                    No
                                </label>
                            </div>
                        </div>
                    </div><!--span-->
                </div><!--row-->
                <p></p>
                <p></p>
                {!!Form::enviar('Guardar')!!}
            {!! Form::close() !!}
            <p></p>
                <table class="table table-striped table-hover" id="Asignaturas">
                    <thead>
                        <tr>
                            <th> Grado </th>
                            <th> Area </th>
                            <th> sub Area </th>
                            <th> Opciones </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($Lista as $item)
                        <tr>
                            <td> {{ $item->grado }} </td>
                            <td> {{ $item->nombre_area }} </td>
                            <td> {{ $item->asignatura }} </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs green-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Opciones
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-left" role="menu">
                                        <li>
                                            <a href="{{ route('admin.asignatura.edit',$item->id) }}">
                                                <i class="fa fa-edit"></i> Edit </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.ags.delete',$item->id) }}">
                                                <i class="fa fa-trash"></i> Delete </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <h2>Duplicar</h2>
            {!! Form::open(['route'=>'admin.ags.duplicar','method'=>'POST']) !!}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!!Form::label('lblGradoSeccion', 'Grado Seccion');!!}
                            {!!Form::select('idgradoseccion',$gradoseccion2 ,null , ['class'=>'form-control','placeholder'=>'Grado Seccion']);!!}
                        </div>
                    </div><!--span-->
                    <div class="col-md-4">
                        <div class="form-group">
                            {!!Form::label('lblGradoSeccion', 'Copiar al grado');!!}
                            {!!Form::select('idgradoseccioncopia[]',$gradoseccion2 ,null , ['multiple'=>'multiple','class'=>'form-control mt-multiselect']);!!}
                        </div>
                    </div><!--span-->
                    <div class="col-md-4">
                        {!!Form::enviar('Duplicar','yellow margin-top-20')!!}
                    </div><!--span-->
                </div><!--row-->
            {!! Form::close() !!}

            </div>
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>

@stop

@section('js-scripts')
<script>
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
    "lengthMenu": [ 25, 50, 75, 100 ],
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
{!! Html::style(asset('assets/global/plugins/icheck/skins/all.css')) !!}
@stop

@section('plugins-js')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/scripts/datatable.js') !!}
{!! Html::script('assets/global/plugins/datatables/datatables.min.js') !!}
{!! Html::script('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js') !!}
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
Plan Curricular / Grado Seccion Area
@stop

@section('page-subtitle')
@stop