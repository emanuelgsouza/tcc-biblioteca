import PouchDb from 'pouchdb-browser'
import PouchdbFind from 'pouchdb-find'

PouchDb.plugin(PouchdbFind)

const library = new PouchDb('library')

export default library
