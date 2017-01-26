<template lang="html">
  <div>
    <label class="label"> Selecione um arquivo para backup </label>
    <p class="control">
      <input type="file" @change="loadArquivo">
    </p>

    <button
      class="button is-success is-medium"
      @click="loadBackup"
      :disabled="file === ''"> Confirmar </button>
    <button class="button is-danger is-medium" @click="cancel"> Cancelar </button>
  </div>
</template>

<script>
import { loadBank } from '../../pouchdb/backup'

export default {
  data () {
    return { file: '' }
  },
  methods: {
    cancel () { this.$emit('cancelLoad') },
    loadArquivo () {
      this.file = arguments[0].target.files[0].name
    },
    loadBackup () {
      loadBank(this.file).then(data => {
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
