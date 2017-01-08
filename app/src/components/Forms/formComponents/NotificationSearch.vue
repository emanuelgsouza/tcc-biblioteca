<template>
  <div class="notification" :class="state">
    <button class="delete" @click="close"></button>
    <h2 class="title is-4"> {{ label }} </h2>
  </div>
</template>

<script>
export default {
  props: ['state', 'label'],
  methods: {
    close () {
      this.$emit('closeNotification')
    }
  }
}
</script>
