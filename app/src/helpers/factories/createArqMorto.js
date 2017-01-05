import { isNameValid } from '../validates'
import { schemaArqMorto } from '../schemas'
import validator from '../validations'

export default function (title, author, editora, gaveta, livro, estoque) {
  if (!isNameValid(author)) return { err: true, msg: 'Nome de autor inválido' }
  const arqMorto = { title, author, editora, gaveta, livro, estoque }
  return validator(schemaArqMorto, arqMorto)
}
