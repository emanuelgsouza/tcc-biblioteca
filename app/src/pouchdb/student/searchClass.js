import pouchdb from '../index'

export default function (turma) {
  return pouchdb.createIndex({
    index: { fields: ['turma'] }
  }).then(function () {
    return pouchdb.find({
      selector: { turma }
    }).then(function (response) {
      return response.docs
    })
  })
}
