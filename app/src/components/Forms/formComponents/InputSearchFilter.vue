<template>
  <div class="content">
    <h2> {{ title }} </h2>
    <p class="control">
      <input
        type="text"
        class="input is-medium is-fullwidt"
        :class="help"
        :placeholder="placeholder"
        v-model="value">
    </p>
    <div class="control is-grouped">
      <p class="control">
        <button class="button is-success is-medium" @click="sendDatas"> Pesquisar </button>
      </p>
      <p class="control">
        <button class="button is-info is-medium" @click="backFilters"> Filtros </button>
      </p>
    </div>
  </div>
</template>

<script>
import { isNameValid } from '../../../helpers/validates'

export default {
  props: ['title', 'placeholder', 'type'],
  data () { return { value: '', help: '' } },
  methods: {
    backFilters () {
      this.$emit('backFilters')
    },
    sendDatas () {
      if (!(this.value === '')) this.$emit('confirm', this.type)
    }
  },
  watch: {
    value () {
      if (this.value === '') this.help = ''
      if (this.type === 'author') {
        if (isNameValid(this.value)) {
          this.help = 'is-success'
        } else {
          this.help = 'is-danger'
        }
      }
      if (this.type === 'title') {
        if (this.value === '') {
          this.help = 'is-danger'
        } else {
          this.help = 'is-success'
        }
      }
      this.$emit('sendData', this.value)
    }
  }
}
</script>
