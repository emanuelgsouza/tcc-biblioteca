import pouchdb from '../index'

export default function (notStudent) {
  const { name, endereco, telefone1, telefone2 } = notStudent
  const id = `${name}-${telefone1}`
  const objNotStudent = {
    _id: id,
    table: 'notStudent',
    name: name,
    endereco: endereco,
    telefone1: telefone1,
    telefone2: telefone2,
    records: []
  }
  const result = pouchdb.put(objNotStudent)
    .then(function (response) {
      return response
    }).catch(function (err) {
      return err
    })

  // return objStudent
  return result
}
