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
                    Ingreso de notas
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
                    <div class="table-scrollable">


        {!! Form::open(['route'=>'docentes.indicadores.ingresa','method'=>'POST']) !!}
                        <table class="table table-bordered" id="Indicadores">
                            <thead>
                                <tr>
                                    <th>  </th>
                                    <th>  </th>
                                    @for ($i = 0; $i < 4; $i++)
                                        @if (isset($capacidades[$i]))
                                            <th colspan="4" width="50%">
                                                {{ $capacidades[$i]->nombre }}
                                            </th>

                                        @else
                                            <th> sin capacidad </th>
                                        @endif
                                    @endfor
                                    <th>  </th>
                                </tr>
                                <tr>
                                    <th> Periodo </th>
                                    <th> Alumno </th>
                                    @for ($i = 0; $i < 4; $i++)
                                        @for ($j = 0; $j < 4; $j++)
                                            @if (isset($capacidades[$i]))
                                                <th>{{ IndicadorDeCapacidad($capacidades[$i]->id,$j) }}</th>
                                            @endif
                                        @endfor
                                    @endfor
                                    <th> Promedio</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($practicaresumen as $item)
                                <tr>
                                    <td> {{ $item->periodo_academico }} </td>
                                    <td> {{ $item->alumno->nombre_completo }} </td>
                                    {!!Form::hidden('id['.$loop->index.']',$item->id);!!}
                                    @for ($i = 0; $i < 16; $i++)
                                        <td>
                                            @if (IndicadorActivo($item->idperiodoacademico,($i+1)))
                                            {!!Form::textnota('in_'.pad($i+1,2,'0','L').'['.$loop->index.']', $item['in_'.pad($i+1,2,'0','L')] );!!}
                                            @else
                                                {{ $item['in_'.pad($i+1,2,'0','L')] }}
                                            @endif
                                        </td>
                                    @endfor
                                    <td> Promedio</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    {!!Form::enviar('Guardar')!!}
        {!! Form::close() !!}
                    </div>
                    </div><!--/span-->
                </div><!--/row-->

            </div><!--/Porlet Body-->
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>

@stop

@section('plugins-styles')
{!! Html::style(asset('assets/global/plugins/bootstrap-table/bootstrap-table.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/datatables/datatables.min.css')) !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
@stop

@section('plugins-js')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-table/bootstrap-table.min.js') !!}
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
{{ $asignatura }}
@stop

@section('page-subtitle')
@stop