<template>
    <div>
      <label v-if="label" class="block text-sm font-medium text-gray-700" :for="id">{{ label }}</label>
      <select  :id="id" ref="input" v-model="selected" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-700 focus:ring-gray-500 sm:text-sm" v-bind:class="class2" :class="{ error: error}" :multiple="multiple">
       <!--  <option value="null"> sdsdddf</option>  -->
        <slot />
      </select>
      <div v-if="error" class="mt-2 text-xs text-blue-600">{{ error }}</div>
    </div>
  </template>
  
  <script>
  import { v4 as uuid } from 'uuid'
  
  export default {
    inheritAttrs: false,
    props: {
      id: {
        type: String,
        default() {
          return `SelectInput-${uuid()}`
        },
      },
      error: String,
      label: String,
      class2: {
        type: String,
        require: false,
      },
      multiple: {
        type: Boolean,
        default: false,
      } ,
      modelValue: [String, Number, Boolean, Array],
    },
    emits: ['update:modelValue'],
    data() {
      return {
        selected: this.modelValue,
      }
    },
    watch: {
      selected(selected) {
        this.$emit('update:modelValue', selected)
      },
    },
    methods: {
      focus() {
        this.$refs.input.focus()
      },
      select() {
        this.$refs.input.select()
      },
    },
  }
  </script>
  