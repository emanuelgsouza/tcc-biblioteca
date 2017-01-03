<template>
  <div class="content">
    <h2> {{ title }} </h2>
    <p class="control">
      <span class="select is-medium is-fullwidth">
        <select>
          <option value=""> Selecione um genero literário </option>
        </select>
      </span>
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
  props: ['title'],
  methods: {
    backFilters () {
      this.$emit('backFilters')
    }
  }
}
</script>
