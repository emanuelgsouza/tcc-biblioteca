<template>
  <div>
    <Hero title="Adicionar Livro"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormInsertArqMorto
            v-if="open === true"
            @result="confirmar"></FormInsertArqMorto>
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
import Hero from '../../Hero/Main'
import FormInsertArqMorto from './PlusArqMorto/FormPlusArqMorto'
import Notification from '../formComponents/Notification'

export default {
  name: 'form-plus-book',
  components: { Hero, FormInsertArqMorto, Notification },
  data () {
    return {
      open: true
    }
  },
  methods: {
    confirmar () {
      this.err = true
      if (arguments[2]) {
        this.open = false
        this.dados = arguments[0]
        this.estadoNotification = arguments[1]
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
