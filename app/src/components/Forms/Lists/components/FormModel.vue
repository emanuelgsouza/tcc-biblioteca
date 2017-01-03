<template>
  <div>
    <form>
      <div class="control">
        <label class="label"> {{ label }} </label>
        <div class="control">
          <div class="select is-fullwidth">
            <select>
              <option>General enquiry</option>
            </select>
          </div>
        </div>
      </div>
      <div class="control">
        <label class="label"> Número de Registros </label>
        <div class="control">
          <input type="number" class="input is-expanded" min="1">
        </div>
      </div>
      <div class="control is-grouped">
        <p class="control">
          <button class="button is-success is-medium"> Gerar Lista </button>
        </p>
        <p class="control">
          <button class="button is-info is-medium" @click="backFilters"> Filtros </button>
        </p>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  props: ['label'],
  methods: {
    backFilters () {
      this.$emit('backFilters')
    }
  }
}
</script>
