<template>
  <AppHead title="Admin - Certificações">
    <meta name="description" content="Gerenciar Certificações" />
  </AppHead>

  <BreadCrumb :breadItems="breadItems" />

  <TableHead :titles="titles" :createPath="'certifications.create'" />

  <div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <table class="min-w-full divide-y divide-gray-300">
          <thead>
            <tr>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">ID</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Nome da Certificação</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Datas Disponíveis</th>
              <th scope="col" class="relative py-3.5 pl-3 pr-4"></th>
            </tr>
          </thead>
          <tbody class="bg-white">
            <tr v-if="certifications.length === 0">
              <td colspan="4" class="text-center py-4 text-gray-500">Nenhuma certificação encontrada.</td>
            </tr>
            <tr v-else v-for="(certification, index) in certifications" :key="index" :class="index % 2 === 0 ? undefined : 'bg-gray-100'">
              <td class="whitespace-nowrap py-3 pl-4 text-sm text-left font-medium text-gray-900 sm:pl-6">{{ certification.id }}</td>
              <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">{{ certification.name }}</td>
              <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">{{ certification.start_date }}-{{certification.end_date  }}</td>
              <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-left text-sm font-medium">
                <div class="flex gap-x-9 justify-center">
                  <a as="button" type="button" :href="`/certifications/${certification.id}/edit`" class="inline-flex items-center rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                    Editar
                  </a>
                  <button @click="openModal(certification)" class="inline-flex items-center rounded-md bg-red-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-red-700">
                    Apagar
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <DeleteModal v-model="open" :target="target" :info="modalInfo" />

</template>

<script setup>
import { ref } from 'vue'
import BreadCrumb from '@/Widgets/BreadCrumb.vue'
import TableHead from '@/Widgets/TableHead.vue'
import DeleteModal from '@/Widgets/DeleteModal.vue'
import { useForm } from '@inertiajs/vue3'

const open = ref(false)
const target = ref(null)

let props = defineProps({
  certifications: Array,
});

console.log(props.certifications)

const breadItems = {
  name: 'Admin',
  items: [
    { name: 'Certificações', href: 'dashboard.index' },
  ]
}

const titles = {
  subTitle: 'Certificações',
  description: 'Gerir Certificações Disponíveis.',
  button:'Criar'
}

const modalInfo = {
  title: 'Remover a Certificação',
  route: 'certifications.destroy',
}

function openModal(certification) {
  target.value = {
    id: certification.id,
    name: certification.name,
  }
  open.value = true
}

function deleteCertification() {
  // Implement delete logic here
}
</script>
