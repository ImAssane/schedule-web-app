<!-- This Component is Reuzable for Text , Contact and Email Input -->
<template>
  <div>
    <div class="flex justify-between">
      <label :for="id" class="block text-sm font-medium text-gray-700">{{ label }}</label>
      <span v-if="optional" class="text-xs text-gray-400" id="email-optional">Opcional</span>
    </div>

    <div :class="{ 'relative': type == 'email' || type == 'password' , 'flex': type == 'tel' }" class="mt-1 rounded-md ">

      <span v-if=" type == 'tel' " class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">+258</span>
      
      <div v-if=" type == 'email' || type == 'password' " class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">

        <EnvelopeIcon v-if=" type == 'email'" class="h-5 w-5 text-gray-400" aria-hidden="true" />

        <LockClosedIcon v-else class="h-5 w-5 text-gray-400" aria-hidden="true" />
      </div>

      <input :id="id" ref="input" class="block w-full sm:text-sm " 
      :class="{
          'min-w-0 flex-1 rounded-none rounded-r-md px-3 py-2':type == 'tel',
          'rounded-md': type != 'tel' , 
          'pl-10' : type == 'email' || type == 'password',
          'pl-10' : type == 'email' || type == 'password',
          'border-blue-300 shadow-sm focus:border-blue-700 focus:ring-blue-500': error,
          'border-gray-300 shadow-sm focus:border-gray-700 focus:ring-gray-500': !error,
          'bg-gray-50': disabled,

      }" 
      :type="type" :value="modelValue" :disabled="disabled" :placeholder="placeholder" @input="$emit('update:modelValue', $event.target.value)" />

    </div>
    
    <div v-if="error" class="mt-2 text-xs text-blue-600">{{ error }}</div>
  </div>
</template>

<script>
import { v4 as uuid } from 'uuid'
import { EnvelopeIcon } from '@heroicons/vue/20/solid'
import { LockClosedIcon } from '@heroicons/vue/20/solid'


export default {
  inheritAttrs: false,
  components: {EnvelopeIcon,LockClosedIcon},
  props: {
    id: {
      type: String,
      default() {
        return `TextInput-${uuid()}`
      },
    },
    type: {
      type: String,
      default: 'text',
    },
    error: String,
    disabled: Boolean,
    placeholder: String,
    label: String,
    optional:Boolean,
    modelValue: String,
  },
  emits: ['update:modelValue'],
}
</script>
