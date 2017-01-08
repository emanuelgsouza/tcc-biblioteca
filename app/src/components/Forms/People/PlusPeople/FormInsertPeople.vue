<template>
  <div>
    <form>
      <InputName
        label="Digite o nome do não estudante"
        placeholder="Nome"
        @sendData="captureName"></InputName>
      <InputText
        placeholder="Rua Dom Quixote, LT 01, QD 16 - La Mancha"
        label="Digite o endereço"
        @sendData="captureEnd"></InputText>
      <InputPhone
        label="Digite um número de telefone"
        placeholder="Telefone 1"
        @sendData="capturePhone1"></InputPhone>
      <InputPhone
        label="Digite um outro número de telefone"
        placeholder="Telefone 2"
        @sendData="capturePhone2"></InputPhone>
      <hr>
      <ButtonsFooter @confirm="confirmar"></ButtonsFooter>
    </form>
  </div>
</template>

<script>
import { createNotStudent } from '../../../../helpers/factories'
import InputName from '../../formComponents/InputName'
import InputText from '../../formComponents/InputText'
import InputPhone from '../../formComponents/InputPhone'
import ButtonsFooter from '../../formComponents/ButtonsFooter'

export default {
  components: { InputName, InputText, InputPhone, ButtonsFooter },
  data () {
    return {
      name: '',
      endereco: '',
      telefone1: '',
      telefone2: ''
    }
  },
  methods: {
    captureName () {
      this.name = arguments[0]
    },
    captureEnd () {
      this.endereco = arguments[0]
    },
    capturePhone1 () {
      this.telefone1 = arguments[0]
    },
    capturePhone2 () {
      this.telefone2 = arguments[0]
    },
    confirmar () {
      const valid = createNotStudent(this.name, this.endereco, this.telefone1, this.telefone2)
      if (valid.valid) {
        const estadoNotification = 'positive'
        const dados = {
          name: this.name,
          endereco: this.endereco,
          telefone1: this.telefone1,
          telefone2: this.telefone2
        }
        this.$emit('result', dados, estadoNotification, true)
      } else {
        this.$emit('result')
      }
    }
  }
}
</script>
