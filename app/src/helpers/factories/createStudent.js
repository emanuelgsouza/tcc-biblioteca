import validation from '../validations'
import { isNameValid } from '../validates'
import { schemaStudent } from '../schemas'

export default function (nome, turma = 0) {
  if (!isNameValid(nome)) {
    // Case invalid nome
    return { err: true, msg: 'Digite um nome válido, somente letras e espaços' }
  }
  if (turma) {
    const student = { nome, turma }
    return validation(schemaStudent, student)
  } else {
    const student = { nome }
    return validation(schemaStudent, student)
  }
}
