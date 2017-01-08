<template>
  <div>
    <Hero title="Excluir Livro"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormDeleteBook @delete="showResults" v-if="showForm"></FormDeleteBook>
          <hr>

          <NotificationSearch
            v-if="err"
            @closeNotification="err = false"
            state="is-danger"
            label="A pesquisa não retornou nenhum resultado">
          </NotificationSearch>

          <div v-if="showResult">
            <h2 class="title is-4 has-text-centered"> Resultados </h2>
            <div class="columns is-centered is-multiline">
              <div class="column is-4" v-for="obj in results">
                <CardBook :object="obj" @returnData="deletar" purpose="delete"></CardBook>
              </div>
            </div>
            <button
              type="button"
              class="button is-medium is-info"
              @click="showForm = true; showResult = false"> Voltar a pesquisa </button>
          </div>

          <NotificationSearch
            v-if="delSucess"
            @closeNotification="delSucess = false; showForm = true"
            state="is-success"
            :label="label">
          </NotificationSearch>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { searchBook, delBook } from '../../../pouchdb/book'
import Hero from '../../Hero/Main'
import FormDeleteBook from './DeleteBook/FormDeleteBook'
import NotificationSearch from '../formComponents/NotificationSearch'
import CardBook from '../formComponents/CardBook'

export default {
  name: 'form-delete-book',
  components: { Hero, FormDeleteBook, NotificationSearch, CardBook },
  data () {
    return {
      showForm: true,
      showResult: false,
      results: [],
      err: false,
      delSucess: false,
      classDelNotification: ''
    }
  },
  methods: {
    showResults () {
      if (!(arguments[0] === undefined)) {
        const titulo = arguments[0].toUpperCase()
        const self = this
        searchBook('titulo', titulo).then(function (data) {
          if (data.length === 0) {
            self.err = true
          } else {
            self.showForm = false
            self.showResult = true
            self.results = data
          }
        })
      }
    },
    deletar () {
      const self = this
      const [ _id, _rev, titulo ] = arguments
      delBook(_id, _rev).then(function (data) {
        self.showResult = false
        self.showForm = false
        self.delSucess = true
        if (data.ok) {
          self.classDelNotification = 'is-success'
          self.label = `O registro livro ${titulo} foi excluído com sucesso`
        } else {
          self.classDelNotification = 'is-danger'
          self.label = `O registro livro ${titulo} não foi excluído com sucesso`
        }
      })
    }
  }
}
</script>
