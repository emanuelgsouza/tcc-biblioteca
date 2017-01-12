<template>
  <div>
    <p class="control has-addons" v-if="showSearch">
      <input
        type="text"
        class="input is-medium is-expanded"
        placeholder="Digite o nome do livro para pesquisa"
        v-model="title">
      <button
        class="button is-success is-medium"
        @click="searchBook"> Pesquisar </button>
    </p>

    <hr v-if="!showLend">

    <NotificationSearch
      v-if="showNotification"
      state="is-danger"
      label="A pesquisa não retornou nenhum resultado"
      @closeNotification="showNotification = false"></NotificationSearch>

    <div class="columns is-centered is-multiline" v-if="showCard">
      <div class="column is-6" v-for="result in results">
        <CardBook
          :object="result"
          :showButtons="true"
          purpose="search"
          @returnData="confirmLend"></CardBook>
      </div>
    </div>

    <div v-if="showLend" class="content">
      <p> Registrando o empréstimo do livro {{ book.title }} </p>
      <label for="" class="label"> Insira a data do emprestimo </label>
      <p class="control">
        <input type="date" v-model="date" class="input is-medium" placeholder="Data">
      </p>
      <button
        class="button is-success is-medium"
        @click="lend"> Confirmar empréstimo </button>
    </div>

    <NotificationSearch
      v-if="lendConfirm"
      label="Empréstimo efetuado com sucesso"
      state="is-success"
      @closeNotification="reload"></NotificationSearch>

    <NotificationSearch
      v-if="estoqueBaixo"
      label="O livro selecionado não está em estoque"
      state="is-danger"
      @closeNotification="estoqueBaixo = false"></NotificationSearch>
  </div>
</template>

<script>
import { searchBook } from '../../../pouchdb/book'
import { exchangePeople, updateBook } from '../../../pouchdb/general'
import CardBook from './CardBook'
import NotificationSearch from './NotificationSearch'

export default {
  props: ['people', 'type'],
  components: { CardBook, NotificationSearch },
  data () {
    return {
      showSearch: true,
      showNotification: false,
      title: '',
      book: {},
      results: [],
      showCard: false,
      date: '',
      lendConfirm: false,
      estoqueBaixo: false
    }
  },
  methods: {
    searchBook () {
      const self = this
      searchBook('titulo', this.title.toUpperCase()).then(function (data) {
        if (data.length === 0) {
          self.showNotification = true
          self.showCard = false
        } else {
          self.showCard = true
          self.showNotification = false
          self.results = data
        }
      })
    },
    confirmLend () {
      this.book._id = arguments[0]
      this.book.title = arguments[2]
      this.showCard = false
      this.showSearch = false
      this.showLend = true
      if (arguments[3] === 0) {
        this.estoqueBaixo = true
      }
    },
    lend () {
      if (this.date !== '') {
        const objRecord = {
          id: `${this.date}-${this.book._id}-${this.people}`,
          date: this.date,
          type: 'lent',
          idBook: this.book._id
        }
        this.people[1].push(objRecord)
        const records = this.people[1]
        const self = this
        exchangePeople(this.people[0], records, this.type).then(function (data) {
          if (data.ok) {
            updateBook(self.book._id, 'plus').then(function (data) {
              if (data.ok) {
                self.showLend = false
                self.lendConfirm = true
              }
            })
          }
        })
      }
    },
    reload () {
      this.$emit('reload')
    }
  }
}
</script>
