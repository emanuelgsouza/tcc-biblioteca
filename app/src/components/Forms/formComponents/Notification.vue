<template>
  <div class="notification" :class="className">
    <button class="delete" @click="closeNotification"></button>
    <h1 class="title is-4 has-text-centered">{{ title }}</h1>
    <hr v-show="estado === 'positive'">
    <ul v-if="estado === 'positive'">
      <li v-for="(value, key) in dados">
        <p class="title is-4 datas">{{ key }} - {{ value }}</p>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: ['estado', 'array'],
  methods: {
    closeNotification () {
      this.$emit('closeNotification')
    }
  },
  computed: {
    className () {
      if (this.estado === 'positive') {
        return 'is-success'
      } else {
        return 'is-danger'
      }
    },
    title () {
      if (this.estado === 'positive') return 'Dado(s) inserido(s) com sucesso'
      return 'Há um erro no(s) campo(s) preenchido(s), favor verificá-lo(s)!'
    },
    dados () {
      return this.array
    }
  }
}
</script>

<style scoped>
  .datas {
    font-weight: 500;
  }
</style>
