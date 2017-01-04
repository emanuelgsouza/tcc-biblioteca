<template>
  <div>
    <Hero title="Adicionar Aluno"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormInsertAluno></FormInsertAluno>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormInsertAluno from './PlusStudent/FormInsertAluno'

export default {
  name: 'form-plus-student',
  components: { Hero, FormInsertAluno },
  data () {
    return {
      menuIsVisible: false
    }
  }
}
</script>
