<script>
export default {
  methods: {
    opemMenu () {
      this.$emit('toggleMenu')
    }
  }
}
</script>

<template>
  <div>
    <button
      type="button"
      class="button is-primary is-fullwidth is-medium"
      @click="opemMenu">
      Acessar o Menu do Sistema
    </button>
  </div>
</template>
