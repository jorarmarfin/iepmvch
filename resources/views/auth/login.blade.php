@extends('layouts.login5')

@section('content')
{!! Form::open(['url'=>'login','method'=>'POST','class'=>'login-form']) !!}
    @include('alerts.errors')
    <div class="row">
            <div class="col-xs-6">
            {!!Form::text('username',old('username'), ['class'=>'form-control form-control-solid placeholder-no-fix form-group','placeholder'=>'DNI'])!!}
            </div>
        <div class="col-xs-6">
            {!!Form::password('password', ['class'=>'form-control form-control-solid placeholder-no-fix form-group','placeholder'=>'Clave'])!!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="rem-password">
            </div>
        </div>
        <div class="col-sm-8 text-right">
            <div class="forgot-password">
                <a href="{{ url('/password/reset') }}" class="forget-password">Olvide mi clave</a>
            </div>
            {!!Form::submit('Entrar',['class'=>'btn green uppercase'])!!}
        </div>
    </div>
{!! Form::close() !!}
@stop

@section('js-scripts')
<script>
 $('.login-bg').backstretch([
    "{{ url('assets/pages/img/login/bg11.jpg') }}",
    "{{ url('assets/pages/img/login/bg10.jpg') }}",
    "{{ url('assets/pages/img/login/bg9.jpg') }}",
    "{{ url('assets/pages/img/login/bg2.jpg') }}",
    "{{ url('assets/pages/img/login/bg3.jpg') }}",
    "{{ url('assets/pages/img/login/bg8.jpg') }}",
    "{{ url('assets/pages/img/login/bg7.jpg') }}"
    ], {
      fade: 1000,
      duration: 1000
    }
);
</script>
@stop

@section('mensaje')
Bienvenido al sistema de acceso del colegio donde podra acceder a diversos servicios que brindamos on line
@stop

@section('copyright')
SAHOST - 2014 © Metronic. Admin Dashboard Template.
@stop