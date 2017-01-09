import pouchdb from '../index'

export default function (arqMorto) {
  const { titulo, autor, editora, gaveta, livro, estoque } = arqMorto
  const _id = `${titulo}-${gaveta}-${livro}`
  const bookSchema = {
    table: 'arqMorto',
    _id,
    titulo,
    autor,
    editora,
    gaveta,
    livro,
    estoque
  }

  return pouchdb.put(bookSchema)
    .then(function (response) {
      return response
    })
    .catch(function (err) {
      return err
    })
}
