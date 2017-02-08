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
                    Datos
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
            <form class="form-horizontal" role="form">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <img src="{{ asset('/storage/'.$matricula->alumno->foto) }}" width="200px">
                            </div>
                        </div><!--span-->
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Nombre del alumno:</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{ $matricula->alumno->nombre_completo }} </p>
                                        </div>
                                    </div>
                                </div><!--/span-->
                            </div><!--row-->
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-6">Grado : </label>
                                        <div class="col-md-6">
                                            <p class="form-control-static"> {{ $matricula->grado_matriculado }} </p>
                                        </div>
                                    </div>
                                </div><!--/span-->
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-6">Año de Ingreso I.E.P.:</label>
                                        <div class="col-md-6">
                                            <p class="form-control-static"> {{ $matricula->year }} </p>
                                        </div>
                                    </div>
                                </div><!--/span-->
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-6">Se retira Solo:</label>
                                        <div class="col-md-6">
                                            <p class="form-control-static"> {{ $matricula->se_retira_solo }} </p>
                                        </div>
                                    </div>
                                </div><!--/span-->
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-6">Se retira con su hermano:</label>
                                        <div class="col-md-6">
                                            <p class="form-control-static"> {{ $matricula->se_retira_hermano }} </p>
                                        </div>
                                    </div>
                                </div><!--/span-->
                                <div class="col-md-8">
                                    <div class="form-group">
                                        {!!Form::botonmodal('Actualizar datos de retiro','#RetiroAlumno','green-meadow','fa fa-refresh')!!}
                                        <div class="col-md-6">
                                        </div>
                                    </div>
                                </div><!--/span-->
                            </div><!--row-->
                        </div><!--span-->
                    </div><!--row-->
                </div>
             </form>

            {!! Form::open(['route'=>'admin.retiro.store','method'=>'POST','class'=>'form-horizontal']) !!}
            <div class="form-body">
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::hidden('idalumno', $matricula->idalumno ) !!}
                        {!! Form::hidden('idmatricula', $matricula->id ) !!}
                        {!! Form::label('lblNombres', 'Nombres', ['class'=>'control-label']) !!}
                        {!! Form::text('nombres', null, ['class'=>'form-control','placeholder'=>'nombres']) !!}
                    </div><!--span-->
                    <div class="col-md-3">
                        {!! Form::label('lblDNI', 'DNI', ['class'=>'control-label']) !!}
                        {!! Form::text('dni', null, ['class'=>'form-control','placeholder'=>'Ingrese DNI']) !!}
                    </div><!--span-->
                    <div class="col-md-3">
                        {!! Form::label('lblTelefono', 'Telefono', ['class'=>'control-label']) !!}
                        {!! Form::text('telefono', null, ['class'=>'form-control','placeholder'=>'Telefono']) !!}
                    </div><!--span-->
                    <div class="col-md-3">
                        {!! Form::label('lblParentesco', 'Parentesco', ['class'=>'control-label']) !!}
                        {!! Form::select('idparentesco',$tipofamiliar ,null, ['class'=>'form-control']) !!}
                    </div><!--span-->
                    <div class="col-md-3">
                        <div style="margin-top:10px">
                            {!!Form::enviar('Guardar')!!}{!!Form::back(route('admin.matricula.index'))!!}
                        </div>
                    </div><!--span-->
                </div><!--row-->
            </div>
            {!! Form::close() !!}
            <p></p>
            <!-- END FORM-->
            <h3>Personas Autorizadas</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-scrollable">
                        <table class="table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th> Nombres </th>
                                    <th> DNI</th>
                                    <th> Telefono </th>
                                    <th> Parentesco </th>
                                    <th> Opciones </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($personas_a as $item)
                                <tr>
                                    <td> {{ $item->nombres }}        </td>
                                    <td> {{ $item->dni }}    </td>
                                    <td> {{ $item->telefono }}           </td>
                                    <td> {{ $item->parentesco }}           </td>
                                    <td> {!!Form::boton('Eliminar',route('admin.retiro.delete',$item->id),'red','fa fa-trash',null,['data-toggle'=>'confirmation','data-original-title'=>'¡Esta seguro!'])!!} </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div><!--/span-->
                </div><!--/row-->

            </div><!--/Porlet Body-->
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>
<div class="modal fade" id="RetiroAlumno" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Actualiza datos de retiro del alumno</h4>
            </div>
            {!! Form::model($matricula,['route'=>['admin.retiro.update',$matricula],'method'=>'PUT','class'=>'form-horizontal']) !!}
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        {!! Form::label('lblSolo', '¿Se retira Solo del establecimiento?', ['class'=>'control-label col-md-6']) !!}
                        <div class="col-md-6">
                            {!! Form::checkbox('retiro_solo', true, null, ['class'=>'make-switch','data-on-text'=>'Si','data-off-text'=>'No']) !!}
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        {!! Form::label('lblSoloHermano', '¿Se retira con su hermano?', ['class'=>'control-label col-md-6']) !!}
                        <div class="col-md-6">
                            {!! Form::checkbox('retiro_hermano', true, null, ['class'=>'make-switch','data-on-text'=>'Si','data-off-text'=>'No']) !!}
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        {!! Form::label('lblHermano', 'Nombre del hermano:', ['class'=>'control-label col-md-6']) !!}
                        <div class="col-md-6">
                            {!! Form::text('retiro_hermano_nombre', null, ['class'=>'form-control','placeholder'=>'Nombre del hermano']) !!}
                        </div>
                    </div><!--/span-->
                </div>
            </div>
            <div class="modal-footer">
                {!!Form::enviar('Actualizar')!!}
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@stop
@section('js-scripts')
<script>

</script>
@stop

@section('plugins-styles')

@stop

@section('plugins-js')
{!! Html::script('assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}

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
Retiro del establecimiento
@stop

@section('page-subtitle')
@stop