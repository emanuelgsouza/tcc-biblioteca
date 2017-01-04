// File of validations based on schema-inspector plugin

// Doc of plugin: https://github.com/Atinux/schema-inspector

import { validate } from 'schema-inspector'

export default (schema, obj) => validate(schema, obj)
