<template>
  <div>
    <form>
      <InputName
        label="Digite o nome do aluno"
        placeholder="Nome"
        @sendData="captureName"></InputName>
      <InputClass
        label="Digite a turma do aluno"
        placeholder="Turma"
        @sendData="captureClass"></InputClass>
      <hr>
      <ButtonsFooter @confirm="confirmar"></ButtonsFooter>
    </form>
  </div>
</template>

<script>
import { createPeople } from '../../../../helpers/factories'
import InputName from '../../formComponents/InputName'
import InputClass from '../../formComponents/InputClass'
import ButtonsFooter from '../../formComponents/ButtonsFooter'

export default {
  components: { InputName, InputClass, ButtonsFooter },
  data () {
    return {
      name: '',
      turma: '',
      disabled: false,
      dados: {}
    }
  },
  methods: {
    confirmar () {
      const valid = createPeople('student', this.name, this.turma)
      if (valid.valid && this.turma) {
        const estadoNotification = 'positive'
        const dados = { Name: this.name, Turma: this.turma }
        this.$emit('result', dados, estadoNotification, true)
      } else {
        this.$emit('result')
      }
    },
    captureName () {
      const value = arguments[0]
      this.name = value
    },
    captureClass () {
      const value = arguments[0]
      this.turma = value
    }
  }
}
</script>
