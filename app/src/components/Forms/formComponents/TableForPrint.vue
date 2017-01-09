<template>
  <div class="results">
    <h2 class="title is-4 has-text-centered"> {{ label }} </h2>
    <table class="table">
      <tr>
        <th v-for="title in titles"> {{ title  }} </th>
      </tr>
      <tr v-for="obj in results">
        <td v-for="value in obj"> {{ value }} </td>
      </tr>
    </table>
    <button
    type="button"
    class="button is-medium is-success"
    @click="print"> Imprimir Resultados </button>
    <button
      type="button"
      class="button is-medium is-info"
      @click="backSearch"> Voltar a pesquisa </button>
  </div>
</template>

<script>
export default {
  props: ['titles', 'results', 'label'],
  methods: {
    print () {
      window.print()
    },
    backSearch () {
      this.$emit('backSearch')
    }
  }
}
</script>

<style lang="css" scoped>
.button.is-info,
.button.is-success {
  display: block;
  margin: .5em 0;
}

@media print {
  table {
    font-size: 12pt;
  }

  .button.is-info,
  .button.is-success,
  .hero {
    display: none;
  }

  .results {
    width: 100%;
    position: absolute;
    top: 1em;
    left: 0;
  }
}
</style>
