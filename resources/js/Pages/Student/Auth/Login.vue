<template>
  <AppHead title="Autenticar" >
    <meta name="description" content="Kura Autentication Page" />
  </AppHead>

  <div class="flex justify-center ">
 
    <img class="h-28 w-auto" src="https://flowbite.com/docs/images/logo.svg" alt="Your Company" />
  </div>

  <div>
    <h2 class=" mt-4 text-3xl font-bold tracking-tight text-gray-900">Introduza as suas credenciais</h2>
    <p class="mt-2 text-sm text-gray-600">
      ou
      {{ ' ' }}
      <Link :href="$route('student.register.create')" class="font-medium text-blue-600 hover:text-blue-800">Crie uma nova conta.</Link>
    </p>
  </div>

  <div class="mt-8">
    <div class="relative mt-6">
      <div class="absolute inset-0 flex items-center" aria-hidden="true">
        <div class="w-full border-t border-gray-300" />
      </div>
      <div class="relative flex justify-center text-sm">
        <span class="bg-white px-2 text-blue-700">Candidatos</span>
      </div>
    </div>

    <div class="mt-3">
      <form @submit.prevent="form.post($route('student.login.store'))" > 
        <div class=" flex flex-col space-y-6">
          <TextInput id="email" v-model="form.email" :error="form.errors.email"  autofocus autocapitalize="off" label="E-mail" />
          <TextInput id="password" v-model="form.password" :error="form.errors.password"  label="Senha" type="password" />

          <div class="flex justify-end ">
            <div class="text-sm">
              <Link :href="''" class="font-medium text-gray-500 hover:text-blue-600">Esqueceu a sua senha?</Link>
            </div>
          </div>
        <div/>
          <LoadingButton :loading="form.processing" type="submit">Entrar</LoadingButton>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
  import { useForm } from '@inertiajs/vue3'
  import TextInput from '@/Widgets/TextInput.vue'
  import LoadingButton from '@/Widgets/LoadingButton.vue'

  const form = useForm({
    email: null,
    password: null,
  })
</script>



