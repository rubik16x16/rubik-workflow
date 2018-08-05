<template lang="html">
  <div class="usuarios-table">
    <div class="card text-center">
      <div class="card-header">
        Usuarios
      </div>
      <div class="card-body table-responsive">
        <table class="table table-striped table-borderless">
          <thead class="thead-dark">
            <tr>
              <th>email</th>
              <th>roles</th>
              <th>estado</th>
              <th>acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(usuario, index) in listUsuarios">
              <td>{{ usuario.email }}</td>
              <td><span v-for="rol in usuario.roles">*{{ rol.nombre }}</span></td>
              <td v-if="usuario.estado"><span class="badge badge-success">Activo</span></td>
              <td v-else><span class="badge badge-danger">Inactivo</span></td>
              <td>
                <a class="btn btn-warning" :href="urlEdit(usuario.id)"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger" href="#" @click.prevent="destroy(urlDestroy(usuario.id), index)"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        <a class="btn btn-primary" :href="routes.create">Nuevo Usuario</a>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  props: ['usuarios', 'routes'],
  data (){
    return {
      listUsuarios: null
    }
  },
  mounted(){
    this.listUsuarios= this.usuarios;
  },
  methods:{
    urlEdit (id){
      return this.routes.edit.replace('id', id);
    },
    urlDestroy(id){
      return this.routes.destroy.replace('id', id);
    },
    destroy(route, index){

      axios({
        method: 'DELETE',
        url: route,
      }).then(response => {
        console.log(response.data);
      }).catch(e => {
        console.log(e);
      });

      return this.listUsuarios.splice(index, 1);
    }
  }
}
</script>

<style lang="css">
</style>
