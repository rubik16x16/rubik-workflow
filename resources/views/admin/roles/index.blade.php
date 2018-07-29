@extends('admin.template')

@section('content')

<div id="app">
  <roles-table :roles="{{ $roles }}" :routes="{{ $routes }}"></roles-table>
</div>

@endsection

@section('scripts')

<script src="{{ asset('dist/js/roles/app.js') }}"></script>

@endsection
