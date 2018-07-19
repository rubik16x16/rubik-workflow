@extends('admin.template')

@section('content')

<form action="{{ route('admin.roles.store') }}" method="post">
  {{ csrf_field() }}
  <input type="text" name="nombre" placeholder="nombre">
  <button type="submit" name="button">Enviar</button>
</form>

@endsection
