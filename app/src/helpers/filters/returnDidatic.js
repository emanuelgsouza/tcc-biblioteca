import { didatic } from '../Objects'

export default function (value) {
  const result = didatic.filter(item => item.value.toUpperCase() === value)
  return result[0].text
}
