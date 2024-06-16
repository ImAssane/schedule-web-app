<template>
    <div ref="list" class="w-full max-w-xs relative">

      <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Adicionar á Lista:</label>
      <div class="relative mt-2 rounded-md shadow-sm">
        <div class="pointer-events-none  absolute inset-y-0 left-0 flex items-center pl-3">
          <MagnifyingGlassIcon v-if="!loading" class="h-4  w-auto text-blue-700 " aria-hidden="true" />
          <font-awesome-icon v-else :icon="faSpinner" spin size="sm" class="text-blue-700" />
        </div>
        <input type="text" name="suggestive-search" id="suggestive-search" @focusin="open = true" v-model="form.search" t45:placeholder="placeholder" @input="fetchMedicines($event.target.value)" class="block w-full rounded-md border-0 py-1.5 pl-12 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-gray-500 sm:text-sm sm:leading-6" />
      </div>

      <ul  role="list" v-if="isOpen" class="mt-2 absolute space-y-1 divide-y px-4 py-2 max-h-40 overflow-y-scroll z-10 inset-x-0 rounded-md bg-white border border-gray-300 shadow-sm ">
        
        <li v-if="results.length != 0" v-for="(item, index) in results" :key="index" @click="pushMedicine(item)" class="p-1 cursor-pointer hover:bg-blue-600 hover:text-white " >
            <span >{{ item.name }}</span>
        </li>

        <li class="flex justify-center" v-else>
            <span class="text-sm  ">Não possui nenhum resultado!</span>
        </li>

      </ul>

    </div>
</template>



<script setup>
  import { MagnifyingGlassIcon} from '@heroicons/vue/20/solid'
  import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
  import { faSpinner} from '@fortawesome/free-solid-svg-icons'
  import debounce from 'lodash/debounce' 
  import pickBy from 'lodash/pickBy'
  import { useForm, router } from '@inertiajs/vue3'
  import { ref, computed } from 'vue'
  import { onClickOutside } from '@vueuse/core' 
  
  const props = defineProps({
    modelValue: Object,
    results: Array,
    url: Object,
    placeholder: {
      type: String,
      default: 'Pesquisa o medicamento'
    },
  });

  const emit = defineEmits(['update:modelValue'])
  const loading = ref(false)
  const open = ref(false)
  const list = ref(null)

  let isOpen = computed(() => {
    return open.value && props.results != null;
  })

  onClickOutside(list, () => (open.value = false));

  const form = useForm({
    search: null,
  })

  let pushMedicine = (medicine) => {
    /* form.reset() */
    emit('update:modelValue', medicine) 
   
  }

  let fetchMedicines = debounce(function (value) {
    router.visit(
        route(
          props.url.path,  
          pickBy({
            medicineRequest: props.url.id,
            medicineName: form.search,
          })
        ), 
        {
          only: ['allMedicines'], 
          preserveState: true, 
          replace: true, 
          preserveScroll: true,
          onStart: () => {
            loading.value = true;
          },
          onFinish: () => {
            open.value = true;
            loading.value = false;
          },
        }
      )

  }, 700, { deep: true });

</script>

