import pouchdb from '../index'

export default function (student) {
  const { name, turma } = student
  const id = `${name}-${turma}`
  const objStudent = {
    _id: id,
    table: 'student',
    name: name,
    turma: turma,
    records: []
  }
  const result = pouchdb.put(objStudent)
    .then(function (response) {
      return response
    }).catch(function (err) {
      return err
    })

  // return objStudent
  return result
}
