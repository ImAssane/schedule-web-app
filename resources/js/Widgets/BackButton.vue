<template>
  <div>
    <button type="button" @click="goback()" class="pb-4 flex items-center text-sm font-medium self-start  text-gray-700 hover:text-blue-700">
      <ChevronLeftIcon class="-ml-1 mr-1 h-5 w-5 flex-shrink-0 text-blue-400" aria-hidden="true" />
      Voltar
    </button>
  </div>
</template>

<script setup>
  import { ChevronLeftIcon } from '@heroicons/vue/20/solid'
  let goback = () => history.back();
  
</script>

