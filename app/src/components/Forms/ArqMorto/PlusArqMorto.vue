<template>
  <div>
    <Hero title="Adicionar Livro"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormInsertArqMorto
             v-if="!formValid"
            @result="confirmar"></FormInsertArqMorto>
          <hr>
          <Notification
            :estado="estado"
            :array="array"
            v-if="help"
            @closeNotification="close"></Notification>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { addArqMorto } from '../../../pouchdb/arqMorto'
import Hero from '../../Hero/Main'
import FormInsertArqMorto from './PlusArqMorto/FormPlusArqMorto'
import Notification from '../formComponents/Notification'

export default {
  name: 'form-plus-book',
  components: { Hero, FormInsertArqMorto, Notification },
  data () { return { estado: '', help: false, formValid: false, array: [] } },
  methods: {
    confirmar () {
      this.help = true
      if (arguments[0] === 'negative') {
        this.estado = 'negative'
      } else {
        const array = arguments[1]
        const self = this
        addArqMorto(array).then(function (data) {
          if (data.ok) {
            self.estado = 'positive'
            self.array = array
            self.formValid = true
          } else {
            self.estado = 'negative'
          }
        })
      }
    },
    close () {
      this.help = false
      this.formValid = false
    }
  }
}
</script>
