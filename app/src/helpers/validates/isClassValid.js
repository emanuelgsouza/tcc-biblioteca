export default function (turma) {
  if (!(typeof turma === 'number')) return false
  if (turma < 901) return false
  return true
}
