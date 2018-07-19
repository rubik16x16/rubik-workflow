@extends('admin.template')

@section('content')

<a href="{{ route('admin.usuarios.index') }}">usuarios</a>
<a href="{{ route('admin.roles.index') }}">roles</a>

@endsection
