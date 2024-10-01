<template>
  <div class="flex flex-col justify-between mt-2 xl:flex-row xl:items-end ">
    <div>
      <h1 class="text-xl font-semibold text-gray-900">{{ titles.subTitle }}</h1>
      <p class="mt-1 text-sm text-gray-700">{{ titles.description }}</p>
    </div>

    <div class="flex flex-col sm:items-end sm:flex-row sm:justify-between ">

      <Listbox v-if="statuses" v-model="form.status">
        <div class="relative w-36 mt-4 mr-3">
          <ListboxButton class="relative w-full cursor-default rounded-lg bg-gray-50 py-2 pl-3 pr-10 text-left border border-gray-300 focus:outline-none focus-visible:border-indigo-500 focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-300 sm:text-sm">
            <span class="block truncate">{{ form.status ?? 'Geral' }}</span>
            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2 ">
              <ChevronUpDownIcon class="h-5 w-5 text-blue-950" aria-hidden="true"/>
            </span>
          </ListboxButton>

          <transition leave-active-class="transition duration-100 ease-in" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <ListboxOptions class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
              
              <ListboxOption v-slot="{ active, selected }" :key="0" :value="null" as="template">
                <li :class="[ active ? 'bg-amber-100 text-amber-900' : 'text-gray-900','relative cursor-default select-none py-2 pl-10 pr-4']">
                  <span :class="[ selected ? 'font-medium' : 'font-normal','block truncate']">Geral</span>
                  <span v-if="selected" class="absolute inset-y-0 left-0 flex items-center pl-3 text-yellow-700">
                    <CheckIcon class="h-5 w-5" aria-hidden="true" />
                  </span>
                </li>
              </ListboxOption>
              
              
              <ListboxOption v-slot="{ active, selected }"  v-for="status in statuses" :key="status.name" :value="status.name" as="template">
                <li :class="[ active ? 'bg-amber-100 text-amber-900' : 'text-gray-900','relative cursor-default select-none py-2 pl-10 pr-4']">
                  <span :class="[ selected ? 'font-medium' : 'font-normal','block truncate']">{{ status.name }}</span>
                  <span v-if="selected" class="absolute inset-y-0 left-0 flex items-center pl-3 text-yellow-700">
                    <CheckIcon class="h-5 w-5" aria-hidden="true" />
                  </span>
                </li>
              </ListboxOption>
            </ListboxOptions>
          </transition>
        </div>
      </Listbox>

      <div v-else />

      <div class="flex justify-between sm:justify-end items-end gap-x-7">
        <div v-if="filterPath" class="relative xl:w-4/5 w-4/6 mt-4 ">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
          </div>
          <input v-model="form.search" type="text" id="simple-search" class="bg-gray-50 focus:border-gray-400 focus:ring-0 border-gray-300  text-gray-900 text-sm rounded-lg  block w-full pl-10 p-2.5 " placeholder="Pesquisar" required>
        </div>

        <div v-if="createPath" class="mt-4">
          <Link as="button" type="button" :href="$route(createPath)" class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-900 px-4 py-3 text-sm font-medium text-white shadow-sm hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 sm:w-auto\">{{ titles.button }}</Link>
        </div>
      </div>

    </div>
  </div>

  
</template>

<script setup>
  import debounce from 'lodash/debounce' 
  import pickBy from 'lodash/pickBy'
  import { watch } from 'vue' 
  import { router } from '@inertiajs/vue3'
  import { useForm } from '@inertiajs/vue3'
  import {
    Listbox,
    ListboxButton,
    ListboxOptions,
    ListboxOption,
  } from '@headlessui/vue'
  import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid' 


  const props = defineProps({
    statuses: Array,
    filters: Object,
    filterPath: String,
    titles: {
      type: Object,
      required: true
    }, 
    createPath: String,
  });

  const form = useForm({
    search: props.filters?.search,
    status: props.filters?.status,
  })

  watch(form, debounce(function (value) {
    router.get(route(props.filterPath), pickBy({search: value.search , status: value.status}), { preserveState: true, replace: true}) 
  },300),{ deep: true } );

</script>

