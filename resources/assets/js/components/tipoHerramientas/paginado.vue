<template lang="html">
  <ul class="paginado">
    <li class="mypage" v-for="pagina in paginas"><a class="page-link" href="#" @click.prevent="pageClick(pagina)">{{ pagina }}</a></li>
  </ul>
</template>

<script>
export default {
  props: ['cantRegistros', 'registrosPorPagina'],
  computed: {
    paginas(){
      return Math.ceil(this.cantRegistros / this.registrosPorPagina);
    }
  },
  methods:{
    pageClick(pagina){
      this.$emit('page-click', pagina);
    }
  }
}
</script>

<style lang="css">

  .paginado{
    list-style: none;
  }

  .mypage{
    float: left;
  }

</style>
