<template>
  <div class="content">
    <h2> {{ title }} </h2>
    <p class="control">
      <input
        type="text"
        class="input is-medium is-fullwidt"
        :class="classe"
        :placeholder="placeholder"
        v-model="value">
    </p>
    <div class="control is-grouped">
      <p class="control">
        <button class="button is-success is-medium" @click="search"> Pesquisar </button>
      </p>
      <p class="control">
        <button class="button is-info is-medium" @click="backFilters"> Filtros </button>
      </p>
    </div>
  </div>
</template>

<script>
import { isNameValid } from '../../../../helpers/validates'

export default {
  props: ['title', 'placeholder', 'type'],
  data () { return { value: '' } },
  methods: {
    backFilters () {
      this.$emit('backFilters')
    },
    search () {
      if (this.classe === 'is-success') this.$emit('pesquisar', this.value.toUpperCase())
    }
  },
  watch: {
    value () {
      if (this.type === 'autor') {
        if (this.value === '') {
          this.classe = ''
        } else if (!isNameValid(this.value)) {
          this.classe = 'is-danger'
        } else {
          this.classe = 'is-success'
        }
      } else {
        if (this.value === '') {
          this.classe = ''
        } else {
          this.classe = 'is-success'
        }
      }
    }
  }
}
</script>
