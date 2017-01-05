import validation from '../validations'
import { schemaNotStudent } from '../schemas'

export default function (nome, endereco = null, telefone1, telefone2) {
  if (endereco) {
    const notStudent = { nome }
    return validation(schemaNotStudent, notStudent)
  } else {
    const notStudent = { nome, endereco, telefone1, telefone2 }
    return validation(schemaNotStudent, notStudent)
  }
}
