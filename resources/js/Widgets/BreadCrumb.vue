<template>
  <div class="py-5">
    <div>
      <nav class="sm:hidden" aria-label="Back">
        <button @click="goBack" class="flex items-center text-sm font-medium underline text-gray-500 hover:text-blue-700">
          <ChevronLeftIcon class="-ml-1 mr-1 h-5 w-5 flex-shrink-0 text-gray-400" aria-hidden="true" />
          Voltar
        </button>
      </nav>
      <nav class="hidden sm:flex" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
          <li v-for="(item, index) in breadItems.items" :key="index">
            <div class="flex items-center">
              <ChevronRightIcon v-if="index != 0"  class="h-5 w-5 flex-shrink-0 text-gray-400" aria-hidden="true" />
              <Link :href="$route(item.href)"  aria-current="page" :class="{'ml-4': index != 0, 'no-underline inactiveLink': index == breadItems.items.length-1 || index == 0}" class=" underline text-sm font-medium text-gray-500 hover:text-blue-700">{{item.name}}</Link>
            </div>
          </li>
        </ol>
      </nav>
    </div>
    <div class="mt-2 md:flex md:items-center">
      <div class="min-w-0 flex-1">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">{{breadItems.name}}</h2>
      </div>
    </div>
  </div>
</template>

<script>
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/20/solid'
export default {
  components:{
    ChevronLeftIcon,
    ChevronRightIcon
  },
  methods:{
    goBack(){
      window.history.back();
    }
  },
  props:{
    breadItems:{
      type: Object,
      required: true
    },
  },
}
</script>

<style scoped>
.inactiveLink {
   pointer-events: none;
   cursor: default;
}
</style>
