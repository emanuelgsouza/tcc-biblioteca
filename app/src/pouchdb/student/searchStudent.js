import pouchdb from '../index'

export default function (name) {
  return pouchdb.allDocs({
    include_docs: true,
    startkey: name,
    endkey: `${name}\uffff`
  }).then(function (response) {
    return response
  }).catch(function (err) {
    return err
  })
}
