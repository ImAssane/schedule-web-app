<template>
    <div class="font-[sans-serif] lg:flex lg:items-center lg:justify-center lg:h-screen max-lg:py-4">
    <div class="bg-gradient-to-br from-gray-200 to-gray-100 p-6 w-full max-w-5xl max-lg:max-w-xl mx-auto rounded-md">
      <h2 class="text-3xl font-extrabold text-gray-800 text-center">Checkout</h2>

      <div class="grid lg:grid-cols-3 gap-6 mt-12">
        <div class="lg:col-span-2">
          <h3 class="text-lg font-bold text-gray-800">Escolhe o metodo de pagamento</h3>

          <div class="grid gap-4 sm:grid-cols-2 mt-4">
            <div class="flex items-center">
              <input type="radio" class="w-5 h-5 cursor-pointer" id="card" checked />
              <label for="card" class="ml-4 flex gap-2 cursor-pointer">
                <img src="https://readymadeui.com/images/visa.webp" class="w-12" alt="card1" />
                <img src="https://readymadeui.com/images/american-express.webp" class="w-12" alt="card2" />
                <img src="https://readymadeui.com/images/master.webp" class="w-12" alt="card3" />
              </label>
            </div>

            <div class="flex items-center">
              <input type="radio" class="w-5 h-5 cursor-pointer" id="paypal" />
              <label for="paypal" class="ml-4 flex gap-2 cursor-pointer">
                <img src="https://readymadeui.com/images/paypal.webp" class="w-20" alt="paypalCard" />
              </label>
            </div>
          </div>

          <form class="mt-8">
            <div class="grid sm:col-span-2 sm:grid-cols-2 gap-4">
              <input type="text" placeholder="Name of card holder"
                class="px-4 py-3.5 bg-white text-gray-800 w-full text-sm border rounded-md focus:border-[#007bff] outline-none" />
              <input type="number" placeholder="Postal code"
                class="px-4 py-3.5 bg-white text-gray-800 w-full text-sm border rounded-md focus:border-[#007bff] outline-none" />
              <input type="number" placeholder="Card number"
                class="col-span-full px-4 py-3.5 bg-white text-gray-800 w-full text-sm border rounded-md focus:border-[#007bff] outline-none" />
              <input type="number" placeholder="EXP."
                class="px-4 py-3.5 bg-white text-gray-800 w-full text-sm border rounded-md focus:border-[#007bff] outline-none" />
              <input type="number" placeholder="CVV"
                class="px-4 py-3.5 bg-white text-gray-800 w-full text-sm border rounded-md focus:border-[#007bff] outline-none" />
            </div>
          </form>
        </div>

        <div class="bg-white p-6 rounded-md">
          <h3 class="text-lg font-bold text-gray-800">Sumário da compra</h3>
          <ul class="text-gray-800 mt-4 space-y-2">
            <li class="flex flex-wrap gap-4 text-sm">Producto <span class="ml-auto font-bold">{{ info.name }}</span></li>
            <li class="flex flex-wrap gap-4 text-sm">Imposto <span class="ml-auto font-bold">0.00</span></li>
            <hr />
            <li class="flex flex-wrap gap-4 text-base font-bold">Total <span class="ml-auto">{{ info.price }}</span></li>
          </ul>
        </div>
      </div>

      <div class="flex flex-wrap gap-4 mt-8">
        <!-- <button type="button"
          class="px-6 py-3.5 text-sm bg-white hover:bg-gray-50 text-gray-800 rounded-md">Pagar depois</button> -->
          <Link as="button" type="button" method="post" :href="$route('examination.store')"  class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:w-auto\">Pagar</Link>
      </div>
    </div>
  </div>
    
</template>

<script setup>

let props = defineProps({
    info: Object,
  });

 
  console.log(props.info)
</script>

