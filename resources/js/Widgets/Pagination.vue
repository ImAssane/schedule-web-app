<template>
  <div v-if="data.links.length > 3" class="flex items-center justify-between bg-white px-4 py-3 sm:px-6 mt-5">
    <div class="flex flex-1 justify-between sm:hidden">
      <Component :is="data.prev_page_url ? 'Link' : 'span'" :href="data.prev_page_url" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Anterior</Component>
      <Component :is="data.next_page_url ? 'Link' : 'span'" :href="data.next_page_url" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Proximo</Component>
    </div>
    
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
      <div>
        <p class="text-sm text-gray-700">
          Mostrando de
          {{ ' ' }}
          <span class="font-semibold">{{ data.from }}</span>
          {{ ' ' }}
          a
          {{ ' ' }}
          <span class="font-semibold">{{ data.to }}</span>
          {{ ' ' }}
          no total de
          {{ ' ' }}
          <span class="font-semibold">{{ data.total }}</span>
          {{ ' ' }}
          resultados
        </p>
      </div>
      <div>
        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
          
          <Component :is="data.prev_page_url ? 'Link' : 'span'" :href="data.prev_page_url" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
            <span class="sr-only">Previous</span>
            <ChevronLeftIcon class="h-5 w-5" aria-hidden="true" />
          </Component>
          
          <Component v-for="link in data.links.slice(1,-1)" :is="link.active ? 'span' : 'Link'" :href= "link.url"  :class="[link.active ? 'z-10 bg-gray-900 text-white':'text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-100' , 'relative inline-flex items-center px-4 py-2 text-sm font-semibold']">{{ link.label }}</Component>
          
          <Component :is="data.next_page_url ? 'Link' : 'span'" :href="data.next_page_url" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
            <span class="sr-only">Next</span>
            <ChevronRightIcon class="h-5 w-5" aria-hidden="true" />
          </Component>

        </nav>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/20/solid'

defineProps({
  data: Object,
});

</script>