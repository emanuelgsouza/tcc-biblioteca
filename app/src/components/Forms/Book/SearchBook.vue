<template>
  <div>
    <Hero title="Adicionar Livro"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormSearchBook></FormSearchBook>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormSearchBook from './SearchBook/FormSearchBook'

export default {
  name: 'form-search-book',
  components: { Hero, FormSearchBook }
}
</script>
