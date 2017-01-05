<template>
  <div>
    <Hero title="Excluir Aluno"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormDeleteStudent @delete="detetar"></FormDeleteStudent>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormDeleteStudent from './DeleteStudent/FormDeleteStudent'

export default {
  name: 'form-delete-student',
  components: { Hero, FormDeleteStudent },
  methods: {
    detetar () {
      console.log(arguments)
    }
  }
}
</script>
