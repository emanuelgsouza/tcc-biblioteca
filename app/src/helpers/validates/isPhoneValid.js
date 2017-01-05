export default function (phone) {
  const phoneString = phone.toString()
  if (typeof phone !== 'number') return 'Espera-se number, não string'
  if (phoneString.length < 8) {
    return {
      err: true,
      msg: 'Número de telefone inválido! Número de telefone menor que 8 dígitos'
    }
  }
  if (phoneString.length > 9) {
    return {
      err: true,
      msg: 'Número de telefone inválido! Número de telefone maior que 9 dígitos'
    }
  }
  const phoneRegExp = /^9/
  if (phoneString.length === 9) {
    const testNumber = phoneRegExp.test(phone)
    if (testNumber) return { err: false }
    return {
      err: true,
      msg: 'Número de telefone inválido! Número de telefone com 9 dígitos, espera-se começar com dígito 9'
    }
  }
  return { err: false }
}
