@extends('admin.template')

@section('content')

<div id="rolesApp">

<table class="table">
  <thead>
    <tr>
      <th>nombre</th>
      <th>acciones</th>
    </tr>
  </thead>
  @foreach($roles as $rol)
  <tr>
    <td>{{ $rol->nombre }}</td>
    <td>
      <a href="{{ route('admin.roles.edit', ['id'=> $rol->id]) }}" class="btn btn-warning">editar</a>
      <a href="#" class="btn btn-danger" @click.prevent="destroy({{ $rol->id }})">eliminar</a>
    </td>
  </tr>
  @endforeach
</table>

<a href="{{ route('admin.roles.create') }}">Nuevo rol</a>

</div>

@endsection

@section('scripts')

<script>

  const rolesApp= new Vue({
    el: '#rolesApp',
    data: {
      url: "{{ route('admin.roles.destroy', ['id' => 'id']) }}"
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
