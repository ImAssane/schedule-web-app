<template>
  <AppHead title="Relatório Criar" >
      <meta name="description" content="Criar Relatório" />
  </AppHead>
  <BreadCrumb :breadItems="breadItems"/>

  <div class="pt-4">
    <h3 class="text-lg font-medium leading-6 text-gray-900">Relatório</h3>
    <p class="mt-1 text-sm text-gray-500">Preencha os campos de acordo com o tipo de relatório</p>
  </div>

  <SuccessAlert />

  <div class="space-y-8 divide-y divide-gray-200 max-w-2xl mt-6">
    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

      <div class="relative sm:col-span-6">
        <div class="absolute inset-0 flex items-center" aria-hidden="true">
          <div class="w-full border-t border-gray-300" />
        </div>
      </div>

      <div class="sm:col-span-6"> 
        <SelectInput v-model="form.certification_id" :error="form.errors.certification_id" label="Certificação">
            <option  :value="0">Todos</option> 
            <option v-for="item in certification" :key="item.id" :value="item.id">{{item.name}}</option> 
          </SelectInput> 
      </div>

      <div class="sm:col-span-3"> 
        <select-input  label="Estado">
          <option  :value="0">Todos</option>
          <option  :value="0">Aprovados</option> 
          <option  :value="0">Reprovados</option> 
     
        </select-input>
      </div>
      <!-- <div class="sm:col-span-3"> 
        <select-input v-model="form.beverage_id" :error="form.errors.beverage_id" label="Bebida">
          <option  :value="0">Todos</option> 
          <option v-for="item in beverages" :key="item.id" :value="item.id">{{item.name}}</option> 
        </select-input>
      </div> -->

      <div class="sm:col-span-3"> 
          
          <SelectInput v-model="form.user_id" :error="form.errors.user_id" label="Candidato">
            <option  :value="0">Todos</option> 
            <option v-for="item in users" :key="item.id" :value="item.id">{{item.name}}</option> 
          </SelectInput> 

      </div>

      
      <div class=" sm:col-span-3">
        <label class="block text-sm font-medium text-gray-700">Inicio:</label>
        <VueDatePicker :uid="'from_date'" v-model="form.date_from"  locale="pt-PT" model-type="yyyy-MM-dd" format="dd-MM-yyyy" :enable-time-picker="false" calendar-cell-class-name="dp-custom-cell" input-class-name="mt-1 block w-full rounded-md py-2 text-sm shadow-sm  border border-gray-300 border-1 " placeholder="DD-MM-YYYY" close-on-scroll auto-apply required></VueDatePicker>
        <div v-if="form.errors.date_from" class="mt-2 text-xs text-red-800">{{ form.errors.date_from }}</div>
      </div>

      <div class=" sm:col-span-3">
        <label class="block text-sm font-medium text-gray-700">Fim:</label>
        <VueDatePicker :uid="'to_date'" v-model="form.date_to"  locale="pt-PT" model-type="yyyy-MM-dd" format="dd-MM-yyyy" :enable-time-picker="false" calendar-cell-class-name="dp-custom-cell" input-class-name="mt-1 block w-full rounded-md py-2 text-sm shadow-sm  border border-gray-300 border-1 " placeholder="DD-MM-YYYY" close-on-scroll auto-apply required></VueDatePicker>
        <div v-if="form.errors.date_to" class="mt-2 text-xs text-red-800">{{ form.errors.date_to }}</div>
      </div>
      <!-- <div class="sm:col-span-3">
        <DateInput id="date_from"  v-model="form.date_from" :error="form.errors.date_from" label="Inicio" placeholder="DD/MM/YYYY"/>
      </div>

      <div class="sm:col-span-3">
        <DateInput id="date_to"  v-model="form.date_to" :error="form.errors.date_to" label="Fim" placeholder="DD/MM/YYYY"/>
      </div> -->
    </div>
    
    
    <div class="pt-5">
      <div class="flex justify-end ">
  
        <LoadingButton class="ml-3"  @click="generatePDF($route('reports.pdf'))">PDF</LoadingButton>
      </div>
    </div>
  </div>
</template>

<script setup>

  import BreadCrumb from '@/Widgets/BreadCrumb.vue'
  import { useForm } from '@inertiajs/vue3'
/*   import DateInput from '@/Widgets/DateInput.vue' */
  import SelectInput from '@/Widgets/SelectInput.vue'
  import LoadingButton from '@/Widgets/LoadingButton.vue'
  import axios from 'axios'
  import VueDatePicker from '@vuepic/vue-datepicker'
  import '@vuepic/vue-datepicker/dist/main.css'
  import { ref } from 'vue';

  const props = defineProps({
    users: {
      type: Array,
      required: true,
    } ,
    certification: {
      type: Array,
      required: true,
    } ,
    users: {
      type: Object,
      required: true,
    } ,
    employees: {
      type: Object,
      required: true,
    } ,
  });

  const form = useForm({
    certification_id: 0,
    beverage_id: 0,
    user_id: 0,
    employee_id: 0,
    date_from: null,
    date_to: null,
  });


  const isFormDisabled = ref(true);

  const generatePDF = (route) => {

    isFormDisabled.value = true;
    const isImporting = ref(false)

    axios.post(route, form, {
        responseType: 'blob',
      })
      .then((response) => {
        if (response.data && response.headers['content-type'] === 'application/pdf') {
          const blob = new Blob([response.data], { type: 'application/pdf' });
          const link = document.createElement('a');
          link.href = window.URL.createObjectURL(blob);
          link.target = '_blank'; // Open the link in a new tab
          link.download = 'Relatório de Consumo.pdf';
          link.click();
        } else {
          alert('Sem dados para gerar o Relatório.');
        }
      })
      .catch((error) => {
        console.log(error);
        alert('Ocorreu um erro ao gerar o PDF.');
      });
};

const exportToExcel = async (route) => {
  try {
    const response = await axios.post(route,form, { responseType: 'blob' });
    const url = window.URL.createObjectURL(new Blob([response.data]));
    const link = document.createElement('a');
    link.href = url;
    link.setAttribute('download', 'relatorio.xlsx');
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  } catch (error) {
    console.error('Error exporting to Excel:', error);
  }
};


  

  // let submit = (route) => {
  //   form.post(route, {resetOnSuccess: true });
  // }
 
  const breadItems = {
    name: 'Extrair Relatório',
    items: [
      {name:'Relatório', href:'reports.create'},
    ]
  }

</script>

