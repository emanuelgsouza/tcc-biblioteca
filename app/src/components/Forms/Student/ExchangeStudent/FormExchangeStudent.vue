<template>
  <div>
    <form>
      <InputName
        label="Digite o nome do aluno para pesquisa"
        placeholder="Nome"
        @sendData="captureName"
      ></InputName>
      <hr>
      <ButtonsFooter @confirm="confirmar"></ButtonsFooter>
    </form>
  </div>
</template>

<script>
import { createStudent } from '../../../../helpers/factories'
import InputName from '../../formComponents/InputName'
import ButtonsFooter from '../../formComponents/ButtonsFooter'

export default {
  components: { InputName, ButtonsFooter },
  data () {
    return {
      name: ''
    }
  },
  methods: {
    captureName () {
      const name = arguments[0]
      this.name = name
    },
    confirmar () {
      const valid = createStudent(this.name)
      if (valid.valid) {
        this.$emit('search', true, this.name)
      } else {
        this.$emit('search', false)
      }
    }
  }
}
</script>
