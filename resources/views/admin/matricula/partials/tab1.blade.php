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
                {!!Form::select('idgradoseccion', $gradoseccion, null , ['class'=>'form-control'])!!}
            </div>
        </div><!--/span-->
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('lblTipo', 'Tipo de Matricula', ['class'=>'control-label']) !!}
                {!!Form::select('idtipo', $tipomatricula, EstadoId('TIPO MATRICULA','Activa') , ['class'=>'form-control'])!!}
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
    <h3 class="form-section">Alumnos matriculados</h3>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="Matriculados">
                <thead>
                    <tr>
                        <th> Alumnos </th>
                        <th> Grado actual</th>
                        <th> Foto </th>
                        <th> Periodo </th>
                        <th> Tipo </th>
                        <th> Opciones </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($Lista as $item)
                    <tr>
                        <td> {{ $item->paterno.' - '.$item->materno.', '.$item->nombres }} </td>
                        <td> {{ $item->grado }} </td>
                        <td><a href="{{ route('admin.alumnos.show',$item->id) }}"><img src="{{ asset('/storage/'.$item->foto) }}"  width='25px'> </a></td>
                        <td> {{ $item->year }} </td>
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
                                        <a href="{{ route('admin.matricula.print',$item->id) }}">
                                            <i class="fa fa-file-pdf-o"></i> Recibo </a>
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