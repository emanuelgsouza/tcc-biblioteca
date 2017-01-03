<template>
  <div>
    <Hero title="Gerar Lista de Alunos Por Turma"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <form>
            <label for="" class="label"> Informe a turma </label>
            <div class="control">
              <input
                type="number"
                class="input is-medium is-expanded"
                placeholder="Turma"
                required
                autofocus
                v-model="turma">
              </div>
              <button class="button is-medium is-success"> Pesquisar </button>
          </form>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'

export default {
  name: 'list-students-class',
  components: { Hero }
}
</script>
