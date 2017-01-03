<template>
  <div>
    <Hero title="Excluir Livro"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormDeleteBook></FormDeleteBook>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormDeleteBook from './DeleteBook/FormDeleteBook'

export default {
  name: 'form-delete-book',
  components: { Hero, FormDeleteBook }
}
</script>
