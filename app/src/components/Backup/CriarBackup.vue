<template lang="html">
  <div>
    <label class="label"> Digite o nome do arquivo </label>
    <p class="control">
      <input type="text" class="input is-medium" v-model="text">
    </p>
    <label class="label"> Digite a data do backup </label>
    <p class="control">
      <input type="date" class="input is-medium" v-model="date">
    </p>

    <button class="button is-success is-medium" @click="createBackup"> Confirmar </button>
    <button class="button is-danger is-medium" @click="cancel"> Cancelar </button>
  </div>
</template>

<script>
import { dumpBank } from '../../pouchdb/backup'

export default {
  data () {
    return {
      text: 'qg-da-leitura',
      date: ''
    }
  },
  methods: {
    cancel () { this.$emit('cancelBackup') },
    createBackup () {
      const fileName = `${this.text}-${this.date}.txt`
      dumpBank(fileName).then(data => {
        if (data.ok) {
          this.$emit('funfou', true)
        } else {
          this.$emit('funfou', false)
        }
      })
    }
  }
}
</script>

<style lang="css">
</style>
