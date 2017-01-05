<template>
  <div>
    <Hero title="Registrar empréstimo ou devolução do Aluno"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormExchangeStudent @search="pesquisar"></FormExchangeStudent>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormExchangeStudent from './ExchangeStudent/FormExchangeStudent'

export default {
  name: 'form-delete-student',
  components: { Hero, FormExchangeStudent },
  methods: {
    pesquisar () {
      console.log(arguments)
    }
  }
}
</script>
