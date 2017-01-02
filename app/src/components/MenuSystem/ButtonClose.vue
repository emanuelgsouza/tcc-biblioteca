<template>
  <div>
    <span class="icon" @click="close">
      <i class="fa fa-times"></i>
    </span>
  </div>
</template>

<script>
export default {
  methods: {
    close () {
      this.$emit('closeMenu')
    }
  }
}
</script>

<style scoped>
.icon {
  color: #252525;
  position: absolute;
  top: 1em;
  right: .8em;
  cursor: pointer;
}
</style>
