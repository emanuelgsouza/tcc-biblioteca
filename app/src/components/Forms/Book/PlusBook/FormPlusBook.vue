<template>
  <div>
    <form>
      <InputText
        label="Digite o título do livro"
        placeholder="Título"
        @sendData="title = arguments[0]"></InputText>
      <InputName
        label="Digite o nome do autor"
        placeholder="Autor"
        @sendData="author = arguments[0]"></InputName>
      <InputText
        label="Digite o nome da editora"
        placeholder="Editora"
        @sendData="editora = arguments[0]"></InputText>
      <SelectBook
        label="Genero Literário"
        :dados="dadosGenre"
        @sendData="genero = arguments[0]"></SelectBook>
      <SelectBook
        label="Escola Literária"
        :dados="dadosSchool"
        @sendData="escola = arguments[0]"></SelectBook>
      <SelectBook
        label="Categoria Didatica"
        :dados="dadosDidatic"
        @sendData="didatico = arguments[0]"></SelectBook>
      <InputNumber
        label="Digite o código do livro"
        placeholder="Código"
        min="0"
        @sendData="codigo = arguments[0]"></InputNumber>
      <InputText
        label="Digite a letra da estante"
        placeholder="Estante"
        @sendData="estante = arguments[0]"></InputText>
      <InputNumber
        label="Digite o número da prateleira"
        placeholder="Prateleira"
        min="0"
        @sendData="prateleira = arguments[0]"></InputNumber>
      <InputNumber
        label="Digite o estoque"
        placeholder="Estoque"
        min="0"
        @sendData="estoque = arguments[0]"></InputNumber>
      <hr>
      <ButtonsFooter @confirm="confirmar"></ButtonsFooter>
    </form>
  </div>
</template>

<script>
import { isNameValid, isNumberValid } from '../../../../helpers/validates'
import { genre, didatic, schools } from '../../../../helpers/Objects'
import { createBook } from '../../../../helpers/factories'
import InputText from '../../formComponents/InputText'
import InputName from '../../formComponents/InputName'
import InputNumber from '../../formComponents/InputNumber'
import SelectBook from '../../formComponents/SelectBook'
import ButtonsFooter from '../../formComponents/ButtonsFooter'

export default {
  components: { InputText, InputName, InputNumber, SelectBook, ButtonsFooter },
  data () {
    return {
      title: '',
      author: '',
      editora: '',
      didatico: '',
      escola: '',
      genero: '',
      codigo: '',
      prateleira: '',
      estante: '',
      estoque: '',
      dadosGenre: genre,
      dadosSchool: schools,
      dadosDidatic: didatic
    }
  },
  methods: {
    confirmar () {
      const array = []
      array.push(this.title.length > 0)
      array.push(isNameValid(this.author))
      array.push(this.editora.length > 0)
      array.push(!(isNumberValid(this.codigo).err))
      array.push(isNameValid(this.estante))
      array.push(!isNumberValid(this.prateleira).err)
      array.push(!isNumberValid(this.estoque).err)
      const valid = array.every(item => item === true)
      if (valid) {
        const dados = {
          Titulo: this.title,
          Autor: this.author,
          Editora: this.editora,
          Genero: this.genero,
          Escola: this.escola,
          Didatico: this.didatico,
          Codigo: this.codigo,
          Prateleira: this.prateleira,
          Estante: this.estante,
          Estoque: this.estoque
        }
        const isBookValid = createBook(this.title, this.author, this.editora, this.genero, this.escola, this.didatico, this.codigo, this.estante, this.prateleira, this.estoque)
        if (isBookValid.valid) {
          this.$emit('confirm', 'positive', dados)
        } else {
          this.$emit('confirm', 'negative')
        }
      }
    }
  }
}
</script>
