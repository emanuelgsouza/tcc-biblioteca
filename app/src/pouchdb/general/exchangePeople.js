import pouchdb from '../index'

export default function (id, records, type, returned) {
  var counterNotReturned, counterExchange
  if (type === 'student') {
    return pouchdb.get(id)
      .then(function (doc) {
        if (returned) {
          counterNotReturned = 0
          counterExchange = doc.counterExchange
        } else {
          counterExchange = doc.counterExchange + 1
          counterNotReturned = 1
        }
        return pouchdb.put({
          _id: id,
          _rev: doc._rev,
          name: doc.name,
          turma: doc.turma,
          table: 'student',
          records,
          counterExchange,
          counterNotReturned
        })
      }).then(function (response) {
        return response
      }).catch(function (err) {
        return err
      })
  } else {
    return pouchdb.get(id)
      .then(function (doc) {
        if (returned) {
          counterNotReturned = 0
          counterExchange = doc.counterExchange
        } else {
          counterExchange = doc.counterExchange + 1
          counterNotReturned = 1
        }
        return pouchdb.put({
          _id: id,
          _rev: doc._rev,
          name: doc.name,
          endereco: doc.endereco,
          telefone1: doc.telefone1,
          telefone2: doc.telefone2,
          table: 'notStudent',
          records,
          counterExchange,
          counterNotReturned
        })
      }).then(function (response) {
        return response
      }).catch(function (err) {
        return err
      })
  }
}
