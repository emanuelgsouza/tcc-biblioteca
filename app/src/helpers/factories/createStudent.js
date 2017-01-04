import validation from '../validations'
import { schemaStudent } from '../schemas'

export default function (nome, turma = 0) {
  if (turma) {
    const student = { nome, turma }
    return validation(schemaStudent, student)
  } else {
    const student = { nome }
    return validation(schemaStudent, student)
  }
}
