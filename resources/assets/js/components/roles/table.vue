<template lang="html">
  <div class="roles-table">
    <div class="card text-center">
      <div class="card-header">
        Roles
      </div>
      <div class="card-body table-responsive">
        <table class="table table-striped table-borderless">
          <thead class="thead-dark">
            <tr>
              <th>nombre</th>
              <th>acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(rol, index) in listRoles">
              <td>{{ rol.nombre }}</td>
              <td>
                <a class="btn btn-warning" :href="urlEdit(rol.id)"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger" href="#" @click.prevent="destroy(urlDestroy(rol.id), index)"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer text-muted">
        <a class="btn btn-primary" :href="routes.create">Nuevo rol</a>
      </div>
    </div>

  </div>
</template>

<script>

export default {
  props: ['roles', 'routes'],
  data (){
    return {
      listRoles: null
    }
  },
  mounted(){
    this.listRoles= this.roles;
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

      return this.listRoles.splice(index, 1);
    }
  }
}
</script>

<style lang="css">
</style>
