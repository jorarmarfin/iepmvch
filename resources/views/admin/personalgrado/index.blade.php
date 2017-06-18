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
                    Tutoria
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
            {!! Form::open(['route'=>'admin.personalgrado.store','method'=>'POST']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('lblGradoSeccion', 'Grado Seccion');!!}
                            {!!Form::select('idgrado',$gradoseccion2 ,null , ['class'=>'form-control','placeholder'=>'Grado Seccion']);!!}
                        </div>
                    </div><!--span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('lblPersonal', 'Personal ',['class'=>'col-md-12']);!!}
                            {!!Form::select('idpersonal',$allpersonal ,null , ['class'=>'form-control']);!!}
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
                            <th> Personal </th>
                            <th> Opciones </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>  </th>
                            <th>  </th>
                            <th>  </th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($Lista as $item)
                        <tr>
                            <td> {{ $item->grado }} </td>
                            <td> {{ $item->personal }} </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs green-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Opciones
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-left" role="menu">
                                        <li>
                                            <a href="{{ route('admin.personalgrado.edit',$item->id) }}">
                                                <i class="fa fa-edit"></i> Edit </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.personalgrado.delete',$item->id) }}">
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
$('#Asignaturas').dataTable({
    "language": {
        "emptyTable": "No hay datos disponibles",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
        "search": "Buscar :",
        "lengthMenu": "_MENU_ registros"
    },
    "bProcessing": true,
    "pagingType": "bootstrap_full_number",
    "order": [0,"asc"],
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
Plan Curricular / Asignacion de Tutoria
@stop

@section('page-subtitle')
@stop