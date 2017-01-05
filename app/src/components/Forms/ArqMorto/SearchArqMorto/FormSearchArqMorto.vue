<template>
  <div>
    <button
      class="button is-info is-medium is-fullwidth"
      @click="toggleFilters(true, 'titulo')"
      v-if="showButton">
      Título em especial
    </button>
    <transition>
      <InputSearchFilter
        v-if="currentSearch === 'titulo'"
        title="Pesquise pelo título do livro"
        @backFilters="toggleFilters(false)"
        placeholder="Digite um título para pesquisa"
        type="title"
        @sendData="value = arguments[0]"
        @confirm="search"
        ></InputSearchFilter>
    </transition>

    <button
      class="button is-info is-medium is-fullwidth"
      @click="toggleFilters(true, 'autor')"
      v-if="showButton">
      Autor
    </button>
    <transition>
      <InputSearchFilter
        v-if="currentSearch === 'autor'"
        title="Pesquise pelo título do livro"
        @backFilters="toggleFilters(false)"
        placeholder="Digite um autor para pesquisa"
        type="author"
        @sendData="value = arguments[0]"
        @confirm="search"
        ></InputSearchFilter>
    </transition>
  </div>
</template>

<script>
import InputSearchFilter from '../../formComponents/InputSearchFilter.vue'

export default {
  data () {
    return {
      currentSearch: null,
      showButton: true,
      value: ''
    }
  },
  components: { InputSearchFilter },
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
      const type = arguments[0]
      this.$emit('pesquisar', this.value, type)
    }
  }
}
</script>

<style scoped>
button.button {
  margin: 1em 0;
}
</style>
