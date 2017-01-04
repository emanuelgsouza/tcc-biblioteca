export default {
  type: 'object',
  properties: {
    nome: { type: 'string' },
    turma: {
      type: 'integer',
      optional: true,
      gte: 901,
      error: 'Digite uma turma válida, maior de 901'
    }
  }
}
