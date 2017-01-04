<template>
  <div>
    <form>
      <label for="" class="label"> Digite o nome do aluno </label>
      <div class="control has-icon has-icon-right">
        <input
          type="text"
          class="input is-medium is-expanded"
          placeholder="Nome"
          :class="classNameHelp"
          required
          autofocus
          v-model="name">
          <i class="fa" :class="className"></i>
          <span class="help" :class="classNameHelp"> {{ nameHelp }} </span>
      </div>
      <label for="" class="label"> Digite a turma do aluno </label>
      <div class="control has-icon has-icon-right">
        <input
          type="number"
          class="input is-medium is-expanded"
          placeholder="Turma"
          :class="classTurmaHelp"
          min="901"
          required
          v-model="turma">
          <i class="fa" :class="classTurma"></i>
          <span class="help" :class="classTurmaHelp"> {{ turmaHelp }} </span>
      </div>
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
    <hr>
    <Notification v-if="err" @closeNotification="err = false"></Notification>
  </div>
</template>

<script>
import { createPeople } from '../../../../helpers/factories'
import { isNameValid, isClassValid } from '../../../../helpers/functions'
import Notification from '../../formComponents/Notification'

export default {
  components: { Notification },
  data () {
    return {
      name: '',
      turma: '',
      classNameHelp: '',
      className: '',
      nameHelp: '',
      classTurmaHelp: '',
      classTurma: '',
      turmaHelp: '',
      err: false
    }
  },
  watch: {
    name () {
      if (this.name === '') {
        this.className = ''
        this.classNameHelp = ''
        this.nameHelp = ''
      } else if (!isNameValid(this.name)) {
        this.className = 'fa-warning'
        this.classNameHelp = 'is-danger'
        this.nameHelp = 'Nome inválido! Somente letras serão aceitas, sem acentos nem cecidilha'
      } else {
        this.className = 'fa-check'
        this.classNameHelp = 'is-success'
        this.nameHelp = 'Nome válido!'
      }
    },
    turma () {
      if (this.turma === '') {
        this.classTurma = ''
        this.classTurmaHelp = ''
        this.turmaHelp = ''
      } else if (!isClassValid(this.turma)) {
        this.classTurma = 'fa-warning'
        this.classTurmaHelp = 'is-danger'
        this.turmaHelp = 'Turma inválida! Turmas acima de 901 serão aceitas'
      } else {
        this.classTurma = 'fa-check'
        this.classTurmaHelp = 'is-success'
        this.turmaHelp = 'Turma válida!'
      }
    }
  },
  methods: {
    confirm () {
      const valid = createPeople('student', this.name, this.turma)
      if (!valid.valid) {
        this.err = true
      }
    }
  }
}
</script>
