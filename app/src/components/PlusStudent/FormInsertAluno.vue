<template>
  <div>
    <form>
      <label for="" class="label"> Digite o nome do aluno </label>
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
      <label for="" class="label"> Digite a turma do aluno </label>
      <div class="control has-icon has-icon-right">
        <input
          type="number"
          class="input is-medium is-expanded"
          :class="classTurmaHelp"
          placeholder="Turma"
          min="901"
          required
          v-model="turma">
          <i class="fa" :class="{ 'fa-check' : classTurmaHelp === 'is-success' }"></i>
          <span class="help" :class="classTurmaHelp"> {{ turmaHelp }} </span>
      </div>
      <hr>
      <div class="columns">
        <div class="column is-6">
          <input
            class="button is-success is-medium is-fullwidth"
            type="submit"
            value="Confirmar"
            @click="confirm">
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
      formIsValid: [false, false],
      name: '',
      turma: '',
      nameHelp: '',
      classNameHelp: '',
      classTurmaHelp: '',
      turmaHelp: ''
    }
  },
  watch: {
    name () {
      const regExp = /0-9/
      if (this.name === '') {
        this.nameHelp = ''
        this.classNameHelp = ''
        this.formIsValid[0] = false
      } else if (regExp.test(this.name)) {
        this.nameHelp = 'Nome digitado incorretamente'
        this.classNameHelp = 'is-danger'
        this.formIsValid[0] = false
      } else {
        this.nameHelp = 'Nome digitado corretamente'
        this.classNameHelp = 'is-success'
        this.formIsValid[0] = true
      }
    },
    turma () {
      if (this.turma === '') {
        this.classTurmaHelp = ''
        this.turmaHelp = ''
        this.formIsValid[1] = false
      } else if (this.turma < 901) {
        this.classTurmaHelp = 'is-danger'
        this.turmaHelp = 'Digite uma turma válida, números menores que 901 não são aceitos'
        this.formIsValid[1] = false
      } else if (this.turma >= 901) {
        this.classTurmaHelp = 'is-success'
        this.turmaHelp = 'Turma válida'
        this.formIsValid[1] = true
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
