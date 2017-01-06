<template>
  <div>
    <Hero title="Adicionar Livro"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <Notifications v-if="help" :estado="estado" :array="array" @closeNotification="close"></Notifications>
          <hr v-if="help">
          <FormInsertBook @confirm="confirmar" v-if="!formValid"></FormInsertBook>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormInsertBook from './PlusBook/FormPlusBook'
import Notifications from '../formComponents/Notification'

export default {
  name: 'form-plus-book',
  components: { Hero, FormInsertBook, Notifications },
  data () { return { estado: '', help: false, formValid: false, array: [] } },
  methods: {
    confirmar () {
      this.help = true
      if (arguments[0] === 'negative') {
        this.estado = 'negative'
      } else {
        this.estado = 'positive'
        this.array = arguments[1]
        this.formValid = true
      }
    },
    close () {
      this.help = false
      this.formValid = false
    }
  }
}
</script>
