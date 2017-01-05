<template>
  <div>
    <label for="" class="label"> {{ label }} </label>
    <p class="control has-icon has-icon-right">
      <input
        type="text"
        class="input is-medium is-expanded"
        :class="{ 'is-success' :help }"
        :placeholder="placeholder"
        required
        v-model="text">
      <i class="fa" :class="{ 'fa-check' : help }"></i>
      <span class="help" :class="{ 'is-success' :help }" v-if="help"> Campo válido </span>
    </p>
  </div>
</template>

<script>
export default {
  props: ['label', 'placeholder'],
  data () {
    return { text: '', help: false }
  },
  watch: {
    text () {
      if (this.text === '') {
        this.help = false
      } else {
        this.help = true
      }
      this.$emit('sendData', this.text)
    }
  }
}
</script>
