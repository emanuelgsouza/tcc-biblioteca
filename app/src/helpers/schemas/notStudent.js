export default {
  type: 'object',
  properties: {
    nome: { type: 'string' },
    endereco: {
      type: 'string',
      optional: true
    },
    telefone1: {
      type: 'number',
      minLength: 8,
      maxLength: 9,
      optional: true
    },
    telefone2: {
      type: 'number',
      minLength: 8,
      maxLength: 9,
      optional: true
    }
  }
}
