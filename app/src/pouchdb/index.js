import PouchDb from 'pouchdb-browser'
import pouchdbFind from 'pouchdb-find'
import replicationStream from 'pouchdb-replication-stream'

PouchDb.plugin(pouchdbFind)
PouchDb.plugin(replicationStream.plugin)
PouchDb.adapter('writableStream', replicationStream.adapters.writableStream)

const library = new PouchDb('library')

export default library
