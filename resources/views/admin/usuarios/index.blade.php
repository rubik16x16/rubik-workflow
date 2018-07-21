@extends('admin.template')

@section('content')

<div id="usuarios-app"></div>

@endsection

@section('scripts')

<script>

  Vue.component('table-head', {
    template:`
    @verbatim
    <thead>
      <tr>
        <th>email</th>
        <th>roles</th>
        <th>estado</th>
        <th>acciones</th>
      </tr>
    </thead>
    @endverbatim`
  });

  const usuariosApp= new Vue({
    el: '#usuarios-app',
    data: {
      usuarios: @json($usuarios),
      urlDestroy: "{{ route('admin.usuarios.destroy', ['id' => 'id']) }}",
      urlEdit: "{{ route('admin.usuarios.edit',['id' => 'id']) }}",
      urlCreate: "{{ route('admin.usuarios.create') }}"
    },
    template:`
    @verbatim
    <div class="usuarios-app">
      <table class="table">
        <table-head></table-head>
        <tr v-for="(usuario, index) in usuarios">
          <td>{{ usuario.email }}</td>
          <td><span v-for="(rol, index) in usuario.roles">*{{ rol.nombre }} </span></td>
          <td v-if="usuario.estado">activo</td>
          <td v-else>inactivo</td>
          <td>
            <a :href="edit(usuario.id)" class="btn btn-warning">editar</a>
            <a href="#" class="btn btn-danger" @click.prevent="destroy(usuario.id, index)">eliminar</a>
          </td>
        </tr>
      </table>
      <a :href="urlCreate" class="btn btn-primary">Crear usuario</a>
    </div>
    @endverbatim`,
    methods: {
      destroy: function(id, index){
        var url= this.urlDestroy.replace('id', id);
        this.usuarios.splice(index, 1);
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
      },
      edit: function(id){
        return this.urlEdit.replace('id', id);
      }
    }
  });

</script>

@endsection
