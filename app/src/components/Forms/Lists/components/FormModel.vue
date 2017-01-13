<template>
  <div>
    <form>
      <div class="control">
        <label class="label"> Número de Registros </label>
        <div class="control">
          <input
            type="number"
            class="input is-expanded"
            min="1"
            v-model="numberRegister">
        </div>
      </div>
      <div class="control is-grouped">
        <p class="control">
          <button class="button is-success is-medium" @click="sendData"> Gerar Lista </button>
        </p>
        <p class="control">
          <button class="button is-info is-medium" @click="backFilters"> Filtros </button>
        </p>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data () {
    return { numberRegister: 10 }
  },
  methods: {
    backFilters () {
      this.$emit('backFilters')
    },
    sendData () {
      if (!(this.numberRegister <= 0)) this.$emit('sendData', this.numberRegister)
    }
  }
}
</script>
