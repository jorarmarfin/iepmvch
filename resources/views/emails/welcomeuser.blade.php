@extends('layouts.email')

@section('title')
Bienvenido {{ $user->name }} al intranet
@stop

@section('content')
Se ha creado un nuevo usuario en nuestro sistema con las siguientes credenciales :
<p>
	<strong>Nombre de usuario:</strong> {{ $user->username }} </p></br>
	<strong>Clave de usuario</strong> {{ $user->username }}</p></br>
	<strong>Direccion : </strong><a href="www.iepmvch.com"> www.iepmvch.com</a> </p></br>
</p>
<p>
	Usted podra cambiar su clave desde la sección de usuarios en su intranet.
</p>
@stop

@section('notes')
Para mayor detalles comuniquese al siguiente correo colegio@iepmvch.com
@stop