<template>
  <div>
    <label  class="block text-sm font-medium text-gray-700"> Imagem </label>

    <div class="flex items-center justify-between py-2 pl-4 pr-5 mt-1 text-sm leading-6 rounded-md border border-gray-200">
      
      <input ref="file" type="file" accept="image/*" class="hidden" @change="change" />

      <div class="flex w-0 flex-1 items-center">
        <PaperClipIcon class="h-5 w-5 flex-shrink-0 text-yellow-700" aria-hidden="true" />

        <div v-if="!modelValue" class="ml-4 flex min-w-0 flex-1 gap-2">
          <span class="truncate font-medium text-gray-300"> ({{ emptyName }}) </span>
        </div>

        <div v-else class="ml-4 flex min-w-0 flex-1 gap-2">
          <span class="truncate font-medium">{{ modelValue.name }}</span>
          <span class="flex-shrink-0 text-gray-400">({{ filesize(modelValue.size) }})</span>
        </div>
      
      </div>

      <div class="ml-4 flex-shrink-0">

        <button v-if="!modelValue" @click="$refs.file.click()" type="button" class="font-medium text-yellow-700 hover:text-yellow-800">Escolher Ficheiro</button>

        <div v-else class="space-x-4">
          <button type="button"  @click="$refs.file.click()" class="rounded-md bg-white font-medium text-yellow-600 hover:text-yellow-800">Editar</button>
          <span class="text-gray-200" aria-hidden="true">|</span>
          <button type="button"  @click="remove" class="rounded-md bg-white font-medium text-yellow-600 hover:text-yellow-800">Remover</button>
        </div>

      </div>

    </div>
    <p class="mt-1 text-xs leading-6  text-gray-300">PNG ou JPG (MAX. 800x400px).</p>

    <div v-if="error" class="form-error">{{ error }}</div>
  </div>
</template>

<script setup>
  import { PaperClipIcon} from '@heroicons/vue/20/solid'

  defineProps({
    modelValue: File,
    emptyName: {
      type: String,
      default: () => 'N/A',
    },
    error: String,
  })

  const emit = defineEmits(['update:modelValue'])

  function filesize(size) {
    var i = Math.floor(Math.log(size) / Math.log(1024))
    return (size / Math.pow(1024, i)).toFixed(2) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i] 
  }



  function change(e) {
    emit('update:modelValue', e.target.files[0])
  }

  function remove() {
    emit('update:modelValue', null)
  }
 



</script>
