import pouchdb from '../index'

export default function (idBook) {
  return pouchdb.get(idBook).then(function (doc) {
    return doc
  })
}
