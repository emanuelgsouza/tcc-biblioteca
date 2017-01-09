import pouchdb from '../index'

export default function (name) {
  return pouchdb.createIndex({
    index: { fields: ['name', 'table'] }
  }).then(function () {
    return pouchdb.find({
      selector: {
        name: {$regex: name},
        table: 'notStudent'
      }
    })
  }).then(function (response) {
    return response.docs
  }).catch(function (err) {
    return err
  })
}
