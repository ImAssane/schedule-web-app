<template>
  <AppHead title="Recuperar senha" >
    <meta name="description" content="Koleta Recovering Account Page" />
  </AppHead>

  <div>
    <h2 class="mt-6 text-3xl font-bold tracking-tight text-gray-900">Esqueceu a sua senha?</h2>
    <p class="mt-2 text-sm text-gray-600">
      Se já recuperou 
      {{ ' ' }}
      <Link href="/login" class="font-medium text-blue-600 hover:text-blue-800">introduza as credenciais.</Link>
    </p>
  </div>

  <div class="mt-8">
    <p class="font-light text-justify text-base text-gray-600">Apenas insira o seu Bilhete de Identidade que nós iremos enviar um código de verificação ao seu número de telefone para recuperação da senha.</p>

    <form class="mt-5 space-y-4 lg:mt-8 md:space-y-5" action="#">
      <div>
        <label for="bi" class="block text-sm font-medium text-gray-700">Bilhete de Identidade</label>
        <div class="mt-1">
          <input type="text" name="bi" id="bi" autocomplete="given-name"  class="block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-700 focus:ring-gray-500 sm:text-sm" />
        </div>
      </div>
    

      <div class="pt-7">
        <button type="submit" class="flex  w-full justify-center rounded-md border border-transparent bg-gray-900 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Enviar SMS</button>
      </div>
    </form>
  </div>

</template>
  
<script>

  
</script>
  
  