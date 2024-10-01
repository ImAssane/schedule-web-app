<template>
  <div class="flex items-center justify-center p-12">
    <div class="mx-auto w-full max-w-[550px] bg-white">
      <form action="https://formbold.com/s/FORM_ID" @submit.prevent="submit($route('certifications.store'))">
        <div class="mb-5">
          <TextInput id="name" v-model="form.name" :error="form.errors.name" label="Nome da Certificação" placeholder="Digite o nome da certificação" />
        </div>
        <div class="mb-5"> 
          <select-input  label="Alocar Exame">
            <option  :value="0">Exame 2024</option> 
            <option  :value="2">Exame 2023</option> 
            <option  :value="2">Exame 2022</option> 
          </select-input>
        </div>
        <div class="sm:col-span-6">
                <label for="bi-attache" class="block text-sm font-medium text-gray-700">Carregar exame (Anexo)</label>
                <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-3 pb-4">
                  <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                      <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                      <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-gray-800  hover:text-blue-500">
                        <span>Carregue o documento</span>
                        <input id="file-upload" name="file-upload" @change="onFileSelected" :error="form.errors.file" type="file" class="sr-only" />
                      </label>
                      <p class="pl-1">ou arraste-o para aqui!</p>
                    </div>
                    <p class="text-xs text-gray-500">PDF, JPG até no maximo 2MB</p>
                  </div>
                </div>
              </div>
        <div class="mb-5">
          <TextInput id="description" v-model="form.price" :error="form.errors.price" label="Preço" placeholder="Digite o preço" />
        </div>
        <div class="-mx-3 flex flex-wrap mb-5">
          <div class="w-full px-3 sm:w-1/2">
            <TextInput id="start_date" v-model="form.start_date" :error="form.errors.start_date" label="Data de Início" type="date" />
          </div>
          <div class="w-full px-3 sm:w-1/2">
            <TextInput id="end_date" v-model="form.end_date" :error="form.errors.end_date" label="Data de Término" type="date" />
          </div>
        </div>
        <!-- <div class="mb-5">
          <TextInput id="available_dates" v-model="form.available_dates" :error="form.errors.dates" label="Datas Disponíveis" placeholder="Digite as datas disponíveis" />
        </div> -->
        <div>
          <div class="pt-2">
            <div class="flex justify-end">
              <LoadingButton :loading="form.processing" class="ml-1 w-full" type="submit">Criar Certificação</LoadingButton>
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
import SelectInput from '@/Widgets/SelectInput.vue'

const form = useForm({
  name: '',
  price: '',
  start_date: null,
  end_date: null,
});

let submit = (route) => {
  form.post(route, { resetOnSuccess: false });
};
</script>
