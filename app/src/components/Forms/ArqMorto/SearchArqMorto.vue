<template>
  <div>
    <Hero title="Pesquisar Livro no Arquivo Morto"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormSearchArqMorto @pesquisar="pesquisar"></FormSearchArqMorto>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormSearchArqMorto from './SearchArqMorto/FormSearchArqMorto'

export default {
  name: 'form-search-book',
  components: { Hero, FormSearchArqMorto },
  methods: {
    pesquisar () {
      console.log(arguments)
    }
  }
}
</script>
