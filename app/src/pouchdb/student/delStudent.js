import pouchdb from '../index'

export default function (_id, _rev) {
  return pouchdb.remove(_id, _rev)
}
