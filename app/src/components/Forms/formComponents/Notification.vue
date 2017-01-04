<template>
  <div class="notification is-danger">
    <button class="delete" @click="closeNotification"></button>
    Há um erro nos campos preenchidos, favor verificá-los!
  </div>
</template>

<script>
export default {
  methods: {
    closeNotification () {
      this.$emit('closeNotification')
    }
  }
}
</script>
