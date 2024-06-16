<template>
  <div class="flex items-center justify-center p-12">
    <div class="mx-auto w-full max-w-[550px] bg-white">
      <form action="https://formbold.com/s/FORM_ID"  @submit.prevent="submit($route('payment.index'))">
        <!-- <div class="mb-5">
          <TextInput id="name" v-model="form.name" :error="form.errors.name" label="Nome completo" placeholder="Nome completo" />
        </div>
        <div class="mb-5">
          <TextInput id="phone" v-model="form.phone" :error="form.errors.phone" label="Celular" placeholder="Digite o contato" />
        </div>
        <div class="mb-5">
          <TextInput id="email" v-model="form.email" :error="form.errors.email" label="Email" placeholder="Digite o email" type="email" />
        </div> -->
        <div class="sm:col-span-3">
          <select-input v-model="form.certification_id" :error="form.errors.certification_id" label="Certificação">
            <option v-for="item in certification" :key="item.id" :value="item.id">{{item.name}}</option> 
          </select-input> 
        </div>
        <!-- <div class="sm:col-span-3">
          <select-input v-model="form.type_id" :error="form.errors.type_id" label="Tipo de ocnsulta">
            <option v-for="item in type" :key="item.id" :value="item.id">{{item.name}}</option> 
          </select-input> 
        </div> -->
        <div class="-mx-3 flex flex-wrap mb-5">
          <div class="w-full px-3 sm:w-1/2">
            <TextInput id="date" v-model="form.date" :error="form.errors.date" label="Data" type="date" />
          </div>
          <div class="w-full px-3 sm:w-1/2">
            <TextInput id="time" v-model="form.time" :error="form.errors.time" label="Hora" type="time" />
          </div>
        </div>
       
        <div class="-mx-3 flex flex-wrap mb-5">
          <div class="w-full px-3 sm:w-1/2">
            <TextInput id="city" v-model="form.city" :error="form.errors.city" label="Cidade" placeholder="Digite a cidade" />
          </div>
          <div class="w-full px-3 sm:w-1/2">
            <TextInput id="post-code" v-model="form.post_code" :error="form.errors.post_code" label="Código Postal" placeholder="Código Postal" />
          </div>
        </div>
        <div class="mb-5">
          <TextInput id="address" v-model="form.address" :error="form.errors.address" label="E-mail" placeholder="Digite o e-mail" />
        </div>
        <div class="mb-5">
          <TextInput id="celular" v-model="form.celular" :error="form.errors.celular" label="Celular" placeholder="Digite o celular" />
        </div>
        <!-- <div class="mb-5">
          <textarea id="symptoms" v-model="form.symptoms" :error="form.errors.symptoms" rows="4" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" placeholder="Descreva os sintomas"></textarea>
          <span v-if="form.errors.symptoms" class="text-red-600 text-sm">{{ form.errors.symptoms }}</span>
        </div> -->
        <div>
          <div class="pt-2">
              <div class="flex justify-end">
                  <LoadingButton :loading="form.processing" class="ml-1 w-full" type="submit">Continuar</LoadingButton>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import TextInput from '@/Widgets/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import LoadingButton from '@/Widgets/LoadingButton.vue';
import SelectInput from '@/Widgets/SelectInput.vue';

const form = useForm({
  date: null,
  time: null,
  city: null,
  post_code: null,
  address: null,
  certification_id:null,
 
});



  let props = defineProps({
    certification: Array,
  });
 
  const type = [
    { name: 'On-line', id:1},
    { name: 'Presencial',id:2},
   
  ]
  let submit = (route) => {
    form.get(route, {resetOnSuccess: false });
  }
</script>

