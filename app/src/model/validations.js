// File of validations based on schema-inspector plugin

// Doc of plugin: https://github.com/Atinux/schema-inspector

import inspector from 'schema-inspector'

export const validationStudent = (obj, schema) => inspector.validate(schema, obj)
