<template>
  <div>
    <label class="label"> {{ label }} </label>
    <div class="control has-icon has-icon-right has-addons">
      <input
        type="text"
        class="input is-medium is-expanded"
        :placeholder="placeholder"
        required
        autofocus
        v-model="value">
        <button class="button is-medium is-success" @click="enviarDados"> Pesquisar </button>
    </div>
  </div>
</template>

<script>
export default {
  props: ['label', 'placeholder'],
  data () {
    return { value: '' }
  },
  methods: {
    enviarDados () {
      this.$emit('search', this.value)
    }
  }
}
</script>
