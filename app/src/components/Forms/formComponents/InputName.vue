<template>
  <div>
    <label for="" class="label"> {{ label }} </label>
    <div class="control has-icon has-icon-right">
      <input
        type="text"
        class="input is-medium is-expanded"
        :placeholder="placeholder"
        :class="classNameHelp"
        required
        autofocus
        :disabled="disabled"
        v-model="name">
        <i class="fa" :class="className"></i>
        <span class="help" :class="classNameHelp"> {{ nameHelp }} </span>
    </div>
  </div>
</template>

<script>
import { isNameValid } from '../../../helpers/validates'

export default {
  props: ['placeholder', 'label', 'disabled', 'resetar'],
  data () {
    return {
      name: '',
      classNameHelp: '',
      className: '',
      nameHelp: ''
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
      this.$emit('sendData', this.name)
    }
  }
}
</script>
