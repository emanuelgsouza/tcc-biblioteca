<template>
  <div>
    <form>
      <label class="label"> Digite o título do livro </label>
      <div class="control has-icon has-icon-right">
        <input
          type="text"
          class="input is-medium is-expanded"
          :class="classTitleHelp"
          placeholder="Título"
          required
          autofocus
          v-model="title">
          <i class="fa" :class="{ 'fa-check' : classTitleHelp === 'is-success' }"></i>
          <span class="help" :class="classTitleHelp"> {{ titleHelp }} </span>
      </div>
      <label class="label"> Digite o nome do autor </label>
      <div class="control has-icon has-icon-right">
        <input
          type="text"
          class="input is-medium is-expanded"
          :class="classAuthorHelp"
          placeholder="Autor"
          min="901"
          required
          v-model="author">
          <i class="fa" :class="{ 'fa-check' : classAuthorHelp === 'is-success' }"></i>
          <span class="help" :class="classAuthorHelp"> {{ authorHelp }} </span>
      </div>
      <label class="label"> Digite o nome da editora </label>
      <div class="control has-icon has-icon-right">
        <input
          type="text"
          class="input is-medium is-expanded"
          :class="classEditoraHelp"
          placeholder="Editora"
          min="901"
          required
          v-model="editora">
          <i class="fa" :class="{ 'fa-check' : classEditoraHelp === 'is-success' }"></i>
          <span class="help" :class="classEditoraHelp"> {{ editoraHelp }} </span>
      </div>
      <div class="control is-horizontal">
        <div class="control is-grouped">
          <p class="control is-expanded">
            <input type="number" class="input is-medium" placeholder="Gaveta" min="0">
          </p>
          <p class="control is-expanded">
            <input type="number" class="input is-medium" placeholder="Estante" min="0">
          </p>
        </div>
      </div>
      <p class="control is-expanded">
        <input type="number" class="input is-medium" placeholder="Estoque" min="0">
      </p>
      <hr>
      <div class="columns">
        <div class="column is-6">
          <button
            class="button is-success is-medium is-fullwidth"
            type="button"
            @click="confirm">
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
      formIsValid: [false, false, false],
      title: '',
      titleHelp: '',
      classTitleHelp: '',
      author: '',
      authorHelp: '',
      classAuthorHelp: '',
      editora: '',
      editoraHelp: '',
      classEditoraHelp: ''
    }
  },
  watch: {
    title () {
      const regExp = /0-9/
      if (this.title === '') {
        this.titleHelp = ''
        this.classTitleHelp = ''
        this.formIsValid[0] = false
      } else if (regExp.test(this.title)) {
        this.titleHelp = 'Nome digitado incorretamente'
        this.classTitleHelp = 'is-danger'
        this.formIsValid[0] = false
      } else {
        this.titleHelp = 'Nome digitado corretamente'
        this.classTitleHelp = 'is-success'
        this.formIsValid[0] = true
      }
    },
    author () {
      const regExp = /0-9/
      console.log(this.author)
      if (this.author === '') {
        this.classAuthorHelp = ''
        this.authorHelp = ''
        this.formIsValid[1] = false
      } else if (regExp.test(this.title)) {
        this.classAuthorHelp = 'is-danger'
        this.authorHelp = 'Digite um nome válido'
        this.formIsValid[1] = false
      } else {
        this.classAuthorHelp = 'is-success'
        this.authorHelp = 'Nome válido'
        this.formIsValid[1] = true
      }
    },
    editora () {
      const regExp = /0-9/
      console.log(this.editora)
      if (this.editora === '') {
        this.classEditoraHelp = ''
        this.editoraHelp = ''
        this.formIsValid[2] = false
      } else if (regExp.test(this.title)) {
        this.classEditoraHelp = 'is-danger'
        this.editoraHelp = 'Digite um nome válido'
        this.formIsValid[2] = false
      } else {
        this.classEditoraHelp = 'is-success'
        this.editoraHelp = 'Nome válido'
        this.formIsValid[2] = true
      }
    }
  },
  methods: {
    confirm () {
      const valid = this.formIsValid.every((item) => item === true)
      console.log(valid)
    }
  }
}
</script>
