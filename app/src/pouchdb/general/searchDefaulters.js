import pouchdb from '../index'

export default function (filter, limit) {
  if (filter === 'notStudent') {
    return pouchdb.createIndex({
      index: { fields: ['name', 'counterNotReturned'] }
    }).then(function () {
      return pouchdb.find({
        selector: {
          table: 'notStudent',
          counterNotReturned: { $eq: 1 }
        }
      }).then(function (data) {
        return data.docs
      })
    })
  } else {
    return pouchdb.createIndex({
      index: { fields: ['name', 'counterNotReturned'] }
    }).then(function () {
      return pouchdb.find({
        selector: {
          table: 'student',
          counterNotReturned: { $eq: 1 }
        }
      }).then(function (data) {
        return data.docs
      })
    })
  }
}
