<template>
  <div>
    <Hero title="Registrar empréstimo ou devolução do Não Aluno"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormExchangePeople></FormExchangePeople>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormExchangePeople from './ExchangePeople/FormExchangePeople'

export default {
  name: 'form-delete-student',
  components: { Hero, FormExchangePeople }
}
</script>
