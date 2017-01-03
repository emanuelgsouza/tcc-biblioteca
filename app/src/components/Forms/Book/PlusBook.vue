<template>
  <div>
    <Hero title="Adicionar Livro"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormInsertBook></FormInsertBook>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormInsertBook from './PlusBook/FormPlusBook'

export default {
  name: 'form-plus-book',
  components: { Hero, FormInsertBook }
}
</script>
