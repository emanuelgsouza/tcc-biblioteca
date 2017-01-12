import pouchdb from '../index'

export default function (nome) {
  return pouchdb.createIndex({
    index: { fields: ['name', 'table'] }
  }).then(function () {
    return pouchdb.find({
      selector: {
        name: {$regex: nome},
        table: 'student'
      }
    }).then(function (response) {
      return response.docs
    })
  })
}
