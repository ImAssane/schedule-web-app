<template>
  <div class="w-full">
    <label class="block text-sm font-medium text-gray-700">{{ label }}</label>
    <Combobox v-model="selected" by="id" :disabled="isDisabled" v-slot="{ disabled }">
      <div class="relative mt-1">
        <div class="relative w-full cursor-default overflow-hidden rounded-lg text-left shadow-sm border border-gray-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-blue-300 sm:text-sm">
          <ComboboxInput :class="[{'bg-gray-100' : disabled },'w-full border-none  py-2 pl-3 pr-10 text-sm leading-5 text-gray-900 focus:ring-0']" :displayValue="(item) => item.name" @change="query = $event.target.value"/>
          <ComboboxButton class="absolute inset-y-0 right-0 flex items-center pr-2 ">
            <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true"/>
          </ComboboxButton>
        </div>
        <TransitionRoot leave="transition ease-in duration-100" leaveFrom="opacity-100" leaveTo="opacity-0" @after-leave="query = ''">
          <ComboboxOptions class="absolute mt-1 z-10 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
            <div v-if="filteredList.length === 0 && query !== ''" class="relative cursor-default select-none py-2 px-4 text-gray-700">
              Nenhum resultado encontrado!
            </div>

            <ComboboxOption v-for="item in filteredList" as="template" :key="item.id" :value="item" v-slot="{ selected, active }">
              <li class="relative cursor-default select-none py-2 pl-10 pr-4" :class="{'bg-blue-600 text-white': active,'text-gray-900': !active,}">
                <span class="block truncate" :class="{ 'font-medium': selected, 'font-normal': !selected }">
                  {{ item.name }}
                </span>
                <span v-if="selected" class="absolute inset-y-0 left-0 flex items-center pl-3" :class="{ 'text-white': active, 'text-blue-600': !active }">
                  <CheckIcon class="h-5 w-5" aria-hidden="true" />
                </span>
              </li>
            </ComboboxOption>
          </ComboboxOptions>
        </TransitionRoot>
      </div>


    </Combobox>
  </div>
</template>

<script setup>
  import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'
  import { 
    Combobox,
    ComboboxInput,
    ComboboxButton,
    ComboboxOptions,
    ComboboxOption,
    TransitionRoot,
  } from '@headlessui/vue'
  import { ref, computed, watch } from 'vue'

  let props = defineProps({
    label: String,
    isDisabled: Boolean,
    list: Array,
    modelValue: Object,
  });
  
  const emit = defineEmits(['update:modelValue'])
  const list = props.list

  const selected = ref(props.modelValue)
  let query = ref('')

  let filteredList = computed(() =>
    query.value === ''
      ? list
      : list.filter((item) =>
          item.name
            .toLowerCase()
            .replace(/\s+/g, '')
            .includes(query.value.toLowerCase().replace(/\s+/g, ''))
        )
  )

  watch(selected, (selected) => {
    emit('update:modelValue', selected)
  })

</script>


