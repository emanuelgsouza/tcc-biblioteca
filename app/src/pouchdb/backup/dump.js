import pouchdb from '../index'

const fs = require('fs')

export default function (fileName) {
  const ws = fs.createWriteStream(fileName)
  return pouchdb.dump(ws)
    .then(res => res)
    .catch(err => err)
}
