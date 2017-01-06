<template>
  <div class="content">
    <h2> {{ title }} </h2>
    <p class="control">
      <span class="select is-medium is-fullwidth">
        <select v-model="value">
          <option v-for="option in dados" :value="option.value"> {{ option.text }} </option>
        </select>
      </span>
    </p>
    <div class="control is-grouped">
      <p class="control">
        <button class="button is-success is-medium" @click="pesquisar"> Pesquisar </button>
      </p>
      <p class="control">
        <button class="button is-info is-medium" @click="backFilters"> Filtros </button>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  props: ['title', 'dados'],
  data () { return { value: 'n' } },
  methods: {
    backFilters () {
      this.$emit('backFilters')
    },
    pesquisar () {
      this.$emit('pesquisar', this.value)
    }
  }
}
</script>
