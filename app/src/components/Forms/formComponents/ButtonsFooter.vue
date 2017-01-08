<template>
  <div class="columns is-mobile">
    <div class="column is-6">
      <button
        class="button is-success is-medium is-fullwidth"
        type="button"
        @click="confirmar">
        Confirmar
      </button>
    </div>
    <div class="column is-6">
      <input
        class="button is-danger is-medium is-fullwidth"
        type="reset"
        value="Limpar">
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    confirmar () {
      this.$emit('confirm')
    }
  }
}
</script>
