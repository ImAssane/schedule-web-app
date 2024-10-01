<template>
  <div class="flex items-center justify-center p-12">
    <div class="mx-auto w-full max-w-[550px] bg-white">
      <form action="https://formbold.com/s/FORM_ID" @submit.prevent="submit($route('payment.index'))">
        <div class="sm:col-span-3">
          <SelectInput v-model="form.certification_id" :error="form.errors.certification_id" label="Certificação">
            <option v-for="item in certification" :key="item.id" :value="item.id">{{item.name}}</option> 
          </SelectInput> 
        </div>
        <div class="-mx-3 flex flex-wrap mb-5">
          <div class="w-full px-3 sm:w-1/2">
            <TextInput id="date" v-model="form.date" :error="form.errors.date" label="Data" type="date" />
          </div>
          <div class="w-full px-3 sm:w-1/2">
            <TextInput id="time" v-model="form.time" :error="form.errors.time" label="Hora" type="time" />
          </div>
        </div>
        <div class="mb-5">
          <select-input  label="Endereço">
            <option  :value="0">Av. 4 de Outubro</option> 
            <option  :value="2">Kim Ill Sung</option>  
          </select-input>

          <!-- <TextInput id="address" v-model="form.address" :error="form.errors.address" label="Endereço" placeholder="Digite o endereço" /> -->
        </div>
        <div class="mb-5">
          <TextInput id="celular" v-model="form.celular" :error="form.errors.celular" label="Celular" placeholder="Digite o celular" />
        </div>
        <div class="mb-5">
          <TextInput id="voucher" v-model="form.voucher" :error="form.errors.voucher" label="Código do Voucher (opcional)" placeholder="Digite o código do voucher" />
        </div>
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
  name: null,
  phone: null,
  email: null,
  certification_id: null,
  date: null,
  time: null,
  city: null,
  post_code: null,
  address: null,
  celular: null,
  voucher: null,
});

let props = defineProps({
  certification: Array,
});

let submit = (route) => {
  form.get(route, { resetOnSuccess: false });
};
</script>
