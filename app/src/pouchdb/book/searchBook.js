import pouchdb from '../index'

export default function (selective, valueSelective) {
  var selector
  if (selective === 'titulo') {
    selector = {
      table: 'book',
      titulo: {$regex: valueSelective}
    }
  }
  if (selective === 'autor') {
    selector = {
      table: 'book',
      autor: {$regex: valueSelective}
    }
  }
  if (selective === 'escola') {
    selector = {
      table: 'book',
      escola: {$eq: valueSelective}
    }
  }
  if (selective === 'literario') {
    selector = {
      table: 'book',
      genero: {$eq: valueSelective}
    }
  }
  if (selective === 'didatico') {
    selector = {
      table: 'book',
      didatico: {$eq: valueSelective}
    }
  }
  return pouchdb.createIndex({
    index: { fields: [`${selective}`] }
  }).then(function () {
    return pouchdb.find({
      selector: selector
    })
    .then(function (response) {
      return response.docs
    })
  })
}
