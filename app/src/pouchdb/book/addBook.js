import pouchdb from '../index'

export default function (book) {
  const { titulo, autor, editora, genero, escola, didatico, codigo, estante, prateleira, estoque } = book
  const _id = `${titulo}-${codigo}`
  const bookSchema = {
    table: 'book',
    _id,
    titulo,
    autor,
    editora,
    genero,
    escola,
    didatico,
    codigo,
    estante,
    prateleira,
    estoque,
    records: [],
    counterExchange: 0
  }

  return pouchdb.put(bookSchema)
    .then(function (response) {
      return response
    })
    .catch(function (err) {
      return err
    })
}
