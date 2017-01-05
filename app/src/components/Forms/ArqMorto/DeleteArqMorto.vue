<template>
  <div>
    <Hero title="Excluir Livro do Arquivo Morto"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormDeleteArqMorto @delete="deletar"></FormDeleteArqMorto>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormDeleteArqMorto from './DeleteArqMorto/FormDeleteArqMorto'

export default {
  name: 'form-delete-arq-morto',
  components: { Hero, FormDeleteArqMorto },
  methods: {
    deletar () {
      console.log(arguments)
    }
  }
}
</script>
