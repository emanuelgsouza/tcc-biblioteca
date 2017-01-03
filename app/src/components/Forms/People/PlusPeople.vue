<template>
  <div>
    <Hero title="Adicionar People"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormInsertPeople></FormInsertPeople>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormInsertPeople from './PlusPeople/FormInsertPeople'

export default {
  name: 'form-plus-people',
  components: { Hero, FormInsertPeople }
}
</script>
