<template>
  <div>
    <Hero title="Registrar empréstimo ou devolução do não aluno"></Hero>
    <section class="section" v-if="!showExchange">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormExchangePeople
            v-if="showForm"
            @search="pesquisar"></FormExchangePeople>
          <NotificationSearch
            v-if="notification"
            :label="label"
            state="is-danger"
            @closeNotification="notification = false; showForm = true"></NotificationSearch>
          <div v-if="showResult">
            <h2 class="title is-4 has-text-centered"> Resultados </h2>
            <div class="columns is-centered is-multiline">
              <div class="column is-4" v-for="obj in results">
                <CardNotStudent
                  :object="obj"
                  @returnData="captureId"
                  purpose="search"></CardNotStudent>
              </div>
            </div>
            <button
              type="button"
              class="button is-medium is-info"
              @click="showForm = true; showResult = false"> Voltar a pesquisa </button>
          </div>
        </div>
      </div>
    </section>
    <ExchangePeople
      v-if="showExchange"
      :object="objectResult"
      @toggleExchange="toggleExchange"
      type="notStudent"
      @reload="showExchange = false; showForm = true"></ExchangePeople>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormExchangePeople from './ExchangePeople/FormExchangePeople'
import NotificationSearch from '../formComponents/NotificationSearch'
import CardNotStudent from '../formComponents/CardNotStudent'
import ExchangePeople from '../formComponents/exchangePeople'
import { searchNotStudent } from '../../../pouchdb/notStudent'

export default {
  name: 'form-exchange-notStudent',
  components: { Hero, FormExchangePeople, NotificationSearch, CardNotStudent, ExchangePeople },
  data () {
    return {
      showForm: true,
      notification: false,
      label: '',
      results: [],
      showResult: false,
      objectResult: {},
      showExchange: false
    }
  },
  methods: {
    pesquisar () {
      if (arguments[0]) {
        const self = this
        searchNotStudent(arguments[1].toUpperCase()).then(function (data) {
          if (data.length !== 0) {
            self.showForm = false
            self.showResult = true
            self.results = data
          } else {
            self.label = 'A pesquisa retornou nenhum resultado'
            self.showForm = false
            self.notification = true
          }
        })
      } else {
        this.label = 'Dados inválidos, insira novamente'
        this.showForm = false
        this.notification = true
      }
    },
    captureId () {
      this.objectResult.id = arguments[0]
      this.objectResult.rev = arguments[1]
      this.objectResult.nome = arguments[2]
      this.objectResult.endereco = arguments[3]
      this.objectResult.telefone1 = arguments[4]
      this.objectResult.telefone2 = arguments[5]
      this.objectResult.records = arguments[6]
      this.objectResult.type = 'notStudent'
      this.showResult = false
      this.showExchange = true
    },
    toggleExchange () {
      this.showExchange = false
      this.showForm = true
      this.showResult = false
      this.notification = false
    }
  }
}
</script>

<style scoped>
  button.is-info {
    margin: .5em 0;
  }
</style>
