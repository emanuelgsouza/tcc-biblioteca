<template>
  <div>
    <Hero title="Adicionar Aluno"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <FormInsertAluno></FormInsertAluno>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'
import FormInsertAluno from './PlusStudent/FormInsertAluno'

export default {
  name: 'form-plus-student',
  components: { Hero, FormInsertAluno },
  data () {
    return {
      menuIsVisible: false
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
