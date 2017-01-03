<template>
  <div>
    <form>
      <label class="label"> Digite o título do livro para pesquisa </label>
      <div class="control has-icon has-icon-right has-addons">
        <input
          type="text"
          class="input is-medium is-expanded"
          :class="classSearchHelp"
          placeholder="Título para pesquisa"
          required
          autofocus
          v-model="search">
          <button class="button is-medium is-success"> Pesquisar </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data () {
    return {
      search: '',
      classSearchHelp: ''
    }
  },
  watch: {
    search () {
      const regExp = /0-9/
      if (this.search === '') {
        this.classSearchHelp = ''
      } else if (regExp.test(this.search)) {
        this.classSearchHelp = 'is-danger'
      } else {
        this.classSearchHelp = 'is-success'
      }
    }
  }
}
</script>
