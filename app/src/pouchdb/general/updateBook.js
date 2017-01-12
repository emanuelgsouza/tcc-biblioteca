import pouchdb from '../index'

export default function (idBook, paramEstoque) {
  if (paramEstoque === 'plus') {
    return pouchdb.get(idBook)
      .then(function (doc) {
        return pouchdb.put({
          table: 'book',
          _id: doc._id,
          _rev: doc._rev,
          titulo: doc.titulo,
          autor: doc.autor,
          editora: doc.editora,
          genero: doc.genero,
          escola: doc.escola,
          didatico: doc.didatico,
          codigo: doc.codigo,
          estante: doc.estante,
          prateleira: doc.prateleira,
          estoque: doc.estoque - 1,
          counterExchange: doc.counterExchange + 1
        })
      }).then(function (response) {
        return response
      }).catch(function (err) {
        return err
      })
  } else {
    return pouchdb.get(idBook)
      .then(function (doc) {
        return pouchdb.put({
          table: 'book',
          _id: idBook,
          _rev: doc._rev,
          titulo: doc.titulo,
          autor: doc.autor,
          editora: doc.editora,
          genero: doc.genero,
          escola: doc.escola,
          didatico: doc.didatico,
          codigo: doc.codigo,
          estante: doc.estante,
          prateleira: doc.prateleira,
          estoque: doc.estoque + 1
        })
      }).then(function (response) {
        return response
      }).catch(function (err) {
        return err
      })
  }
}
