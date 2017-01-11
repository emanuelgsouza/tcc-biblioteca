<template>
  <div>
    <Hero title="Adicionar Livro"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormSearchBook
            @search="pesquisar"
            v-if="showForm"></FormSearchBook>
          <TableForPrint
            v-if="showResult"
            :label="label"
            :titles="['Titulo', 'Autor', 'Est - Pra', 'Estoque']"
            :results="array"
            @backSearch="showForm = true; showResult = false"></TableForPrint>
          <CardBook
            v-if="showCard"
            :showButtons="false"
            :object="results[0]"></CardBook>
          <button
            class="button is-info"
            v-if="showCard"
            @click="showCard = false; showForm = true"> Voltar aos filtros </button>
          <NotificationSearch
            v-if="delSucess"
            @closeNotification="delSucess = false; showForm = true"
            state="is-danger"
            label="A busca não retornou nenhum resultado">
          </NotificationSearch>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormSearchBook from './SearchBook/FormSearchBook'
import NotificationSearch from '../formComponents/NotificationSearch'
import TableForPrint from '../formComponents/TableForPrint'
import CardBook from '../formComponents/CardBook'
import { searchBook } from '../../../pouchdb/book'
import { returnSchool, returnGenre, returnDidatic } from '../../../helpers/filters'

export default {
  name: 'form-search-book',
  components: { Hero, FormSearchBook, CardBook, NotificationSearch, TableForPrint },
  data () {
    return {
      pesquisando: false,
      showResult: false,
      showForm: true,
      results: [],
      filtro: '',
      showCard: false,
      delSucess: false,
      value: ''
    }
  },
  methods: {
    pesquisar () {
      this.filtro = arguments[1]
      this.value = arguments[0].toUpperCase()
      const self = this
      searchBook(this.filtro, this.value).then(function (data) {
        if (data.length === 0) {
          self.delSucess = true
        } else {
          self.results = data
          self.showForm = false
          if (self.filtro === 'titulo') {
            self.showCard = true
            self.showResult = false
          } else {
            self.showCard = false
            self.showResult = true
          }
        }
      })
    }
  },
  computed: {
    label () {
      if (this.filtro === 'autor') {
        return `Os livros do autor ${this.results[0].autor} são:`
      }
      if (this.filtro === 'escola') {
        return `Os livros da escola ${returnSchool(this.value)} são:`
      }
      if (this.filtro === 'literario') {
        return `Os livros do genero ${returnGenre(this.value)} são:`
      }
      if (this.filtro === 'didatico') {
        return `Os livros didáticos de ${returnDidatic(this.value)} são:`
      }
    },
    array () {
      return this.results.map(function (item) {
        return Object.assign(
          {},
          {titulo: item.titulo},
          {autor: item.autor},
          {loc: `${item.prateleira}-${item.estante}`},
          {estoque: item.estoque}
        )
      })
    }
  }
}
</script>

<style scoped>
button.button.is-info {
  margin: .5em 0;
}
</style>
