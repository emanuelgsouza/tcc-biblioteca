<template>
  <div>
    <Hero title="Lista de livros mais lidos"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <form v-if="showForm">
            <div class="control">
              <label class="label"> Número de Registros </label>
              <div class="control">
                <input type="number" class="input is-expanded" min="1" v-model="numberRegister">
              </div>
            </div>
            <button class="button is-success is-medium" @click="sendData"> Gerar Lista </button>
          </form>
          <hr v-if="err">
          <div class="notification is-danger" v-if="err">
            <button class="delete" @click="err = false"></button>
            <h2 class="title is-4"> A pesquisa não retornou nenhum registro </h2>
          </div>
          <TableForPrint
            v-if="showResult"
            label="Livros mais lidos:"
            :titles="{ value1: 'Titulo', value2: 'Empréstimos' }"
            :results="array"
            @backSearch="showForm = true; showResult = false"></TableForPrint>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { searchForCounter } from '../../../pouchdb/book'
import TableForPrint from '../formComponents/TableForPrint'
import Hero from '../../Hero/Main'

export default {
  components: { TableForPrint, Hero },
  data () {
    return {
      numberRegister: 10,
      results: [],
      showForm: true,
      showResult: false,
      err: false
    }
  },
  methods: {
    sendData () {
      if (!(this.numberRegister <= 0)) {
        searchForCounter(this.numberRegister).then((data) => {
          if (data.length !== 0) {
            this.results = data
            this.err = false
            this.showForm = false
            this.showResult = true
          } else {
            this.err = true
            this.showForm = false
            this.showResult = false
          }
        })
      }
    }
  },
  computed: {
    array () {
      return this.results.map(item => Object.assign({}, {
        titulo: item.titulo, counter: item.counterExchange
      }))
    }
  }
}
</script>

<style scoped>
button.button {
  margin: 1em 0;
}
</style>
