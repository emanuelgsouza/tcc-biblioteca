<script>
export default {
  methods: {
    modify () {
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
      @click="modify">
      Acessar o Sistema
    </button>
  </div>
</template>
