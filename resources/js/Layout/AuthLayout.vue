<template>  
    <div class="flex min-h-screen">
      <div class="flex flex-1 flex-col justify-center py-10 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
        <div class="mx-auto w-full max-w-sm lg:w-96">
          <slot/>
        </div>
      </div>
  
      <div class="relative hidden flex-1 lg:block ">
        <div class="absolute inset-0 brightness-50">
          <img class=" h-full w-full object-cover" src="/images/3d-internet-secuirty-badge.jpg" alt="Imagem do Auth!" />
        </div>
        
        
      </div>
    </div>
  </template>

  
  