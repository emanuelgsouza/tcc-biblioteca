export default function (number) {
  if (typeof number !== 'number') return { err: true }
  if (number < 0) return { err: true, msg: 'Número inválido! Número negativa' }
  return { err: false }
}
