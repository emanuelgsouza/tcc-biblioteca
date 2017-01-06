<template>
  <div>
    <label for="" class="label"> {{ label }} </label>
    <p class="control">
      <span class="select is-medium is-fullwidth">
        <select v-model="value">
          <option
            v-for="option in dados"
            :value="option.value">
            {{ option.text }}
          </option>
        </select>
      </span>
    </p>
  </div>
</template>

<script>
export default {
  props: ['label', 'dados'],
  data () {
    return {
      value: 'n'
    }
  },
  watch: {
    value () {
      this.$emit('sendData', this.value)
    }
  },
  mounted () {
    this.$emit('sendData', this.value)
  }
}
</script>
