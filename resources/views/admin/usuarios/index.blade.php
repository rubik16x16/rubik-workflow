@extends('admin.template')

@section('content')

<div id="usuariosApp">
  <table class="table">
    <thead>
      <tr>
        <th>email</th>
        <th>estado</th>
        <th>acciones</th>
      </tr>
    </thead>
    @foreach($usuarios as $usuario)
    <tr>
      <td>{{ $usuario->email }}</td>
      <td>@if($usuario->estado) activo @else inactivo @endif</td>
      <td>
        <a href="{{ route('admin.usuarios.edit', ['id'=> $usuario->id]) }}" class="btn btn-warning">editar</a>
        <a href="#" class="btn btn-danger" @click.prevent="destroy({{ $usuario->id }})">eliminar</a>
      </td>
    </tr>
    @endforeach
  </table>
  <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary">Crear usuario</a>
</div>

@endsection

@section('scripts')

<script>

  const usuariosApp= new Vue({
    el: '#usuariosApp',
    data: {
      url: "{{ route('admin.usuarios.destroy', ['id' => 'id']) }}"
    },
    methods: {
      destroy: function(id){
        var url= this.url.replace('id', id);
        axios({
					method: 'DELETE',
					url: url,
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					}
				}).then(response => {
					console.log(response.data);
				}).catch(e => {
					console.log(e);
				});
      }
    }
  });

</script>

@endsection
