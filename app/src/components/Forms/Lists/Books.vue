<template>
  <div>
    <Hero title="Lista de livros mais lidos"></Hero>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-8">
          <form>
            <div class="control">
              <label class="label"> Exibir Livros mais lidos no período de </label>
              <div class="control">
                <div class="select is-fullwidth">
                  <select>
                    <option>General enquiry</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="control">
              <label class="label"> Número de Registros </label>
              <div class="control">
                <input type="number" class="input is-expanded" min="1">
              </div>
            </div>
            <p class="control">
              <button class="button is-success is-medium"> Gerar Lista </button>
            </p>
          </form>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Hero from '../../Hero/Main'

export default {
  data () {
    return {

    }
  },
  components: { Hero }
}
</script>

<style scoped>
button.button {
  margin: 1em 0;
}
</style>
