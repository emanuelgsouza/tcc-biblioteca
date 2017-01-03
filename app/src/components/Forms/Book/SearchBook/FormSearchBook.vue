<template>
  <div>
    <button
      class="button is-info is-medium is-fullwidth"
      @click="toggleFilters(true, 'literario')"
      v-if="showButton">
      Gênero Literário
    </button>
    <transition>
      <Selects
        v-if="currentSearch === 'literario'"
        title="Selecione o Gênero Literário"
        @backFilters="toggleFilters(false)"
        ></Selects>
    </transition>

    <button
      class="button is-info is-medium is-fullwidth"
      @click="toggleFilters(true, 'didatico')"
      v-if="showButton">
      Categoria Didática
    </button>
    <transition>
      <Selects
        v-if="currentSearch === 'didatico'"
        title="Selecione a categoria didática"
        @backFilters="toggleFilters(false)"
        ></Selects>
    </transition>

    <button
      class="button is-info is-medium is-fullwidth"
      @click="toggleFilters(true, 'escola')"
      v-if="showButton">
      Escola Literária
    </button>
    <transition>
      <Selects
        v-if="currentSearch === 'escola'"
        title="Selecione escola literária"
        @backFilters="toggleFilters(false)"
        ></Selects>
    </transition>

    <button
      class="button is-info is-medium is-fullwidth"
      @click="toggleFilters(true, 'titulo')"
      v-if="showButton">
      Título em especial
    </button>
    <transition>
      <Inputs
        v-if="currentSearch === 'titulo'"
        title="Pesquise pelo título do livro"
        @backFilters="toggleFilters(false)"
        placeholder="Digite um título para pesquisa"
        ></Inputs>
    </transition>

    <button
      class="button is-info is-medium is-fullwidth"
      @click="toggleFilters(true, 'autor')"
      v-if="showButton">
      Autor
    </button>
    <transition>
      <Inputs
        v-if="currentSearch === 'autor'"
        title="Pesquise pelo título do livro"
        @backFilters="toggleFilters(false)"
        placeholder="Digite um autor para pesquisa"
        ></Inputs>
    </transition>
  </div>
</template>

<script>
import Selects from './Selects'
import Inputs from './Inputs'

export default {
  data () {
    return {
      currentSearch: null,
      showButton: true
    }
  },
  components: { Selects, Inputs },
  methods: {
    toggleFilters (showFilter, esc) {
      if (showFilter) {
        this.currentSearch = esc
        this.showButton = false
      } else {
        this.showButton = true
        this.currentSearch = null
      }
    }
  }
}
</script>

<style scoped>
button.button {
  margin: 1em 0;
}
</style>
