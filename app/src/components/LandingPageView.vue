<style scoped>
</style>

<template>
  <div>
    <transition name="slide-fade">
      <MenuSystem
        v-if="menuIsVisible"
        :class="{ 'is-active' : menuIsVisible }"
        @closeMenu="close">
      </MenuSystem>
    </transition>
    <div class="columns is-centered">
      <div class="column is-6">
        <Logo></Logo>
        <ButtonSystem @toggleMenu="toggle"></ButtonSystem>
      </div>
    </div>
  </div>
</template>

<script>
import Logo from './LandingPageView/Logo'
import ButtonSystem from './LandingPageView/ButtonSystem'
import MenuSystem from './MenuSystem'

export default {
  components: {
    Logo,
    ButtonSystem,
    MenuSystem
  },
  name: 'home',
  data () {
    return {
      menuIsVisible: false
    }
  },
  methods: {
    toggle () {
      this.menuIsVisible = !this.menuIsVisible
    },
    close () {
      this.menuIsVisible = !this.menuIsVisible
    }
  }
}
</script>

<style scoped>
.slide-fade-enter-active {
transition: all .3s ease;
}
.slide-fade-leave-active {
transition: all .8s ease;
}
.slide-fade-enter, .slide-fade-leave-active {
transform: translateX(-100%);
opacity: 0;
}
</style>
