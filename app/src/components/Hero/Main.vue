<template>
  <div>
    <transition name="slide-fade">
      <MenuSystem
        v-if="menuIsVisible"
        :class="{ 'is-active' : menuIsVisible }"
        @closeMenu="menuIsVisible = !menuIsVisible">
      </MenuSystem>
    </transition>
    <header class="hero is-primary">
      <div class="hero-body">
        <div class="container">
          <h1 class="title has-text-centered"> {{ title }} </h1>
        </div>
      </div>
      <span
        class="icon is-medium"
        @click="menuIsVisible = !menuIsVisible">
        <i class="fa fa-bars"></i>
      </span>
    </header>
  </div>
</template>

<script>
import MenuSystem from '../MenuSystem'

export default {
  name: 'hero-forms',
  components: { MenuSystem },
  props: ['title'],
  data () {
    return {
      menuIsVisible: false
    }
  }
}
</script>

<style scoped>
  .icon {
    position: absolute;
    top: 1.2em;
    left: 1em;
    cursor: pointer;
  }
</style>
