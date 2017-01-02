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
      Acessar o Sistema
    </button>
  </div>
</template>
