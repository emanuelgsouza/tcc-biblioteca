<template>
  <div>
    <Hero title="Adicionar Não estudante"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormInsertPeople
            v-if="open"
            @result="confirmar"></FormInsertPeople>
          <hr>
          <Notification
            :estado="estadoNotification"
            :array="dados"
            v-if="err"
            @closeNotification="close"></Notification>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { addNotStudent } from '../../../pouchdb/notStudent'
import Hero from '../../Hero/Main'
import FormInsertPeople from './PlusPeople/FormInsertPeople'
import Notification from '../formComponents/Notification'

export default {
  name: 'form-plus-people',
  components: { Hero, FormInsertPeople, Notification },
  data () {
    return {
      err: false,
      open: true,
      estadoNotification: 'negative',
      dados: []
    }
  },
  methods: {
    confirmar () {
      this.err = true
      if (arguments[2]) {
        this.open = false
        const dados = arguments[0]
        this.estadoNotification = arguments[1]
        const notStudent = {
          name: dados.name.toUpperCase(),
          endereco: dados.endereco.toUpperCase(),
          telefone1: dados.telefone1,
          telefone2: dados.telefone2
        }
        const self = this
        const result = addNotStudent(notStudent)
        result.then(function (data) {
          // Capture the data
          if (data.ok) {
            self.dados = {
              nome: dados.name,
              endereco: dados.endereco,
              telefone1: dados.telefone1,
              telefone2: dados.telefone2
            }
          }
        })
      } else {
        this.open = false
        this.dados = []
        this.estadoNotification = 'negative'
      }
    },
    close () {
      this.err = false
      this.open = true
    }
  }
}
</script>
