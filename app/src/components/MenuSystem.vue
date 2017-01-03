<template>
<aside class="menu">
  <Logo></Logo>
  <ButtonClose @closeMenu="close"></ButtonClose>
  <hr>
  <ul class="menu-list">
    <li>
      <router-link to="/">
        <span class="icon"><i class="fa fa-home"></i></span> Home
      </router-link>
    </li>
  </ul>

  <ul class="menu-list">
    <li>
      <a
        :class="{ 'is-active' : currentMenu === 'aluno' }"
        @click="currentMenu = 'aluno'">
        <span class="icon"><i class="fa fa-graduation-cap"></i></span>
        Menu Aluno
      </a>
      <transition name="slide-fade">
        <ul v-if="currentMenu === 'aluno'">
          <li>
            <router-link to="/plus-student">
              <span class="icon"><i class="fa fa-plus"></i></span> Adicionar Aluno
            </router-link>
            <router-link to="/delete-student">
              <span class="icon"><i class="fa fa-times"></i></span> Excluir Aluno
            </router-link>
            <router-link to="/exchange-student">
              <span class="icon"><i class="fa fa-exchange"></i></span> Empréstimo ou Devolução
            </router-link>
          </li>
        </ul>
      </transition>
    </li>
  </ul>

  <ul class="menu-list">
    <li>
      <a
        :class="{ 'is-active' : currentMenu === 'naoAluno' }"
        @click="currentMenu = 'naoAluno'">
        <span class="icon"><i class="fa fa-user"></i></span>
        Menu Não Aluno
      </a>
      <transition name="slide-fade">
        <ul v-if="currentMenu === 'naoAluno'">
          <li>
            <router-link to="/plus-people">
              <span class="icon"><i class="fa fa-plus"></i></span> Adicionar Não Aluno
            </router-link>
            <router-link to="/delete-people">
              <span class="icon"><i class="fa fa-times"></i></span> Excluir Não Aluno
            </router-link>
            <router-link to="/exchange-people">
              <span class="icon"><i class="fa fa-exchange"></i></span> Empréstimo ou Devolução
            </router-link>
          </li>
        </ul>
      </transition>
    </li>
  </ul>

  <ul class="menu-list">
    <li>
      <a
        :class="{ 'is-active' : currentMenu === 'livro' }"
        @click="currentMenu = 'livro'">
        <span class="icon"><i class="fa fa-book"></i></span>
        Menu Livros
      </a>
      <transition name="slide-fade">
        <ul v-if="currentMenu === 'livro'">
          <li>
            <router-link to="/plus-book">
              <span class="icon"><i class="fa fa-plus"></i></span> Adicionar Livro
            </router-link>
            <router-link to="/delete-book">
              <span class="icon"><i class="fa fa-times"></i></span> Excluir Livro
            </router-link>
            <router-link to="/search-book">
              <span class="icon"><i class="fa fa-search"></i></span> Pesquisar Livro
            </router-link>
          </li>
        </ul>
      </transition>
    </li>
  </ul>

  <ul class="menu-list">
    <li>
      <a
        :class="{ 'is-active' : currentMenu === 'arqMorto' }"
        @click="currentMenu = 'arqMorto'">
        <span class="icon"><i class="fa fa-file"></i></span>
        Menu Arquivo Morto
      </a>
      <transition name="slide-fade">
        <ul v-if="currentMenu === 'arqMorto'">
          <li>
            <router-link to="/plus-arq-morto">
              <span class="icon"><i class="fa fa-plus"></i></span> Adicionar Arq Morto
            </router-link>
            <router-link to="/delete-arq-morto">
              <span class="icon"><i class="fa fa-times"></i></span> Excluir Arq Morto
            </router-link>
            <router-link to="/search-arq-morto">
              <span class="icon"><i class="fa fa-search"></i></span> Pesquisar Arq Morto
            </router-link>
          </li>
        </ul>
      </transition>
    </li>
  </ul>

  <ul class="menu-list">
    <li>
      <a
        :class="{ 'is-active' : currentMenu === 'listas' }"
        @click="currentMenu = 'listas'">
        <span class="icon"><i class="fa fa-list"></i></span>
        Menu Listas
      </a>
      <transition name="slide-fade">
        <ul v-show="currentMenu === 'listas'">
          <li>
            <router-link to="/list-defaulters">
              <span class="icon"><i class="fa fa-legal"></i></span> Inadimplentes
            </router-link>
            <router-link to="/list-readers">
              <span class="icon"><i class="fa fa-check"></i></span> Maiores Leitores
            </router-link>
            <router-link to="/list-books">
              <span class="icon"><i class="fa fa-bookmark"></i></span> Livros Mais Lidos
            </router-link>
            <router-link to="/list-class">
              <span class="icon"><i class="fa fa-window-maximize"></i></span> Alunos por Turma
            </router-link>
          </li>
        </ul>
      </transition>
    </li>
  </ul>

  <ul class="menu-list">
    <li>
      <a>
        <span class="icon"><i class="fa fa-info"></i></span> Sobre
      </a>
    </li>
  </ul>
</aside>
</template>

<script>
import Logo from './MenuSystem/Logo'
import ButtonClose from './MenuSystem/ButtonClose'

export default {
  name: 'menu-system',
  data () {
    return {
      currentMenu: null
    }
  },
  components: {
    Logo,
    ButtonClose
  },
  methods: {
    close () {
      this.$emit('closeMenu')
    }
  }
}
</script>

<style scoped>
  .menu {
    width: 20vw;
    height: 100vh;
    position: absolute;
    z-index: 6;
    background-color: #FFF;
  }

  .menu.is-active::before {
    content: "";
    position: absolute;
    left: 20vw;
    display: block;
    width: 80vw;
    height: 100vh;
    z-index: 0;
    background-color: rgba(0, 0, 0, .5);
  }

  .icon {
    margin-top: -3px;
    margin-right: 2px;
  }

  .slide-fade-enter-active {
  transition: all .3s ease;
  }
  .slide-fade-leave-active {
  transition: all .1s ease;
  }
  .slide-fade-enter, .slide-fade-leave-active {
  transform: translateX(-100%);
  opacity: 0;
  }
</style>
