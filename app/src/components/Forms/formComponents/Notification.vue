<template>
  <div class="notification" :class="className">
    <button class="delete" @click="closeNotification"></button>
    {{ title }}
    <ul v-if="estado === 'positive'">
      <li v-for="(value, key) in dados">
        <p>{{ key }} - {{ value }}</p>
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
