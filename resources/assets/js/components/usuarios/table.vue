<template lang="html">
  <div class="usuarios-table">
    <table class="table">
      <thead>
        <tr>
          <th>email</th>
          <th>roles</th>
          <th>estado</th>
          <th>acciones</th>
        </tr>
      </thead>
      <tr v-for="(usuario, index) in listUsuarios">
        <td>{{ usuario.email }}</td>
        <td><span v-for="rol in usuario.roles">*{{ rol.nombre }}</span></td>
        <td>{{ usuario.estado }}</td>
        <td>
          <a class="btn btn-warning" :href="urlEdit(usuario.id)">Editar</a>
          <a class="btn btn-danger" href="#" @click.prevent="destroy(urlDestroy(usuario.id), index)">Eliminar</a>
        </td>
      </tr>
    </table>
    <a class="btn btn-primary" :href="routes.create">Nuevo Usuario</a>
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
