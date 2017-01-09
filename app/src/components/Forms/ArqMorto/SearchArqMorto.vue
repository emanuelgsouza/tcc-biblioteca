<template>
  <div>
    <Hero title="Pesquisar Livro no Arquivo Morto"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormSearchArqMorto @pesquisar="pesquisar" v-if="showForm"></FormSearchArqMorto>
          <TableForPrint
            v-if="showResult"
            :label="label"
            :titles="titles"
            :results="array"
            @backSearch="showForm = true; showResult = false"></TableForPrint>
          <CardArqMorto
            v-if="showCard"
            :object="results[0]"
            purpose="search"></CardArqMorto>
          <button
            v-if="showCard"
            :showButtons="false"
            class="button is-info"
            @click="showCard = false; showForm = true"> Voltar a pesquisa </button>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { searchArqMorto } from '../../../pouchdb/arqMorto'
import Hero from '../../Hero/Main'
import FormSearchArqMorto from './SearchArqMorto/FormSearchArqMorto'
import TableForPrint from '../formComponents/TableForPrint'
import CardArqMorto from '../formComponents/CardArqMorto'

export default {
  name: 'form-search-book',
  components: { Hero, FormSearchArqMorto, TableForPrint, CardArqMorto },
  data () {
    return {
      showForm: true,
      showResult: false,
      showCard: false,
      results: [],
      filtro: '',
      value: ''
    }
  },
  methods: {
    pesquisar () {
      this.value = arguments[0].toUpperCase()
      this.filtro = arguments[1]
      const self = this
      if (this.filtro === 'author') {
        searchArqMorto('autor', this.value).then(function (data) {
          self.results = data
          self.showForm = false
          self.showResult = true
          self.showCard = false
        })
      } else {
        searchArqMorto('titulo', this.value).then(function (data) {
          self.results = data
          self.showForm = false
          self.showResult = false
          self.showCard = true
        })
      }
    }
  },
  computed: {
    label () {
      if (this.filtro === 'author') return `Os livros do autor ${this.results[0].autor} são:`
    },
    title () {
      if (this.filtro === 'author') return { value: 'titulo' }
    },
    array () {
      if (this.filtro === 'author') {
        return this.results.map(item => Object.assign({}, {titulo: item.titulo}))
      }
      return this.results.map(item => Object.assign({}, {titulo: item.titulo}))
    }
  }
}
</script>

<style scoped>
  .button.is-info {
    margin: .5em 0;
  }
</style>
