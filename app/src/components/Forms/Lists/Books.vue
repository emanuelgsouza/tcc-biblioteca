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
                  <select v-model="dado">
                    <option value="2"> Dois meses </option>
                    <option value="3"> Três meses </option>
                    <option value="6"> Seis meses </option>
                    <option value="12"> Anual </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="control">
              <label class="label"> Número de Registros </label>
              <div class="control">
                <input type="number" class="input is-expanded" min="1" v-model="numberRegister">
              </div>
            </div>
            <button class="button is-success is-medium" @click="sendData"> Gerar Lista </button>
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
      dado: 2,
      numberRegister: 10
    }
  },
  components: { Hero },
  methods: {
    sendData () {
      if (!(this.numberRegister <= 0)) {
        console.log(this.numberRegister)
      }
    }
  }
}
</script>

<style scoped>
button.button {
  margin: 1em 0;
}
</style>
