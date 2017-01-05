<template>
  <div>
    <form>
      <div class="control">
        <label class="label"> {{ label }} </label>
        <div class="control">
          <div class="select is-fullwidth">
            <select v-model="dado">
              <option value="1"> Um mês </option>
              <option value="2"> Dois meses </option>
            </select>
          </div>
        </div>
      </div>
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
  props: ['label'],
  data () {
    return { dado: '1', numberRegister: 10 }
  },
  methods: {
    backFilters () {
      this.$emit('backFilters')
    },
    sendData () {
      if (!(this.numberRegister <= 0)) this.$emit('sendData', this.dado, this.numberRegister)
    }
  }
}
</script>
