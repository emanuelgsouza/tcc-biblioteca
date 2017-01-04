// File of functions that will use in entire project
import { isAlpha } from 'validator'
import { schemaStudent } from './schemas'
import { validationStudent } from './validations'

const isNameValid = (str) => isAlpha(str, 'pt-BR')

const createStudent = function (nome, turma = 0) {
  if (turma) {
    const student = { nome, turma }
    return console.log(validationStudent(schemaStudent, student))
  } else {
    const student = { nome }
    return console.log(validationStudent(schemaStudent, student))
  }
}

const createNotStudent = function () {}

export const createPeople = function (nome, type, turma, endereco, telefone1, telefone2) {
  if (!isNameValid(nome)) {
    // Case invalid nome
    return { err: true, msg: 'Digite um nome válido, somente letras e espaços' }
  }

  // Case type is student
  if (type === 'student') return createStudent(nome, turma)

  // Case type is not student
  if (type === 'notStudent') return createNotStudent(nome, endereco, telefone1, telefone2)
}
