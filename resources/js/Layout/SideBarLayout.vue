<template>
  <div>
    <TransitionRoot as="template" :show="sidebarOpen">
      <Dialog as="div" class="relative z-50 lg:hidden" @close="sidebarOpen = false">
        <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
          <div class="fixed inset-0 bg-gray-900/80" />
        </TransitionChild>

        <div class="fixed inset-0 flex">
          <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
            <DialogPanel class="relative mr-16 flex w-full max-w-xs flex-1">
              <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                  <button type="button" class="-m-2.5 p-2.5" @click="sidebarOpen = false">
                    <span class="sr-only">Close sidebar</span>
                    <XMarkIcon class="h-6 w-6 text-white" aria-hidden="true" />
                  </button>
                </div>
              </TransitionChild>
              <!-- Sidebar component, swap this element with another sidebar if you like -->
              <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-white px-6 pb-4 pt-4">
                <div class="flex h-16 shrink-0 justify-center">
                  <img class="h-16 w-auto " src="https://flowbite.com/docs/images/logo.svg" alt="Your Company" />
                </div>
                <nav class="flex flex-1 flex-col mt-6">
                  <ul role="list" class="flex flex-1 flex-col gap-y-7">
                    <li>
                      <ul role="list" class="-mx-2 space-y-1">
                        <li v-for="item in navigation" :key="item.name">
                          {{user.isAdmin==item.isAdmin  }}
                          <Link v-if="user.isAdmin==item.isAdmin" :href="$route(item.href)" :class="[isUrl(item.url) ? 'bg-gray-50 text-blue-800' : 'text-gray-700 hover:text-blue-800 hover:bg-gray-50', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                            <component :is="item.icon" :class="[isUrl(item.url) ? 'text-blue-800' : 'text-gray-400 group-hover:text-blue-800', 'h-6 w-6 shrink-0']" aria-hidden="true" />
                            {{ item.name }}
                          </Link>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </nav>
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </Dialog>
    </TransitionRoot>

    <!-- TODO: Static sidebar for desktop -->
    <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
      <!-- Sidebar component, swap this element with another sidebar if you like -->
      <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-white px-6 pb-4 pt-6">
        <div class="flex h-16 justify-center">
          <img class="h-16 w-auto" src="https://flowbite.com/docs/images/logo.svg"  alt="Your Company" />
        </div>
        <nav class="flex flex-1 flex-col mt-6">
          <ul role="list" class="flex flex-1 flex-col gap-y-7">
            <li>
              <ul role="list" class="-mx-2 space-y-1">
                <li v-for="item in navigation" :key="item.name">
                  
                  <Link v-if="user.isAdmin==item.isAdmin" as="a" :href="$route(item.href)" :class="[isUrl(item.url) ? 'bg-gray-50 text-blue-800' : 'text-gray-700 hover:text-blue-800 hover:bg-gray-50', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                    <component :is="item.icon" :class="[isUrl(item.url) ? 'text-blue-800' : 'text-gray-400 group-hover:text-blue-800', 'h-6 w-6 shrink-0']" aria-hidden="true" />
                    {{ item.name }}
                  </Link>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>

    <div class="lg:pl-72">
      <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
        <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden" @click="sidebarOpen = true">
          <span class="sr-only">Open sidebar</span>
          <Bars3Icon class="h-6 w-6" aria-hidden="true" />
        </button>

        <!-- Separator -->
        <div class="h-6 w-px bg-gray-200 lg:hidden" aria-hidden="true" />

        <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6 justify-between items-center">
          <h2 class="text-xl font-thin leading-9 tracking-tight text-gray-200"> Exam Schedule system </h2>
          <div class="flex items-center gap-x-4 lg:gap-x-6">
            <!-- Profile dropdown -->
            <Menu as="div" class="relative">
              <MenuButton class="-m-1.5 flex items-center p-1.5">
                <span class="sr-only">Open user menu</span>
                <div class="relative inline-flex items-center justify-center w-8 h-8 overflow-hidden bg-gray-100 rounded-full ">
                    <span class="font-medium text-gray-400 "> {{ user.name[0] }}</span>
                </div>
                <span class="hidden lg:flex lg:items-center">
                  <span class="ml-4 text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">{{ user.name }} </span>
                  <ChevronDownIcon class="ml-2 h-5 w-5 text-gray-400" aria-hidden="true" />
                </span>
              </MenuButton>
              <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                <MenuItems class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 ring-gray-900/5 focus:outline-none ">
                  <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
                    <Link as="button" :href="item.href" :method="item.method" class="w-full text-start" :class="[active ? 'bg-gray-50' : '', 'px-3 py-1 text-sm leading-6 text-gray-900 ']">{{ item.name }}</Link>
                  </MenuItem>
                </MenuItems>
              </transition>
            </Menu>
          </div>
        </div>
      </div>

      <main class="py-10">
        <div class="px-4 sm:px-6 lg:px-8">
          <FlashMessages/>
          <!-- Your content -->
          <slot/>
        </div>
      </main>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import {
  Dialog,
  DialogPanel,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
  TransitionChild,
  TransitionRoot,
} from '@headlessui/vue'
import {
  Bars3Icon,
  UserIcon,
  XMarkIcon,
  DocumentIcon,
  ChartBarIcon,
  UserPlusIcon,
  PlusCircleIcon
} from '@heroicons/vue/24/outline'
import { ChevronDownIcon } from '@heroicons/vue/20/solid'
import FlashMessages from '@/Widgets/FlashMessages.vue'
import { usePage } from '@inertiajs/vue3'


const navigation = [
  { name: 'Painel de Controle', href: 'dashboard.index', icon: ChartBarIcon , url: 'dashboard', isAdmin:true},
  { name: 'Relatórios', href: 'reports.create', icon: UserPlusIcon , url: 'reports/create',isAdmin:true},
  /*{ name: 'Consultas', href: 'medicals.consults.index', icon: PlusCircleIcon , url: 'medical/consults'},*/
   { name: 'Meus exames', href: 'examination.index', icon: PlusCircleIcon , url: 'examinations',isAdmin:false},
  /* { name: 'Pacientes', href: 'patients.index', icon: UserIcon , url: 'patient'}, */
]

const userNavigation = [
  { name: 'Sair', href: route('logout') , method: 'delete'},
]

const sidebarOpen = ref(false);
const user = usePage().props.auth.user;

console.log(user)

function isUrl(...urls){
  let currentUrl = usePage().url.substring(1)
  if (urls[0] === '') {
    return currentUrl === ''
  }
  return urls.filter((url) => currentUrl.startsWith(url)).length
}

</script>