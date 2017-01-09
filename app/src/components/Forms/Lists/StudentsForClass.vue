<template>
  <div>
    <Hero title="Gerar Lista de Alunos Por Turma"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <form v-if="showForm">
            <InputClass
              label="Digite o número da turma para pesquisa"
              placeholder="Turma"
              @sendData="value = arguments[0]"></InputClass>
              <button class="button is-medium is-success" @click="pesquisar"> Pesquisar </button>
          </form>
          <hr v-if="err">
          <div class="notification is-danger" v-if="err">
            <button class="delete" @click="err = false"></button>
            <h2 class="title is-4"> A pesquisa não retornou nenhum registro </h2>
          </div>
          <TableForPrint
            v-if="showResult"
            :label="`Alunos da turma ${value}`"
            :titles="{ value1: 'Nome' }"
            :results="array"
            @backSearch="showForm = true; showResult = false"></TableForPrint>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { isClassValid } from '../../../helpers/validates'
import { searchClass } from '../../../pouchdb/student'
import Hero from '../../Hero/Main'
import InputClass from '../formComponents/InputClass'
import TableForPrint from '../formComponents/TableForPrint'

export default {
  name: 'list-students-class',
  components: { Hero, InputClass, TableForPrint },
  data () {
    return {
      value: '',
      showResult: false,
      err: false,
      results: [],
      showForm: true
    }
  },
  methods: {
    pesquisar () {
      if (isClassValid(this.value)) {
        const self = this
        searchClass(this.value).then(function (data) {
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
    teste () {
      window.print()
    }
  },
  computed: {
    array () {
      return this.results.map(item => Object.assign({}, {name: item.name}))
    }
  }
}
</script>
