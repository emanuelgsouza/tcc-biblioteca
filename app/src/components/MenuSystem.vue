<template>
  <div class="menu">
    <Logo></Logo>
    <hr>
    <ButtonClose></ButtonClose>
  </div>
</template>

<script>
import Logo from './MenuSystem/Logo'
import ButtonClose from './MenuSystem/ButtonClose'

export default {
  name: 'menu-system',
  components: {
    Logo,
    ButtonClose
  },
  methods: {
    toggle () {

    }
  }
}
</script>

<style scoped>
.menu {
  width: 25vw;
  height: 100vh;
  position: absolute;
  background-color: #007F7F;
}
</style>
