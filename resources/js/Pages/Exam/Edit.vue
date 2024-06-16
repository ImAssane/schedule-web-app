<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<template>
  <form>
    <div class="space-y-12 sm:space-y-16">
      <div>
        <h2 class="text-base font-semibold leading-7 text-gray-900">Certificado</h2>
        <!-- <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">Anexa os documentos de exames e prescrições do paciente.</p> -->

        <div class="mt-10 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">


          <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">CCNA</label>
            <div class="mt-2 sm:col-span-2 sm:mt-0">
              <div class="flex max-w-2xl justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                <div class="text-center">
                  <PhotoIcon class="mx-auto h-12 w-12 text-gray-300" aria-hidden="true" />
                  <div class="mt-4 flex text-sm leading-6 text-gray-600">
                    <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                      <!-- <span>Download</span> -->
                      <input id="file-upload" name="file-upload" type="file" class="sr-only" />
                    </label>
               
                  </div>
                  <!-- <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF -  10MB</p> -->
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">  Exames</label>
            <div class="mt-2 sm:col-span-2 sm:mt-0">
              <div class="flex max-w-2xl justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                <div class="text-center">
                  <PhotoIcon class="mx-auto h-12 w-12 text-gray-300" aria-hidden="true" />
                  <div class="mt-4 flex text-sm leading-6 text-gray-600">
                    <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                      <span>Carrege o Ficheiro</span>
                      <input id="file-upload" name="file-upload" type="file" class="sr-only" />
                    </label>
               
                  </div>
                  <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF -  10MB</p>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>



    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button>
      <button type="submit" class="inline-flex justify-center rounded-md bg-gray-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Baixar</button>
    </div>
  </form>
</template>

<script setup>
import { PhotoIcon, UserCircleIcon } from '@heroicons/vue/24/solid'
</script>