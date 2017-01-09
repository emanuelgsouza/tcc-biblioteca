<template>
  <div>
    <form>
      <InputText
        label="Digite o nome do livro"
        placeholder="Título"
        @sendData="title = arguments[0]">
      </InputText>
      <InputName
        label="Digite o nome do autor"
        placeholder="Autor"
        @sendData="author = arguments[0]">
      </InputName>
      <InputText
        label="Digite o nome da editora"
        placeholder="Editora"
        @sendData="editora = arguments[0]">
      </InputText>
      <InputNumber
        label="Digite o número da gaveta"
        placeholder="Gaveta"
        @sendData="gaveta = arguments[0]">
      </InputNumber>
      <InputNumber
        label="Digite o número do livro"
        placeholder="Livro"
        @sendData="book = arguments[0]">
      </InputNumber>
      <InputNumber
        label="Digite o estoque"
        placeholder="Estoque"
        @sendData="estoque = arguments[0]">
      </InputNumber>
      <hr>
      <ButtonsFooter @confirm="confirmar"></ButtonsFooter>
    </form>
  </div>
</template>

<script>
import { createArqMorto } from '../../../../helpers/factories'
import InputName from '../../formComponents/InputName'
import InputText from '../../formComponents/InputText'
import InputNumber from '../../formComponents/InputNumber'
import ButtonsFooter from '../../formComponents/ButtonsFooter'

export default {
  components: { InputName, InputText, InputNumber, ButtonsFooter },
  data () {
    return {
      title: '',
      author: '',
      editora: '',
      estoque: '',
      gaveta: '',
      book: ''
    }
  },
  methods: {
    confirmar () {
      const valid = createArqMorto(this.title, this.author, this.editora, this.gaveta, this.book, this.estoque)
      if (valid.valid) {
        const estadoNotification = 'positive'
        const dados = {
          titulo: this.title,
          autor: this.author,
          editora: this.editora,
          gaveta: this.gaveta,
          livro: this.book,
          estoque: this.estoque
        }
        this.$emit('result', true, dados, estadoNotification)
      } else {
        this.$emit('result')
      }
    }
  }
}
</script>
