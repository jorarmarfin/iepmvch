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
            {!!Form::boton('Importar Grados y Areas',route('admin.personalasignatura.importar'),'green-meadow margin-bottom-20')!!}
            {!! Form::open(['route'=>'admin.personalasignatura.store','method'=>'POST']) !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!!Form::label('lblpersonal', 'Personal');!!}
                            {!!Form::select('idpersonal',$allpersonal ,null , ['class'=>'form-control','placeholder'=>'Personal','id'=>'Personal']);!!}
                        </div>
                    </div><!--span-->
                </div><!--row-->
                {!!Form::enviar('Guardar')!!}
            <p></p>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="PersonalAsignatura">
                    <thead>
                        <tr>
                            <th>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" data-set="#PersonalAsignatura .checkboxes" />
                                    <span></span>
                                </label>
                            </th>
                            <th> Personal </th>
                            <th> Grado </th>
                            <th> Area </th>
                            <th> SubArea </th>
                            <th> Opciones </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th> </th>
                            <th> Personal </th>
                            <th> Grado </th>
                            <th> Area </th>
                            <th> SubArea </th>
                            <th> Opciones </th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($Lista as $item)
                        <tr>
                            <td>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" name="personal_asignatura[]" class="checkboxes" value="{{ $item->id }}" />
                                    <span></span>
                                </label>
                            </td>
                            <td> {{ $item->nombre_personal }} </td>
                            <td> {{ $item->nombre_grado }} </td>
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
            {!! Form::close() !!}
            </div>
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>

@stop

@section('js-scripts')
<script>
$('#Personal').select2();
var table = $('#PersonalAsignatura');
table.dataTable({
    "language": {
        "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
        "emptyTable": "No hay datos disponibles",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
        "search": "Buscar :",
        "lengthMenu": "_MENU_ registros"
    },
    "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
    "lengthMenu": [ 10 ,25, 50, 75, 100 ],
    "pagingType": "bootstrap_full_number",
    "columnDefs": [
                {  // set default column settings
                    'orderable': false,
                    'targets': [0]
                }
            ],
    "order": [
                [1, "asc"]
            ], // set first column as a default sort by asc
    "initComplete": function() {
            // Columna Grado
            this.api().column(2).every(function(){
                var column = this;
                var select = $('<select class="form-control input-sm"><option value="">Grado</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            });
        }
});
table.find('.group-checkable').change(function () {
        var set = jQuery(this).attr("data-set");
        var checked = jQuery(this).is(":checked");
        jQuery(set).each(function () {
            if (checked) {
                $(this).prop("checked", true);
                $(this).parents('tr').addClass("active");
            } else {
                $(this).prop("checked", false);
                $(this).parents('tr').removeClass("active");
            }
        });
    });

table.on('change', 'tbody tr .checkboxes', function () {
        $(this).parents('tr').toggleClass("active");
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