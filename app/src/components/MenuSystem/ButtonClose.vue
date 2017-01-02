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
  position: absolute;
  top: 1em;
  right: .8em;
  cursor: pointer;
}

.icon:hover {
  color: #00b89c;
}
</style>
