import validation from '../validations'
import { isNameValid } from '../validates'
import { schemaNotStudent } from '../schemas'

export default function (nome, endereco = null, telefone1, telefone2) {
  if (!isNameValid(nome)) {
    // Case invalid nome
    return { err: true, msg: 'Digite um nome válido, somente letras e espaços' }
  }
  if (!endereco) {
    const notStudent = { nome }
    return validation(schemaNotStudent, notStudent)
  } else {
    const notStudent = { nome, endereco, telefone1, telefone2 }
    return validation(schemaNotStudent, notStudent)
  }
}
