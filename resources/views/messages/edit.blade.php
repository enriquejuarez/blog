@extends('layout')

@section('contenido')
   <h1>Editar mensaje de {{ $message->mensaje  }}</h1>
   <form method="POST" action="{{ route('mensajes.update', $message->id) }}">
      {!! method_field('PUT') !!}
      {!! csrf_field() !!}
      <label for="nombre">
         Nombre
         <input type="text" name="nombre" value="{{$message->nombre}}">
         {!! $errors->first('nombre', '<span class=error>:message</span>') !!}
      </label><br>
      <label for="email">
         Email
         <input type="email" name="email" value="{{$message->email}}">
         {!! $errors->first('email', '<span class=error>:message</span>') !!}
      </label><br>
      <label for="mensaje">
         Mensaje
         <textarea name="mensaje" cols="30" rows="10">{{$message->mensaje}}</textarea>
         {!! $errors->first('mensaje', '<span class=error>:message</span>') !!}
      </label><br>
      <input type="submit" value="Enviar">
      </form>
@stop