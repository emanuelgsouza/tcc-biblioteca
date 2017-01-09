import pouchdb from '../index'

export default function (selective, valueSelective) {
  if (selective === 'titulo') {
    var selector = {
      titulo: {$regex: valueSelective},
      table: 'arqMorto'
    }
  }
  return pouchdb.createIndex({
    index: {fields: ['titulo', 'table']}
  }).then(function () {
    return pouchdb.find({
      selector: selector
    }).then(function (response) {
      return response.docs
    })
  })
}
