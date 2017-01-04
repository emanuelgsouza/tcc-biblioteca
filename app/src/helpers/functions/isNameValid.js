import { isAlpha } from 'validator'

export default function (str) {
  if (!(typeof str === 'string')) return false
  const array = str.split(' ')
  const arrayIsValid = array.every(item => isAlpha(item))
  if (!arrayIsValid) return false
  const resultArray = array.some(item => item.includes(' '))
  if (!resultArray) return true
  return false
}
