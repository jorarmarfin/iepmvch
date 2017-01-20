@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12">
    {!! Alert::render() !!}
    @include('alerts.errors')
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-table"></i>
                    Familiares
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
                {!! Form::open(['route'=>'admin.familiar.relation','method'=>'POST']) !!}
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            {!! Form::label('lblAlumno', 'Si el padre ya existe puede escogerlo y asignarlo al alumno', ['class'=>'control-label']) !!}
                            {!!Form::select('idfamiliar', [], null , ['class'=>'form-control','id'=>'familiares'])!!}
                            {!! Form::hidden('idalumno', $id) !!}
                        </div>
                    </div><!--/span-->
                    <div class="col-md-4">
                        <div class="form-group">
                            <p></p>
                        {!!Form::enviar('Agregar')!!}
                        </div>
                    </div><!--/span-->
                </div><!--/row-->
                {!! Form::close() !!}
                {!!Form::boton('Nuevo Familiar',route('admin.familiar.create',$id),'green','fa fa-plus')!!}
                {!!Form::back(route('admin.alumnos.index'))!!}
            <p></p>
                <table class="table table-hover table-bordered" >
                    <thead>
                        <tr>
                            <th> Paterno </th>
                            <th> Materno </th>
                            <th> Nombres </th>
                            <th> Opciones </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($Lista as $item)
                        <tr>
                            <td> {{ $item->paterno }} </td>
                            <td> {{ $item->materno }} </td>
                            <td> {{ $item->nombres.' ('.$item->tipo.')' }} </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs green-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Opciones
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-left" role="menu">
                                        <li>
                                            <a href="{{ route('admin.familiar.show',$item->id) }}">
                                                <i class="fa fa-eye"></i> Show </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.familiar.edit',$item->id) }}">
                                                <i class="fa fa-edit"></i> Edit </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.familiar.delete',$item->id) }}">
                                                <i class="fa fa-trash"></i> Delete </a>
                                        </li><li>
                                            <a href="{{ route('admin.familiar.quitar',$item->id) }}">
                                                <i class="fa fa-mail-reply"></i> Quitar </a>
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
$(document).ready(function() {

    $("#familiares").select2({

        ajax: {
            url: '{{ url("/familiares") }}',
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

});
</script>
@stop

@section('plugins-styles')
{!! Html::style('assets/global/plugins/bootstrap-table/bootstrap-table.min.css') !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')) !!}
@stop

@section('plugins-js')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-table/bootstrap-table.min.js') !!}
{!! Html::script(asset('assets/global/plugins/select2/js/select2.full.min.js')) !!}
{!! Html::script(asset('assets/global/plugins/select2/js/i18n/es.js')) !!}
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
Familiar de alumno {{ NombreAlumno($id) }}
@stop

@section('page-subtitle')
@stop