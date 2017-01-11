import { schools } from '../Objects'

export default function (value) {
  const result = schools.filter(item => item.value.toUpperCase() === value)
  return result[0].text
}
