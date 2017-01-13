<template>
  <div>
    <Hero title="Lista de leitores"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <div v-if="showForm">
            <button
              class="button is-info is-medium is-fullwidth"
              @click="toggleFilters(true, 'student')"
              v-if="showButton">
              Alunos
            </button>
            <transition>
              <FormModel
                v-if="currentSearch === 'student'"
                @backFilters="toggleFilters(false)"
                @sendData="gerarLista"
                ></FormModel>
            </transition>

            <button
              class="button is-info is-medium is-fullwidth"
              @click="toggleFilters(true, 'notStudent')"
              v-if="showButton">
              Não Alunos
            </button>
            <transition>
              <FormModel
                v-if="currentSearch === 'notStudent'"
                @backFilters="toggleFilters(false)"
                @sendData="gerarLista"
                ></FormModel>
            </transition>
          </div>

          <TableForPrint
            v-if="showResult"
            :label="label"
            :titles="{ value1: 'Nome', value2: 'Empréstimos' }"
            :results="array"
            @backSearch="showForm = true; showResult = false"></TableForPrint>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { searchReaders } from '../../../pouchdb/general'
import Hero from '../../Hero/Main'
import FormModel from './components/FormModel'
import TableForPrint from '../formComponents/TableForPrint'

export default {
  data () {
    return {
      currentSearch: null,
      showButton: true,
      showForm: true,
      showResult: false,
      results: []
    }
  },
  components: { Hero, FormModel, TableForPrint },
  methods: {
    toggleFilters (showFilter, esc) {
      if (showFilter) {
        this.currentSearch = esc
        this.showButton = false
      } else {
        this.showButton = true
        this.currentSearch = null
      }
    },
    gerarLista () {
      const limit = arguments[0]
      const filter = this.currentSearch
      searchReaders(filter, limit).then(data => {
        this.showForm = false
        this.showResult = true
        this.results = data
      })
    }
  },
  computed: {
    array () {
      return this.results.map(item => Object.assign({}, {Nome: item.name, CounterExchange: item.counterExchange}))
    },
    label () {
      if (this.currentSearch === 'student') return 'Alunos leitores'
      if (this.currentSearch === 'notStudent') return 'Não alunos leitores'
    }
  }
}
</script>

<style scoped>
button.button {
  margin: 1em 0;
}
</style>
