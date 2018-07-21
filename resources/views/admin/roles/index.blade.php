@extends('admin.template')

@section('content')

<div id="roles-app"></div>

@endsection

@section('scripts')

<script>

  Vue.component('table-head', {
    template:`
    @verbatim
    <thead>
      <tr>
        <th>nombre</th>
        <th>acciones</th>
      </tr>
    </thead>
    @endverbatim`
  });

  const rolesApp= new Vue({
    el: '#roles-app',
    data: {
      roles: @json($roles),
      urlDestroy: "{{ route('admin.roles.destroy', ['id' => 'id']) }}",
      urlEdit: "{{ route('admin.roles.edit',['id' => 'id']) }}",
      urlCreate: "{{ route('admin.roles.create') }}"
    },
    template:`
    @verbatim
    <div class="roles-app">
      <table class="table">
        <table-head></table-head>
        <tr v-for="(rol, index) in roles">
          <td>{{ rol.nombre }}</td>
          <td>
            <a :href="edit(rol.id)" class="btn btn-warning">editar</a>
            <a href="#" class="btn btn-danger" @click.prevent="destroy(rol.id, index)">eliminar</a>
          </td>
        </tr>
      </table>
      <a :href="urlCreate" class="btn btn-primary">Crear rol</a>
    </div>
    @endverbatim`,
    methods: {
      destroy: function(id, index){
        var url= this.urlDestroy.replace('id', id);
        this.roles.splice(index, 1);
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
