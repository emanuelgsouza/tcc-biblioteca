<template>
  <div class="menu">
    <Logo></Logo>
    <hr>
    <ButtonClose @closeMenu="close"></ButtonClose>
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
    close () {
      this.$emit('closeMenu')
    }
  }
}
</script>

<style scoped>
.menu {
  width: 20vw;
  height: 100vh;
  position: absolute;
  z-index: 6;
  background-color: #007F7F;
}

.menu.is-active::before {
  content: "";
  position: absolute;
  left: 20vw;
  display: block;
  width: 80vw;
  height: 100vh;
  z-index: 0;
  background-color: rgba(0, 0, 0, .5);
}
</style>
