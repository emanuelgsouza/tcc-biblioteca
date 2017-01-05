<template>
  <div>
    <form>
      <InputSearchDel
        label="Digite o título do livro"
        placeholder="Título"
        @search="search"></InputSearchDel>
    </form>
  </div>
</template>

<script>
import InputSearchDel from '../../formComponents/InputSearchDel'

export default {
  components: { InputSearchDel },
  data () {
    return {
      title: ''
    }
  },
  methods: {
    search () {
      const dados = arguments[0]
      const title = dados.trim()
      this.$emit('delete', title)
    }
  }
}
</script>
