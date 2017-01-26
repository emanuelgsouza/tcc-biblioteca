import pouchdb from '../index'

const fs = require('fs')

export default function (fileName) {
  const rs = fs.createReadStream(fileName)
  return pouchdb.load(rs)
    .then(res => res)
    .catch(err => err)
}
