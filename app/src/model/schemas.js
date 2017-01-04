// File of schemas based on schema-inspector plugin

// Doc of plugin: https://github.com/Atinux/schema-inspector

export const schemaStudent = {
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
