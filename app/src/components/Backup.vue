<template>
  <div>
    <Hero title="Backup do Sistema"></Hero>
    <section class="section">
      <div class="container">
        <h1 class="title has-text-centered"> Fazer backup dos dados </h1>
      </div>
      <hr>
      <div class="content">
        <p> É necessário fazer um backup do banco regularmente. Segue as regras para fazer o backup: </p>
        <ul>
          <li> Escolha um nome para o arquivo; </li>
          <li> Escolha a data do backup; </li>
        </ul>
        <p> Depois que clicar em confirmar backup, o arquivo .txt com os dados estará em nomedoarquivo-data.txt na raiz do programa, na pasta principal dele. </p>
      </div>
      <hr>
      <div class="content">
        <p> Para carregar um backup para o banco, clique em 'Selecionar Arquivo' e selecione um arquivo da pasta backup e depois clique em confirmar  </p>
      </div>
      <hr>
      <div class="columns">
        <button class="button is-info is-medium is-fullwidth" @click="current = 'create'"> Criar Backup </button>
        <button class="button is-info is-medium is-fullwidth" @click="current = 'load'"> Carregar Backup </button>
      </div>
      <hr>
      <transition name="fade">
        <CriarBackup
          @cancelBackup="current = null"
          v-if="current === 'create'"
          @funfou="wasFunfou"></CriarBackup>
      </transition>

      <transition name="fade">
        <CarregarBackup
          @cancelLoad="current = null"
          v-if="current === 'load'"
          @funfou="wasFunfou"></CarregarBackup>
      </transition>

      <hr v-if="notifications">
      <div
        class="notification"
        :class="notificationsClass"
        v-if="notifications">
        <button class="delete" @click="reload"></button>
        {{ label }}
      </div>
    </section>
  </div>
</template>

<script>
import Hero from './Hero/Main'
import CriarBackup from './Backup/CriarBackup'
import CarregarBackup from './Backup/CarregarBackup'

export default {
  name: 'Backup',
  components: { Hero, CriarBackup, CarregarBackup },
  data () {
    return {
      current: null,
      notifications: false,
      notificationsClass: '',
      label: ''
    }
  },
  methods: {
    reload () { window.location.reload() },
    wasFunfou () {
      if (this.current === 'create') {
        this.notifications = true
        if (arguments[0]) {
          this.notificationsClass = 'is-success'
          this.label = 'Backup criado com sucesso'
        } else {
          this.notificationsClass = 'is-danger'
          this.label = 'O Backup não foi criado, contate o criador do sistema'
        }
      } else {
        this.notifications = true
        if (arguments[0]) {
          this.notificationsClass = 'is-success'
          this.label = 'O arquivo foi carregado com sucesso'
        } else {
          this.notificationsClass = 'is-danger'
          this.label = 'O arquivo não foi carregado, contate o criador do sistema'
        }
      }
    }
  }
}
</script>

<style scoped>
.button.is-info { margin: .2em}

.fade-enter-active, .fade-leave-active {
  transition: opacity .5s
}
.fade-enter, .fade-leave-to {
  opacity: 0
}
</style>
