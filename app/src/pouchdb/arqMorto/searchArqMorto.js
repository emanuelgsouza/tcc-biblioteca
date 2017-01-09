import pouchdb from '../index'

export default function (selective, valueSelective) {
  let selector
  if (selective === 'titulo') {
    selector = {
      titulo: {$regex: valueSelective},
      table: 'arqMorto'
    }
  } else {
    selector = {
      autor: {$regex: valueSelective},
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
