<template>
  

  <main>
    <div class="relative isolate overflow-hidden ">
      <!-- Secondary navigation -->
      <header class="pb-4 pt-6 sm:pb-6">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center gap-6 px-4 sm:flex-nowrap sm:px-6 lg:px-8">
          <h1 class="text-base font-semibold leading-7 text-gray-900">Períodos</h1>
          <div class="order-last flex w-full gap-x-8 text-sm font-semibold leading-6 sm:order-none sm:w-auto sm:border-l sm:border-gray-200 sm:pl-6 sm:leading-7">
            <a v-for="item in secondaryNavigation" :key="item.name" :href="item.href" :class="item.current ? 'text-indigo-600' : 'text-gray-700'">{{ item.name }}</a>
          </div>
          <a href="#" class="ml-auto flex items-center gap-x-1 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Exportar
          </a>
        </div>
      </header>

      <!-- Stats -->
      <div class="border-b border-b-gray-900/10 lg:border-t lg:border-t-gray-900/5">
        <dl class="mx-auto grid max-w-7xl grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 lg:px-2 xl:px-0">
          <div v-for="(stat, statIdx) in stats" :key="stat.name" :class="[statIdx % 2 === 1 ? 'sm:border-l' : statIdx === 2 ? 'lg:border-l' : '', 'flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8']">
            <dt class="text-sm font-medium leading-6 text-gray-500">{{ stat.name }}</dt>
            <dd :class="[stat.changeType === 'negative' ? 'text-rose-600' : 'text-green-700', 'text-xs font-medium']">{{ stat.change }}</dd>
            <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">{{ stat.value }}</dd>
          </div>
        </dl>
      </div>

      <div class="absolute left-0 top-full -z-10 mt-96 origin-top-left translate-y-40 -rotate-90 transform-gpu opacity-20 blur-3xl sm:left-1/2 sm:-ml-96 sm:-mt-10 sm:translate-y-0 sm:rotate-0 sm:transform-gpu sm:opacity-50" aria-hidden="true">
        <div class="aspect-[1154/678] w-[72.125rem] bg-gradient-to-br from-[#FF80B5] to-[#9089FC]" style="clip-path: polygon(100% 38.5%, 82.6% 100%, 60.2% 37.7%, 52.4% 32.1%, 47.5% 41.8%, 45.2% 65.6%, 27.5% 23.4%, 0.1% 35.3%, 17.9% 0%, 27.7% 23.4%, 76.2% 2.5%, 74.2% 56%, 100% 38.5%)" />
      </div>
    </div>

    <div class="space-y-16 py-16 xl:space-y-20">
      <!-- Recent activity table -->
      <div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <h2 class="mx-auto max-w-2xl text-base font-semibold leading-6 text-gray-900 lg:mx-0 lg:max-w-none">Ultimas Transações</h2>
        </div>
        <div class="mt-6 overflow-hidden border-t border-gray-100">
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
              <table class="w-full text-left">
                <thead class="sr-only">
                  <tr>
                    <th>Amount</th>
                    <th class="hidden sm:table-cell">Client</th>
                    <th>More details</th>
                  </tr>
                </thead>
                <tbody>
                  <template v-for="day in days" :key="day.dateTime">
                    <tr class="text-sm leading-6 text-gray-900">
                      <th scope="colgroup" colspan="3" class="relative isolate py-2 font-semibold">
                        <time :datetime="day.dateTime">{{ day.date }}</time>
                        <div class="absolute inset-y-0 right-full -z-10 w-screen border-b border-gray-200 bg-gray-50" />
                        <div class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 bg-gray-50" />
                      </th>
                    </tr>
                    <tr v-for="transaction in day.transactions" :key="transaction.id">
                      <td class="relative py-5 pr-6">
                        <div class="flex gap-x-6">
                          <component :is="transaction.icon" class="hidden h-6 w-5 flex-none text-gray-400 sm:block" aria-hidden="true" />
                          <div class="flex-auto">
                            <div class="flex items-start gap-x-3">
                              <div class="text-sm font-medium leading-6 text-gray-900">{{ transaction.amount }}</div>
                              <div :class="[statuses[transaction.status], 'rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset']">{{ transaction.status }}</div>
                            </div>
                            <div v-if="transaction.tax" class="mt-1 text-xs leading-5 text-gray-500">{{ transaction.tax }} tax</div>
                          </div>
                        </div>
                        <div class="absolute bottom-0 right-full h-px w-screen bg-gray-100" />
                        <div class="absolute bottom-0 left-0 h-px w-screen bg-gray-100" />
                      </td>
                      <td class="hidden py-5 pr-6 sm:table-cell">
                        <div class="text-sm leading-6 text-gray-900">{{ transaction.client }}</div>
                        <div class="mt-1 text-xs leading-5 text-gray-500">{{ transaction.description }}</div>
                      </td>
                      <td class="py-5 text-right">
                        <div class="flex justify-end">
                          <a :href="transaction.href" class="text-sm font-medium leading-6 text-indigo-600 hover:text-indigo-500"
                            >Visualizar<span class="hidden sm:inline"> Transação</span><span class="sr-only">, invoice #{{ transaction.invoiceNumber }}, {{ transaction.client }}</span></a
                          >
                        </div>
                        <div class="mt-1 text-xs leading-5 text-gray-500">
                          Recibo <span class="text-gray-900">#{{ transaction.invoiceNumber }}</span>
                        </div>
                      </td>
                    </tr>
                  </template>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


    </div>
  </main>
</template>

<script setup>

import { ref } from 'vue'
import { Dialog, DialogPanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import {
  ArrowDownCircleIcon,
  ArrowPathIcon,
  ArrowUpCircleIcon,
  Bars3Icon,
  EllipsisHorizontalIcon,
  PlusSmallIcon,
} from '@heroicons/vue/20/solid'
import { BellIcon, XMarkIcon } from '@heroicons/vue/24/outline'

const navigation = [
  { name: 'Home', href: '#' },
  { name: 'Invoices', href: '#' },
  { name: 'Clients', href: '#' },
  { name: 'Expenses', href: '#' },
]
const secondaryNavigation = [
  { name: 'Ultimos 7 dias', href: '#', current: true },
  { name: 'Ultimos 30 dias', href: '#', current: false },
  { name: 'Tudo', href: '#', current: false },
]
const stats = [
  { name: 'Total', value: '40,091.00 MZN', change: '+1000 MZN', changeType: 'positive' },
  { name: 'Consultas', value: '12,787.00 MZN', change: '+2000 MZN', changeType: 'positive' },
  { name: 'Procedimentos', value: '2,988.00 MZN', change: '+4000 MZN', changeType: 'positive' },
  { name: 'Pendente', value: '3,156.00 MZN', change: '+1000 MZN', changeType: 'positive' },
]
const statuses = {
  Pago: 'text-green-700 bg-green-50 ring-green-600/20',
  Withdraw: 'text-gray-600 bg-gray-50 ring-gray-500/10',
  Overdue: 'text-red-700 bg-red-50 ring-red-600/10',
}
const days = [
  {
    date: 'Hoje',
    dateTime: '2023-03-22',
    transactions: [
      {
        id: 1,
        invoiceNumber: '00012',
        href: '#',
        amount: '1,000.00 MZN',
        tax: '500.00',
        status: 'Pago',
        client: 'Medico',
        description: 'Jessica Matsinhe',
        icon: ArrowUpCircleIcon,
      },
      {
        id: 2,
        invoiceNumber: '00011',
        href: '#',
        amount: '3,000.00 MZN',
        status: 'Pago',
        client: 'Paciente',
        description: 'Luis Antonio',
        icon: ArrowDownCircleIcon,
      },
      {
        id: 3,
        invoiceNumber: '00009',
        href: '#',
        amount: '2,000.00 MZN',
        tax: '130.00',
        status: 'Pago',
        client: 'Paciente',
        description: 'Julia Eduardo',
        icon: ArrowPathIcon,
      },
    ],
  },
  {
    date: 'Ontem',
    dateTime: '2023-03-21',
    transactions: [
      {
        id: 4,
        invoiceNumber: '00010',
        href: '#',
        amount: '1,000.00 MZN',
        tax: '900.00',
        status: 'Pago',
        client: 'Paciente',
        description: 'Carlos Estevao',
        icon: ArrowUpCircleIcon,
      },
    ],
  },
]

const mobileMenuOpen = ref(false)

</script>
