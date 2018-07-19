@extends('admin.template')

@section('content')

<form action="{{ route('admin.roles.update', ['id' => $rol->id]) }}" method="post">
  {{ csrf_field() }}
  @method('PUT')
  <input type="text" name="nombre" placeholder="nombre" value="{{ $rol->nombre }}">
  <button type="submit" name="button">Enviar</button>
</form>

@endsection
