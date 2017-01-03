<template>
  <div class="content">
    <h2> {{ title }} </h2>
    <p class="control">
      <input
        type="text"
        class="input is-medium is-fullwidt"
        :placeholder="placeholder">
    </p>
    <div class="control is-grouped">
      <p class="control">
        <button class="button is-success is-medium"> Pesquisar </button>
      </p>
      <p class="control">
        <button class="button is-info is-medium" @click="backFilters"> Filtros </button>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  props: ['title', 'placeholder'],
  methods: {
    backFilters () {
      this.$emit('backFilters')
    }
  }
}
</script>
