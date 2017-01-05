<template>
  <div>
    <form>
      <InputText
        label="Digite o título do livro para pesquisa"
        placeholder="Título"
        @sendData="title = arguments[0]"
      ></InputText>
      <hr>
      <ButtonsFooter @confirm="confirmar"></ButtonsFooter>
      </div>
    </form>
  </div>
</template>

<script>
import InputText from '../../formComponents/InputText'
import ButtonsFooter from '../../formComponents/ButtonsFooter'

export default {
  components: { InputText, ButtonsFooter },
  data () {
    return {
      title: ''
    }
  },
  methods: {
    confirmar () {
      const title = this.title.trim()
      const dados = { title }
      this.$emit('delete', dados)
    }
  }
}
</script>
