@extends('layout')

@section('contenido')
	<h1>Contactos</h1>
	<h2>Escríbeme</h2>
	@if(session()->has('info'))
		<h3>{{ session('info') }}</h3>
	@else
		<form method="POST" action="contacto">
			<label for="nombre">
				Nombre
				<input type="text" name="nombre" value="{{old('nombre')}}">
				{!! $errors->first('nombre', '<span class=error>:message</span>') !!}
			</label><br>
			<label for="email">
				Email
				<input type="email" name="email" value="{{old('email')}}">
				{!! $errors->first('email', '<span class=error>:message</span>') !!}
			</label><br>
			<label for="mensaje">
				Mensaje
				<textarea name="mensaje" id="" cols="30" rows="10" value="{{old('mensaje')}}"></textarea>
				{!! $errors->first('mensaje', '<span class=error>:message</span>') !!}
			</label><br>
			<input type="submit" value="Enviar">
		</form>
	@endif
@stop