import { schemaBook } from '../schemas'
import validate from '../validations'

export default function (titulo, autor, editora, genero, escola, didatico, codigo, estante, prateleira, estoque) {
  const book = { titulo, autor, editora, genero, escola, didatico, codigo, estante, prateleira, estoque }
  return validate(schemaBook, book)
}
