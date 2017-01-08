import pouchdb from '../index'

export default function (selective, valueSelective) {
  if (selective === 'titulo') var selector = {titulo: {$regex: valueSelective}}
  return pouchdb.createIndex({
    index: { fields: [`${selective}`] }
  }).then(function () {
    return pouchdb.find({
      selector: selector
    })
  }).then(function (response) {
    return response.docs
  })
}
