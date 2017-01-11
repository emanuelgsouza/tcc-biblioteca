import { genre } from '../Objects'

export default function (value) {
  const result = genre.filter(item => item.value.toUpperCase() === value)
  return result[0].text
}
