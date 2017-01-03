<template>
  <div>
    <Hero title="Excluir Não Aluno"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormDeletePeople></FormDeletePeople>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormDeletePeople from './DeletePeople/FormDeletePeople'

export default {
  name: 'form-delete-people',
  components: { Hero, FormDeletePeople }
}
</script>
