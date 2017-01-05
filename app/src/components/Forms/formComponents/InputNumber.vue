<template>
  <div>
    <label for="" class="label"> {{ label }} </label>
    <div class="control has-icon has-icon-right">
      <input
        type="number"
        class="input is-medium is-expanded"
        :class="classValueHelp"
        :placeholder="placeholder"
        :min="min"
        :max="max"
        v-model="value">
        <i class="fa" :class="classValue"></i>
        <span class="help" :class="classValueHelp"> {{ valueHelp }} </span>
    </div>
  </div>
</template>

<script>
import { isNumberValid } from '../../../helpers/validates'

export default {
  props: ['label', 'placeholder', 'min', 'max'],
  data () {
    return {
      value: '',
      classValueHelp: '',
      classValue: '',
      valueHelp: ''
    }
  },
  watch: {
    value () {
      const valid = isNumberValid(this.value)
      if (this.value === '') {
        this.classValue = ''
        this.classValueHelp = ''
        this.valueHelp = ''
      } else if (valid.valid) {
        this.classValue = 'fa-warning'
        this.classValueHelp = 'is-danger'
        this.valueHelp = valid.msg
      } else {
        this.classValue = 'fa-check'
        this.classValueHelp = 'is-success'
        this.valueHelp = 'Número válido!'
      }
      this.$emit('sendData', this.value)
    }
  }
}
</script>
