<template>
  <AppHead title="Exames do candidato">
    <meta name="description" content="Histórico de Exames do candidato" />
  </AppHead>

  <BreadCrumb :breadItems="breadItems" />

  <TableHead :titles="titles"  :createPath="'examination.create'" />

    <div class="mt-8 flow-root">
      <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
          <table class="min-w-full divide-y divide-gray-300">
            <thead>
              <tr>  
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">ID</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Data do exame</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Certificação</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Resultado</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Tentativas</th>
                
                <th scope="col" class="relative py-3.5 pl-3 pr-4"></th>
              </tr>
            </thead>
            <tbody class="bg-white">

              <tr v-if="appointments.length === 0">
                <td colspan="7" class="text-center py-4 text-gray-500">Nenhuma exame encontrada.</td>
              </tr>
              <tr v-else v-for="(item, index) in appointments" :key="index" :class="index % 2 === 0 ? undefined : 'bg-gray-100'">
                
                <td class="whitespace-nowrap py-3 pl-4 text-sm text-left font-medium text-gray-900 sm:pl-6">{{ item.id }}</td>
                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">{{ item.appointment_date }}-{{ item.time }}</td>
                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">{{ item.certification }}</td>
                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">{{ item.status }}</td>
                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">{{ item.attempts }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-left text-sm font-medium">
                  <div class="flex gap-x-9 justify-center">
                    <!-- <Link as="button" type="button" :href="`/appointments/${item.id}/edit`" class="inline-flex items-center rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                      Editar
                    </Link> -->

                    <a v-show="item.status === 'Aprovado'" as="button" type="button" href="/examinations/edit" class="inline-flex items-center rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                      Detalhes
                    </a>
                    <a v-show="item.status === 'Pending'"  as="button" type="button" href="#" class="inline-flex items-center rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                      Cancelar
                    </a>
                    <a v-show="item.status === 'Reprovado'"  as="button" type="button" href="#" class="inline-flex items-center rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                      Remarcar
                    </a>
                   
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>


  <!-- <Pagination :data="filteredAppointments" /> -->

  <DeleteModal v-model="open" :target="target" :info="modalInfo" />

</template>

<script setup>
import BreadCrumb from '@/Widgets/BreadCrumb.vue'
import TableHead from '@/Widgets/TableHead.vue'
import DeleteModal from '@/Widgets/DeleteModal.vue'
import Pagination from '@/Widgets/Pagination.vue'
import { ref, computed } from 'vue'

const open = ref(false)
const target = ref(null)

let props = defineProps({
  appointments: Object,
  currentUser: Object,
  can: Object,
});
console.log(props.appointments);
const breadItems = {
  name: 'Meus exames',
  items: [
    { name: 'Exames', href: 'examination.index' },
    { name: 'Histórico', href: 'examination.index' },
  ]
}

const titles = {
  subTitle: 'Registos',
  description: 'Histórico de exames realizadas pelo candidato.',
  button:'Marcar exame'
}

const modalInfo = {
  title: 'Remover a consulta',
  route: 'appointments.destroy',
}



function canDelete(appointment) {
  return appointment.id === props.currentUser.id && props.can.delete;
}

function openModal(item) {
  target.value = {
    id: item.id,
    name: item.patient,
  }
  open.value = true
}

function downloadPrescription(prescription) {
  // Implement your download logic here
  // For example, opening the prescription in a new tab
  window.open(prescription.url, '_blank');
}

function viewPrescription(prescription) {
  // Implement your view logic here
  // For example, opening the prescription in a modal or dedicated viewer
  console.log('Viewing prescription:', prescription);
  // Replace with your implementation, such as opening a modal
  alert('Implement your view prescription logic');
}

function openFileInput() {
  // Open the file input dialog to select a file
  this.$refs.fileInput.click();
}

function uploadExam(appointment) {
  const file = this.$refs.fileInput.files[0];
  if (!file) return;

  // Example of handling file upload using FormData
  const formData = new FormData();
  formData.append('exam', file);

  // You would typically send this to your backend API to handle the upload
  // For example, if you have an endpoint '/appointments/:id/upload-exam'
  // axios.post(`/appointments/${appointment.id}/upload-exam`, formData, {
  //   headers: {
  //     'Content-Type': 'multipart/form-data'
  //   }
  // }).then(response => {
  //   console.log('Exam uploaded successfully:', response.data);
  // }).catch(error => {
  //   console.error('Error uploading exam:', error);
  // });

  // Simulating a successful upload for demonstration
  setTimeout(() => {
    alert('Exame enviado com sucesso!');
    // Reload appointments or update the UI as needed
  }, 1000);
}

</script>
