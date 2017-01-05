<template>
  <div>
    <label for="" class="label"> {{ label }} </label>
    <div class="control has-icon has-icon-right">
      <input
        type="number"
        class="input is-medium is-expanded"
        :class="classPhoneHelp"
        :placeholder="placeholder"
        min="901"
        required
        v-model="phone">
        <i class="fa" :class="{ 'fa-check' : classPhoneHelp === 'is-success' }"></i>
        <span class="help" :class="classPhoneHelp"> {{ phoneHelp }} </span>
    </div>
  </div>
</template>

<script>
import { isPhoneValid } from '../../../helpers/validates'

export default {
  props: ['label', 'placeholder'],
  data () {
    return {
      phone: ''
    }
  },
  watch: {
    phone () {
      const valid = isPhoneValid(this.phone)
      if (this.phone === '') {
        this.classPhone = ''
        this.classPhoneHelp = ''
        this.phoneHelp = ''
      } else if (valid.err) {
        this.classPhone = 'fa-warning'
        this.classPhoneHelp = 'is-danger'
        this.phoneHelp = valid.msg
      } else {
        this.classPhone = 'fa-check'
        this.classPhoneHelp = 'is-success'
        this.phoneHelp = 'Número de telefone válido!'
      }
      this.$emit('sendData', this.phone)
    }
  }
}
</script>
