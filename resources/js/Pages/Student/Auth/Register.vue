<template>
 
  <AppHead title="Criar conta" >
    <meta name="description" content="Koleta Creating Account Page" />
  </AppHead>
    
  <div>
    <h2 class="text-3xl font-bold tracking-tight text-gray-900">Criar conta</h2>
    <p class="mt-2 text-sm text-gray-600">
      ou já  
      {{ ' ' }}
      <Link :href="$route('student.login.create')" class="font-medium text-blue-600 hover:text-blue-800">possui uma conta?</Link>
    </p>
  </div>

  <div class="mt-3">
    <div class="mt-6">

      <div v-if="form.hasErrors" class="rounded-md bg-blue-50 p-3 mb-4">
        <div class="flex">
          <div class="flex-shrink-0">
            <XCircleIcon class="h-5 w-5 text-blue-400" aria-hidden="true" />
          </div>
          <div class="ml-3">
            <h3  class="text-sm font-medium text-blue-800">Encontramos erros no seu formulário.</h3>
          </div>
        </div>
      </div>


      <form  @submit.prevent="form.post($route('student.register.store'))">
        <TabGroup :selectedIndex="selectedTab" @change="changeTab">
          <nav aria-label="Progress">
            <TabList as="ol" role="list" class="divide-y divide-gray-300 rounded-md border border-gray-300 md:flex md:divide-y-0">
              <Tab as="li" v-for="(step, stepIdx) in steps" :key="step.name" class="relative md:flex md:flex-1 focus:outline-0" v-slot="{ selected }">
                <a :href="step.href" class="flex items-center px-3 py-2 text-sm" :class="{ 'text-gray-500 font-bold': selected, 'font-medium text-gray-300': !selected  }" aria-current="step">
                    <!-- <span>{{ step.id }}</span> -->
                  <span class="ml-2 text-xs">{{ step.name }}</span>
                </a>
                <!-- Divisão -->
                <template v-if="stepIdx !== steps.length - 1">
                  <div class="pl-2 absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                      <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                    </svg>
                  </div>
                </template>
              </Tab>
            </TabList>
          </nav>

          <div class="relative mt-4">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
              <div class="w-full border-t border-gray-300" />
            </div>
            <div class="relative flex justify-center text-sm">
              <span class="bg-white px-2 text-gray-500">Preencha as respectivas colunas</span>
            </div>
          </div>

          <TabPanels class="mt-4">
            <TabPanel as="div" class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <!-- USUARIO -->

              <!-- Nome -->
              <div class="sm:col-span-6">
                <TextInput id="name" v-model="form.name" :error="form.errors.name" autocapitalize="on" label="Nome"/>
              </div>

              <!-- Data -->
              <div class="sm:col-span-3">
                <TextInput id="birth-date"  v-model="form.birth_date" :error="form.errors.birth_date"  label="Data" placeholder="DD/MM/YYYY"/>
              </div>
              <!-- Nacionalidade -->
              <div class="sm:col-span-3">
                <TextInput id="nationality" v-model="form.nationality" :error="form.errors.nationality"  label="Nacionalidade"/>
              </div>
              <!-- Estado Civil -->
              <div class="sm:col-span-3">
                <SelectInput v-model="form.estado" :error="form.errors.estado" label="Estado Civil">
                    <option value="solteiro">Solteiro (a)</option> 
                    <option value="casado">Casado (a)</option> 
                    <option value="divorciado">Divorciado (a)</option> 
                    <option value="viuvo">Viúvo (a)</option> 
                </SelectInput>
              </div>
              <!-- Telefone -->
              <div class="sm:col-span-3">
                <TextInput id="phone-number" type="tel" v-model="form.phone_number" :error="form.errors.phone_number"  label="Telefone" placeholder="8X XXX XXXX"/>
              </div>
              <!-- Genero -->
              <div class="sm:col-span-3">
                <SelectInput v-model="form.gender" :error="form.errors.gender" label="Gênero">
                    <option value="masculino">Masculino</option> 
                    <option value="feminino">Feminino</option> 
                </SelectInput>
              </div>
              
              <!-- Email -->
              <div class="sm:col-span-3">
                <TextInput id="email" type="email" v-model="form.email" :error="form.errors.email" label="Email" optional placeholder="exemplo@email.com"/>
              </div>
              <!-- Address -->
              <div class="sm:col-span-6">
                <TextInput id="address" v-model="form.address" :error="form.errors.address" label="Morada" placeholder="Av. Vladimir Lenine, Nº XXX"/>
              </div>
              
            </TabPanel>

            <!--===================================================================================================================================================== -->
            <!-- DOCUMENTACAO -->

            <TabPanel as="div" class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <!-- Bilhete de Identidade -->
              <div class="sm:col-span-3">
                <TextInput id="id-number" v-model="form.id_number" :error="form.errors.id_number" autocapitalize="on" label="Bilhete de Identidade" />
              </div>
              <!-- Validade -->
              <div class="sm:col-span-3">
                <TextInput id="validade"  v-model="form.validade" :error="form.errors.validade"  label="Validade" placeholder="DD/MM/YYYY"/>
              </div>
              <!-- Nome de Pai -->
              <div class="sm:col-span-3">
                <TextInput id="nome-pai" v-model="form.nome_pai" :error="form.errors.nome_pai" autocapitalize="on" label="Nome do Pai" optional />
              </div>
              <!-- Nome de Mãe -->
              <div class="sm:col-span-3">
                <TextInput id="nome-mae" v-model="form.nome_mae" :error="form.errors.nome_mae" label="Nome da Mãe"  optional/>
              </div>
              <!-- Local de Emissao -->
              <div class="sm:col-span-3">
                <TextInput id="local-emissao" v-model="form.local_emissao" :error="form.errors.local_emissao" label="Local de Emissão"/>
              </div>
              <!-- Provincia -->
              <div class="sm:col-span-3"> 
                <select-input v-model="form.province_id" :error="form.errors.province_id" label="Província">
                  <option v-for="item in provinces" :key="item.id" :value="item.id">{{item.name}}</option> 
                </select-input>
              </div>

              
              
              <div class="sm:col-span-6">
                <label for="bi-attache" class="block text-sm font-medium text-gray-700">Bilhete de Identidade (Anexo)</label>
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
            </TabPanel>

            <!--===================================================================================================================================================== -->
            <!-- SEGURANCA -->

            <TabPanel as="div" class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <!-- Introduza a sua senha -->
              <div class="sm:col-span-6">
                <TextInput id="password" type="password" v-model="form.password" :error="form.errors.password" autocapitalize="on" label="Introduza a sua senha"/>
              </div>
              <!-- Confirme a sua senha -->
              <div class="sm:col-span-6">
                <TextInput id="confirm-password" type="password" v-model="form.password_confirmation" :error="form.errors.password_confirmation" autocapitalize="on" label="Confirme a sua senha"/>
              </div>

              <div class="sm:col-span-6">
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="terms" aria-describedby="terms" type="checkbox"
                      class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-gray-700 "
                      requiblue="">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="terms" class="font-light text-gray-900">Aceite os <a
                        class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">Termos & Condições</a></label>
                  </div>
                </div>
              </div>
            </TabPanel>
          </TabPanels>
        </TabGroup>

        <div class="pt-9">
          <div class="flex justify-between">
            <!-- <button type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Voltar</button>
            <button type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Proximo</button> -->
       
            <button v-if="selectedTab != 0" @click="decreaseSelected" type="button" class="inline-flex justify-center rounded-md border border-transparent bg-gray-900 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Voltar</button>
            <div v-else></div>

            <button v-if="selectedTab != 2" type="button" @click="increaseSelected" class="inline-flex justify-center rounded-md border border-transparent bg-gray-900 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Proximo</button>
            <LoadingButton v-else :loading="form.processing" class="ml-3" type="submit">Criar</LoadingButton>
          </div>
        </div>  
      </form>
    </div>
  </div>
  
</template>




<script setup>
  import { ref } from 'vue'
  import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue'
  import { CheckIcon, XCircleIcon } from '@heroicons/vue/24/solid'
  import SelectInput from '@/Widgets/SelectInput.vue'
  import { useForm } from '@inertiajs/vue3'
  import TextInput from '@/Widgets/TextInput.vue'
  import LoadingButton from '@/Widgets/LoadingButton.vue'

  defineProps({
    companies:{
      type: Array,
      default: [],
    },
    provinces:{
      type: Array,
      default: [],
    },
  });


  const selectedTab = ref(0)

  function changeTab(index) {
    selectedTab.value = index
    console.log('Changed active tab to:', selectedTab.value)
  }

  function decreaseSelected() {
    selectedTab.value--
  }

  function increaseSelected() {
    selectedTab.value++
  }

  function onFileSelected(event) {
    form.file = event.target.files[0];
  }

  const form = useForm({
    name: null,
    birth_date: null,
    nationality:null,
    estado: "solteiro",
    phone_number: null,
    address: null,
    gender: "masculino",
    email: null,
    id_number: null,
    validade: null,
    nome_pai: null,
    nome_mae: null,
    local_emissao: null,
    province_id: null,
    file: null,
    company_id: null,
    password: null,
    password_confirmation: null,
  })

  const steps = [
    { id: '1', name: 'Dados pessoais', href: '#', status: 'complete' },
    { id: '2', name: 'Documentação', href: '#', status: 'current' },
    { id: '3', name: 'Segurança', href: '#', status: 'upcoming' },
  ]

  const notificationMethods = [
  { id: '1', title: 'Masculino' },
  { id: '2', title: 'Feminino' },
]
</script>

