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
        :dados="genre"
        @backFilters="toggleFilters(false)"
        @pesquisar="search"
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
        :dados="didatic"
        @backFilters="toggleFilters(false)"
        @pesquisar="search"
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
        :dados="schools"
        @backFilters="toggleFilters(false)"
        @pesquisar="search"
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
        placeholder="Digite um título para pesquisa"
        @backFilters="toggleFilters(false)"
        @pesquisar="search"
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
        placeholder="Digite um autor para pesquisa"
        @backFilters="toggleFilters(false)"
        @pesquisar="search"
        ></Inputs>
    </transition>
  </div>
</template>

<script>
import { genre, didatic, schools } from '../../../../helpers/Objects'
import Selects from './Selects'
import Inputs from './Inputs'

export default {
  data () {
    return {
      currentSearch: null,
      showButton: true,
      genre,
      didatic,
      schools
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
    },
    search () {
      const data = arguments[0]
      this.$emit('search', data, this.currentSearch)
    }
  }
}
</script>

<style scoped>
button.button {
  margin: 1em 0;
}
</style>
