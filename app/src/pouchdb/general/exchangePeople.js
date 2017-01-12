import pouchdb from '../index'

export default function (id, records, type) {
  if (type === 'student') {
    return pouchdb.get(id)
      .then(function (doc) {
        return pouchdb.put({
          _id: id,
          _rev: doc._rev,
          name: doc.name,
          turma: doc.turma,
          table: 'student',
          records
        })
      }).then(function (response) {
        return response
      }).catch(function (err) {
        return err
      })
  }
}
