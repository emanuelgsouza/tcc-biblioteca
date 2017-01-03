<template>
  <div>
    <form>
      <label for="" class="label"> Digite o nome da pessoa </label>
      <div class="control has-icon has-icon-right">
        <input
          type="text"
          class="input is-medium is-expanded"
          :class="classNameHelp"
          placeholder="Nome"
          required
          autofocus
          v-model="name">
          <i class="fa" :class="{ 'fa-check' : classNameHelp === 'is-success' }"></i>
          <span class="help" :class="classNameHelp"> {{ nameHelp }} </span>
      </div>
      <label for="" class="label"> Digite o endereço </label>
      <div class="control has-icon has-icon-right">
        <input
          type="text"
          class="input is-medium is-expanded"
          :class="classTurmaHelp"
          placeholder="Rua Dom Quixote, LT 01, QD 16 - La Mancha"
          min="901"
          required
          v-model="endereco">
          <i class="fa" :class="{ 'fa-check' : classTurmaHelp === 'is-success' }"></i>
          <span class="help" :class="classTurmaHelp"> {{ turmaHelp }} </span>
      </div>
      <label for="" class="label"> Digite o número de telefone </label>
      <div class="control has-icon has-icon-right">
        <input
          type="phone"
          class="input is-medium is-expanded"
          :class="classTurmaHelp"
          placeholder="Telefone 1"
          min="901"
          required
          v-model="telefone1">
          <i class="fa" :class="{ 'fa-check' : classTurmaHelp === 'is-success' }"></i>
          <span class="help" :class="classTurmaHelp"> {{ turmaHelp }} </span>
      </div>
      <label for="" class="label"> Digite o um outro número de telefone </label>
      <div class="control has-icon has-icon-right">
        <input
          type="phone"
          class="input is-medium is-expanded"
          :class="classTurmaHelp"
          placeholder="Telefone 2"
          min="901"
          required
          v-model="telefone2">
          <i class="fa" :class="{ 'fa-check' : classTurmaHelp === 'is-success' }"></i>
          <span class="help" :class="classTurmaHelp"> {{ turmaHelp }} </span>
      <hr>
      <div class="columns">
        <div class="column is-6">
          <button
            class="button is-success is-medium is-fullwidth"
            type="button">
            Confirmar
          </button>
        </div>
        <div class="column is-6">
          <input
            class="button is-danger is-medium is-fullwidth"
            type="reset"
            value="Cancelar">
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data () {
    return {
      formIsValid: [false, false],
      name: '',
      endereco: '',
      nameHelp: '',
      classNameHelp: '',
      classTurmaHelp: '',
      turmaHelp: '',
      telefone1: '',
      telefone2: ''
    }
  }
}
</script>
