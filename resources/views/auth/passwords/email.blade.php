@extends('layouts.login5')

@section('content')
{!! Form::open(['url'=>'/password/email','method'=>'POST','class'=>'forget-form']) !!}
    @include('alerts.errors')
    <h3 class="font-green">¿ Olvidaste tu contraseña ?</h3>
    <p> Ingresa tu correo electronico y te enviaremos un email para poder acceder. </p>
    <div class="form-group">
        {!!Form::email('email',old('email'), ['class'=>'form-control form-control-solid placeholder-no-fix form-group','placeholder'=>'Email'])!!}
    </div>
    <div class="form-actions">
       <a href="{{ url('/') }}" class="btn green btn-outline">REGRESAR</a>
       {!!Form::submit('Entrar',['class'=>'btn btn-success uppercase pull-right'])!!}
    </div>
{!! Form::close() !!}
@stop

@section('js-scripts')
<script>
 $('.login-bg').backstretch([
    "../assets/pages/img/login/bg5.jpg",
    "../assets/pages/img/login/bg6.jpg",
    "../assets/pages/img/login/bg7.jpg"
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