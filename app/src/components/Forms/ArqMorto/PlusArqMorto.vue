<template>
  <div>
    <Hero title="Adicionar Livro"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormInsertArqMorto></FormInsertArqMorto>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormInsertArqMorto from './PlusArqMorto/FormPlusArqMorto'

export default {
  name: 'form-plus-book',
  components: { Hero, FormInsertArqMorto }
}
</script>
