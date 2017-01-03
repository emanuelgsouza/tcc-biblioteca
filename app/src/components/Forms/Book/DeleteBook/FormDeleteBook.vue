<template>
  <div>
    <form>
      <label class="label"> Digite o título do livro para pesquisa </label>
      <div class="control has-icon has-icon-right">
        <input
          type="text"
          class="input is-medium is-expanded"
          :class="classSearchHelp"
          placeholder="Título"
          required
          autofocus
          v-model="search">
          <i class="fa" :class="{ 'fa-check' : classSearchHelp === 'is-success' }"></i>
          <span class="help" :class="classSearchHelp"> {{ searchHelp }} </span>
      </div>
      <hr>
      <div class="columns">
        <div class="column is-6">
          <button
            class="button is-success is-medium is-fullwidth"
            type="button">
            Confirmar
          </button>
        </div>
        <div class="column is-6">
          <input
            class="button is-danger is-medium is-fullwidth"
            type="reset"
            value="Cancelar">
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data () {
    return {
      search: '',
      searchHelp: '',
      classSearchHelp: ''
    }
  },
  watch: {
    search () {
      const regExp = /0-9/
      if (this.search === '') {
        this.searchHelp = ''
        this.classSearchHelp = ''
      } else if (regExp.test(this.search)) {
        this.searchHelp = 'Título digitado incorretamente'
        this.classSearchHelp = 'is-danger'
      } else {
        this.searchHelp = 'Título digitado corretamente'
        this.classSearchHelp = 'is-success'
      }
    }
  }
}
</script>
