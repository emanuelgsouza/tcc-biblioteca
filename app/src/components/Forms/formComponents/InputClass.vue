<template>
  <div>
    <label for="" class="label"> {{ label }} </label>
      <div class="control has-icon has-icon-right">
        <input
          type="number"
          class="input is-medium is-expanded"
          :placeholder="placeholder"
          :class="classTurmaHelp"
          min="901"
          required
          :disabled="disabled"
          v-model="turma">
          <i class="fa" :class="classTurma"></i>
          <span class="help" :class="classTurmaHelp"> {{ turmaHelp }} </span>
      </div>
  </div>
</template>

<script>
import { isClassValid } from '../../../helpers/validates'

export default {
  props: ['placeholder', 'label', 'dissabled'],
  data () {
    return {
      turma: '',
      classTurmaHelp: '',
      classTurma: '',
      turmaHelp: ''
    }
  },
  watch: {
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
      this.$emit('sendData', this.turma)
    }
  }
}
</script>
