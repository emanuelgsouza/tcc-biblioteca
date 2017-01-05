<template>
  <div>
    <form>
      <InputSearch
        label="Digite o título do livro"
        placeholder="Título"
        @search="search"></InputSearch>
    </form>
  </div>
</template>

<script>
import InputSearch from '../../formComponents/InputSearch'

export default {
  components: { InputSearch },
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
