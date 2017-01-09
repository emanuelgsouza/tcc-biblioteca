<template>
  <div>
    <Hero title="Excluir Não Aluno"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormDeletePeople @delete="showResults" v-if="showForm"></FormDeletePeople>
          <hr>
          <div class="notification is-danger" v-if="err">
            <button class="delete" @click="err = false"></button>
            <h2 class="title is-4"> A pesquisa não retornou nenhum registro </h2>
          </div>
          <div v-if="showResult">
            <h2 class="title is-4 has-text-centered"> Resultados </h2>
            <div class="columns is-centered is-multiline">
              <div class="column is-4" v-for="obj in results">
                <CardNotStudent
                  :object="obj"
                  @returnData="deletar"
                  purpose="delete"></CardNotStudent>
              </div>
            </div>
            <button
              type="button"
              class="button is-medium is-info"
              @click="showForm = true; showResult = false"> Voltar a pesquisa </button>
          </div>
          <div class="notification" :class="classDelNotification" v-if="delSucess">
            <button class="delete" @click="delSucess = false; showForm = true"></button>
            <h2 class="title is-4"> {{ label }} </h2>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormDeletePeople from './DeletePeople/FormDeletePeople'
import CardNotStudent from '../formComponents/CardNotStudent'
import { searchNotStudent, delNotStudent } from '../../../pouchdb/notStudent'

export default {
  name: 'form-delete-people',
  components: { Hero, FormDeletePeople, CardNotStudent },
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
        const name = arguments[0].Name.toUpperCase()
        const self = this
        searchNotStudent(name).then(function (data) {
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
      const [ _id, _rev, name ] = arguments
      delNotStudent(_id, _rev).then(function (data) {
        self.showResult = false
        self.showForm = false
        self.delSucess = true
        if (data.ok) {
          self.classDelNotification = 'is-success'
          self.label = `O registro não aluno(a) ${name} foi excluído com sucesso`
        } else {
          self.classDelNotification = 'is-danger'
          self.label = `O registro não aluno(a) ${name} não foi excluído com sucesso`
        }
      })
    }
  }
}
</script>
