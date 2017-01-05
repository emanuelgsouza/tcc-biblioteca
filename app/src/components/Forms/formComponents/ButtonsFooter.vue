<template>
  <div class="columns">
    <div class="column is-6">
      <button
        class="button is-success is-medium is-fullwidth"
        type="button"
        @click="confirm">
        Confirmar
      </button>
    </div>
    <div class="column is-6">
      <input
        class="button is-danger is-medium is-fullwidth"
        type="reset"
        value="Cancelar">
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    confirm () {
      this.$emit('confirm')
    }
  }
}
</script>
