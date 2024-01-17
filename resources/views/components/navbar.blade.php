 <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
     <div class="px-5 py-3 lg:px-5 lg:pl-3">
         <div class="flex items-center justify-between sm:px-10">
             <div class="flex items-center justify-start rtl:justify-end">
                 <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                     type="button"
                     class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                     <span class="sr-only">Open sidebar</span>
                     <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                         <path clip-rule="evenodd" fill-rule="evenodd"
                             d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                         </path>
                     </svg>
                 </button>
                 <a href="/" class="flex ms-2 md:me-24">
                     <img src="{{ asset('assets/icons/icons-1.png') }}" class="h-12 me-3" alt="FlowBite Logo" />
                     <div class="grid">
                         <span
                             class="self-center text-xl font-semibold sm:text-xl whitespace-nowrap dark:text-white">Garuda
                             Kasir</span>
                         <span
                             class="self-center sm:block hidden text-sm font-light sm:text-xs whitespace-nowrap text-gray-500">Transformasi
                             Kasirmu Bersama Kami!</span>
                     </div>
                 </a>

             </div>
             <div class="flex items-center">
                 <div class="flex items-center ms-3">
                     <div>
                         <button type="button"
                             class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                             aria-expanded="false" data-dropdown-toggle="dropdown-user">
                             <span class="sr-only">Open user menu</span>

                             <div class="relative w-8 h-8 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                 <svg class="absolute w-10 h-10 text-gray-400 -left-1" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                     <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                         clip-rule="evenodd"></path>
                                 </svg>
                             </div>

                         </button>
                     </div>
                     <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                         id="dropdown-user">
                         <div class="px-4 py-3" role="none">
                             <p class="text-sm text-gray-900 dark:text-white" role="none">
                                 {{ Auth::user()->name }}
                             </p>
                             <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                 {{ Auth::user()->email }}
                             </p>
                         </div>
                         <ul class="py-1" role="none">
                             <li>
                                 <a href="/logout"
                                     class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                     role="menuitem">Keluar</a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </nav>
