import { isNameValid } from '../validates'
import createStudent from './createStudent'
import createNotStudent from './createNotStudent'

export default function (type, nome, turma, endereco, telefone1, telefone2) {
  if (!isNameValid(nome)) {
    // Case invalid nome
    return { err: true, msg: 'Digite um nome válido, somente letras e espaços' }
  }

  // Case type is student
  if (type === 'student') return createStudent(nome, turma)

  // Case type is not student
  if (type === 'notStudent') return createNotStudent(nome, endereco, telefone1, telefone2)
}
