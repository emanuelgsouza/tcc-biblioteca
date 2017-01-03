<template>
  <div>
    <form>
      <label for="" class="label"> Digite o nome da pessoa para pesquisa </label>
      <div class="control has-icon has-icon-right">
        <input
          type="text"
          class="input is-medium is-expanded"
          :class="classNameHelp"
          placeholder="Nome"
          required
          autofocus
          v-model="name">
          <i class="fa" :class="{ 'fa-check' : classNameHelp === 'is-success' }"></i>
          <span class="help" :class="classNameHelp"> {{ nameHelp }} </span>
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
      name: '',
      nameHelp: '',
      classNameHelp: ''
    }
  },
  watch: {
    name () {
      const regExp = /0-9/
      if (this.name === '') {
        this.nameHelp = ''
        this.classNameHelp = ''
      } else if (regExp.test(this.name)) {
        this.nameHelp = 'Nome digitado incorretamente'
        this.classNameHelp = 'is-danger'
      } else {
        this.nameHelp = 'Nome digitado corretamente'
        this.classNameHelp = 'is-success'
      }
    }
  }
}
</script>
