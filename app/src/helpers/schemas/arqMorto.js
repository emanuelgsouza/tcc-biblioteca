export default {
  type: 'object',
  properties: {
    title: { type: 'string' },
    author: { type: 'string', optional: true },
    editora: { type: 'string', optional: true },
    gaveta: { type: 'number', optional: true, minLength: 0 },
    livro: { type: 'number', optional: true, minLength: 0 },
    estoque: { type: 'number', optional: true, minLength: 0 }
  }
}
