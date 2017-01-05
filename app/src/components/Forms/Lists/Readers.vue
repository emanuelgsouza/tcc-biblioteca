<template>
  <div>
    <Hero title="Lista de leitores"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <button
            class="button is-info is-medium is-fullwidth"
            @click="toggleFilters(true, 'aluno')"
            v-if="showButton">
            Alunos
          </button>
          <transition>
            <FormModel
              v-if="currentSearch === 'aluno'"
              label="Exibir os leitores no período de"
              @backFilters="toggleFilters(false)"
              @sendData="gerarLista"
              ></FormModel>
          </transition>

          <button
            class="button is-info is-medium is-fullwidth"
            @click="toggleFilters(true, 'pessoa')"
            v-if="showButton">
            Não Alunos
          </button>
          <transition>
            <FormModel
              v-if="currentSearch === 'pessoa'"
              label="Exibir os leitores no período de"
              @backFilters="toggleFilters(false)"
              @sendData="gerarLista"
              ></FormModel>
          </transition>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormModel from './components/FormModel'

export default {
  data () {
    return {
      currentSearch: null,
      showButton: true
    }
  },
  components: { Hero, FormModel },
  methods: {
    toggleFilters (showFilter, esc) {
      if (showFilter) {
        this.currentSearch = esc
        this.showButton = false
      } else {
        this.showButton = true
        this.currentSearch = null
      }
    },
    gerarLista () {
      console.log(arguments)
    }
  }
}
</script>

<style scoped>
button.button {
  margin: 1em 0;
}
</style>
