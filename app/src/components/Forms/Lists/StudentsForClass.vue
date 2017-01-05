<template>
  <div>
    <Hero title="Gerar Lista de Alunos Por Turma"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <form>
            <InputClass
              label="Digite o número da turma para pesquisa"
              placeholder="Turma"
              @sendData="value = arguments[0]"></InputClass>
          </form>
          <button class="button is-medium is-success" @click="pesquisar"> Pesquisar </button>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { isClassValid } from '../../../helpers/validates'
import Hero from '../../Hero/Main'
import InputClass from '../formComponents/InputClass'

export default {
  name: 'list-students-class',
  components: { Hero, InputClass },
  data () {
    return {
      value: ''
    }
  },
  methods: {
    pesquisar () {
      if (isClassValid(this.value)) console.log(this.value)
    }
  }
}
</script>
