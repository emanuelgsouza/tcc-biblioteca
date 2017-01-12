<template>
  <div>
    <div class="content" v-if="!confirmReturned">
      <p> Dados do livro emprestado </p>
      <ul>
        <li v-for="(value, key) in bookReturned"> {{ key }} - {{ value }} </li>
      </ul>
      <p class="control">
        <input type="date" class="input is-medium" v-model="date">
      </p>
      <button
        class="button is-success is-medium"
        @click="returned"> Confirmar devolução </button>
    </div>

    <NotificationSearch
      v-if="confirmReturned"
      label="Devolução registrada com sucesso"
      state="is-success"
      @closeNotification="close"></NotificationSearch>
  </div>
</template>

<script>
import { exchangePeople, updateBook } from '../../../pouchdb/general'
import NotificationSearch from './NotificationSearch'

export default {
  props: ['people', 'book'],
  components: { NotificationSearch },
  data () {
    return { confirmReturned: false, date: '' }
  },
  computed: {
    bookReturned () {
      return Object.assign({}, {
        Titulo: this.book.titulo,
        Autor: this.book.autor,
        Editora: this.book.editora,
        Prateleira: this.book.prateleira,
        Estante: this.book.estante,
        Código: this.book.codigo,
        Estoque: this.book.estoque
      })
    }
  },
  methods: {
    returned () {
      if (this.date !== '') {
        const objRecord = {
          id: `${this.date}-${this.book._id}-${this.people}`,
          date: this.date,
          type: 'returned',
          idBook: this.book._id
        }
        this.people[1].push(objRecord)
        const records = this.people[1]
        const self = this
        exchangePeople(this.people[0], records, 'student').then(function (data) {
          if (data.ok) {
            updateBook(self.book._id).then(function (data) {
              if (data.ok) {
                self.confirmReturned = true
              }
            })
          }
        })
      }
    },
    close () {
      this.$emit('reload')
    }
  }
}
</script>
