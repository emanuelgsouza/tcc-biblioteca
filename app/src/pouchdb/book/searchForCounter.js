import pouchdb from '../index'

export default function (limit) {
  return pouchdb.createIndex({
    index: { fields: ['counterExchange', 'table'] }
  }).then(function () {
    return pouchdb.find({
      selector: {
        table: 'book',
        counterExchange: { $gt: 0 }
      },
      limit,
      sort: [{'counterExchange': 'desc'}]
    }).then(function (data) {
      return data.docs
    })
  })
}
