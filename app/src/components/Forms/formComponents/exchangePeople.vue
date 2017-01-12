<template>
  <div class="columns is-centered exchange">
    <div class="column is-4">
      <section class="hero is-primary">
        <div class="hero-body">
          <div class="container">
            <h1 class="title is-4 has-text-centered">
              <ul>
                <li v-for="(value, key) in objectResult">{{ key }} - {{ value }}</li>
              </ul>
              <button class="button is-info" @click="backForm"> Voltar a pesquisa </button>
            </h1>
          </div>
        </div>
      </section>
    </div>
    <div class="column is-8">
      <section class="section">
        <div v-if="emprestimo">
          <p class="subtitle is-5 has-text-centered"> {{ object.nome }} não possui empréstimos </p>
          <button
            class="button is-info"
            @click="emprestimo = false; showSearch = true"> Registrar Empréstimo? </button>
        </div>
        <div v-if="devolver">
          <p class="subtitle is-5 has-text-centered"> {{ object.nome }} possui empréstimos </p>
          <button
            class="button is-info"
            @click="returned"> Registrar Devolução? </button>
        </div>
        <searchBookForExchange
          v-if="showSearch"
          :type="type"
          @returnBook="idBook = arguments[0]"
          :people="[object.id, object.records]"
          @reload="reload"></searchBookForExchange>

        <FormReturnedBook
          v-if="showDevolucao"
          :type="type"
          @returnBook="idBook = arguments[0]"
          :people="[object.id, object.records]"
          :book="book"
          @reload="reload"></FormReturnedBook>
      </section>
    </div>
  </div>
</template>

<script>
import { searchBookId } from '../../../pouchdb/general'
import searchBookForExchange from './searchBookForExchange'
import FormReturnedBook from './FormReturnedBook'

export default {
  components: { searchBookForExchange, FormReturnedBook },
  props: ['object'],
  data () {
    return {
      emprestimo: true,
      showSearch: false,
      showDevolucao: false,
      idBook: '',
      devolver: false,
      book: {}
    }
  },
  computed: {
    objectResult () {
      if (this.object.type === 'student') return { Nome: this.object.nome, Turma: this.object.turma }
    },
    type () {
      if (this.object.type === 'student') return 'student'
      if (this.object.type === 'notStudent') return 'notStudent'
    }
  },
  methods: {
    backForm () {
      this.$emit('toggleExchange')
    },
    reload () {
      this.$emit('reload')
    },
    returned () {
      this.showDevolucao = true
      this.emprestimo = false
      this.devolver = false
      const records = this.object.records
      const idBook = records[records.length - 1].idBook
      const self = this
      searchBookId(idBook).then(function (data) {
        self.book = data
      })
    }
  },
  mounted () {
    const records = this.object.records
    const obj = records[records.length - 1]
    console.log(obj)
    if (records === []) {
      this.emprestimo = true
    } else if (obj !== undefined && obj.type === 'lent') {
      this.devolver = true
      this.emprestimo = false
    } else {
      this.emprestimo = true
    }
  }
}
</script>

<style>
  .exchange {
    margin: .6em;
  }

  .hero .button.is-info {
    margin-top: 1em;
  }
</style>
