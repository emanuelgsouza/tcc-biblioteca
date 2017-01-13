import pouchdb from '../index'

export default function (filter, limit) {
  if (filter === 'notStudent') {
    return pouchdb.createIndex({
      index: { fields: ['counterExchange'] }
    }).then(function () {
      return pouchdb.find({
        selector: {
          table: 'notStudent',
          counterExchange: { $gt: 0 }
        },
        sort: [{ 'counterExchange': 'desc' }]
      }).then(function (data) {
        return data.docs
      })
    })
  } else {
    return pouchdb.createIndex({
      index: { fields: ['counterExchange'] }
    }).then(function () {
      return pouchdb.find({
        selector: {
          table: 'student',
          counterExchange: { $gt: 0 }
        },
        sort: [{ 'counterExchange': 'desc' }]
      }).then(function (data) {
        return data.docs
      })
    })
  }
}
