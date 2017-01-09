<template>
  <div>
    <Hero title="Adicionar Livro"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormSearchBook @search="pesquisar" v-if="!pesquisando"></FormSearchBook>
          <TableForPrint
            v-if="showResult"
            :label="label"
            :titles="titles"
            :results="array"
            @backSearch="showForm = true; showResult = false"></TableForPrint>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormSearchBook from './SearchBook/FormSearchBook'

export default {
  name: 'form-search-book',
  components: { Hero, FormSearchBook },
  data () {
    return {
      pesquisando: false,
      showResult: false,
      results: [],
      filtro: '',
      value: ''
    }
  },
  methods: {
    pesquisar () {
      this.pesquisando = true
      this.filtro = arguments[1]
      this.value = arguments[0]
    }
  }
}
</script>
