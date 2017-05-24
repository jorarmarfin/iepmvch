@extends('layouts.base')

@section('content')
@include('alerts.errors')
<div class="row">
    <div class="col-md-12">
        {!! Alert::render() !!}
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-table"></i>
                    Notas de practicas
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
             {!! Form::open(['route'=>'admin.matricula.store','method'=>'POST']) !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                {!! Form::label('lblAlumno', 'Escoger el alumno a matricular', ['class'=>'control-label']) !!}
                                {!!Form::select('idalumno', [], null , ['class'=>'form-control','id'=>'matriculables'])!!}
                            </div>
                        </div><!--/span-->
                    </div><!--/row-->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('lblGrado', 'Escoger el grado al que fue promovido', ['class'=>'control-label']) !!}
                                {!!Form::select('idgradoseccion', [], null , ['class'=>'form-control'])!!}
                            </div>
                        </div><!--/span-->
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('lblTipo', 'Tipo de Matricula', ['class'=>'control-label']) !!}
                                {!!Form::select('idtipo', [], EstadoId('TIPO MATRICULA','Activa') , ['class'=>'form-control'])!!}
                            </div>
                        </div><!--/span-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <p></p>
                            {!!Form::enviar('Matricular')!!}
                            </div>
                        </div><!--/span-->
                    </div><!--/row-->
                {!! Form::close() !!}
                {!!Form::boton('Reporte General',route('admin.matricula.reporte'),'green-meadow','fa fa-file-pdf-o')!!}
                {!!Form::boton('Reporte por Grado',route('admin.matricula.reportegrado'),'green-meadow','fa fa-file-pdf-o')!!}
                <h3 >Alumnos matriculados</h3>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover table-bordered table-condensed" id="Matriculados">
                            <thead>
                                <tr>
                                    <th> Alumnos </th>
                                    <th> Nivel Matriculado</th>
                                    <th> Grado Matriculado</th>
                                    <th> Foto </th>
                                    <th> Periodo </th>
                                    <th> Fecha Matricula </th>
                                    <th> Tipo </th>
                                    <th> Opciones </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>  </th>
                                    <th>  </th>
                                    <th>  </th>
                                    <th>  </th>
                                    <th>  </th>
                                    <th>  </th>
                                    <th>  </th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach ($Lista as $item)
                                <tr>
                                    <td> {{ $item->paterno.' - '.$item->materno.', '.$item->nombres }} </td>
                                    <td> {{ $item->nivel }} </td>
                                    <td> {{ $item->grado }} </td>
                                    <td><a href="{{ route('admin.alumnos.show',$item->idalumno) }}"><img src="{{ asset('/storage/'.$item->foto) }}"  width='25px'> </a></td>
                                    <td> {{ $item->year }} </td>
                                    <td> {{ $item->fecha_matricula }} </td>
                                    <td> {{ $item->tipo }} </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Opciones
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-left" role="menu">
                                                <li>
                                                    <a href="{{ route('admin.matricula.edit',$item->id) }}">
                                                        <i class="fa fa-edit"></i> Edit </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.matricula.delete',$item->id) }}">
                                                        <i class="fa fa-trash"></i> Delete </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.matricula.compromiso',$item->id) }}">
                                                        <i class="fa fa-file-pdf-o"></i> Compromiso </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.checklist.show',$item->id) }}">
                                                        <i class="fa fa-check"></i> CheckList </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.hermanos.show',$item->id) }}">
                                                        <i class="fa fa-users"></i> Hermanos </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.retiro.show',$item->id) }}">
                                                        <i class="fa fa-sign-out"></i> Retiro </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!--/span-->
                </div><!--/row-->

            </div><!--/Porlet Body-->
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>

@stop
@section('js-scripts')
<script>
$(document).ready(function() {

    $("#matriculables").select2({

        ajax: {
            url: '{{ url("/alumnos-matriculables") }}',
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
    $('#Matriculados').dataTable({
        "language": {
            "emptyTable": "No hay datos disponibles",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
            "search": "Buscar Alumnos :",
            "lengthMenu": "_MENU_ registros",
            "infoFiltered": " - filtrado para _MAX_ registros"
        },
        "bProcessing": true,
        "pagingType": "bootstrap_full_number",
        "order": [1,"asc"],
        "initComplete": function() {
            // Nivel column
            this.api().column(1).every(function(){
                var column = this;
                var select = $('<select class="form-control input-sm"><option value="">Nivel</option></select>')
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
            // Grado
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

});
</script>
@stop

@section('plugins-styles')
{!! Html::style(asset('assets/global/plugins/bootstrap-table/bootstrap-table.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/datatables/datatables.min.css')) !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
@stop

@section('plugins-js')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-table/bootstrap-table.min.js') !!}
{!! Html::script(asset('assets/global/plugins/select2/js/select2.full.min.js')) !!}
{!! Html::script(asset('assets/global/plugins/select2/js/i18n/es.js')) !!}
{!! Html::script('assets/global/scripts/datatable.js') !!}
{!! Html::script('assets/global/plugins/datatables/datatables.min.js') !!}
{!! Html::script('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}

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

@stop

@section('page-subtitle')
@stop