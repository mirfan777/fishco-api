<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Fishco</title>
   @vite(['resources/css/style.css', 'resources/js/app.js'])
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
   <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
   
   <!-- <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script> -->

   <script>
      if (!localStorage.getItem('user') || localStorage.getItem('user') === 'undefined' || localStorage.getItem('user') === 'null') {
        window.location.href = '/auth/login';
      }

      const authUser = JSON.parse(localStorage.getItem('user'));

      if (authUser.role != 1 && authUser.role != 2) {
         localStorage.removeItem('token');
         localStorage.removeItem('user');
         window.location.href = '/auth/login';
      } 
   </script>

</head>
<body>
<nav class="fixed top-0 z-50 w-full bg-primary-800 border-b border-primary-900 dark:bg-gray-800 dark:border-gray-700 custom-shadow">
      <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
          <div class="flex items-center justify-start rtl:justify-end">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-primary-900 dark:text-primary-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                   <path class="fill-white" clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
             </button>
            <a href="/dashboard" class="flex ms-2 md:me-24">
              <img  src="{{ asset('images/logo/logo-fishco.svg') }}" alt="Logo" class="h-8 me-3" />
            </a>
          </div>
          <div class="flex items-center">
              <div class="flex items-center ms-3">
                <div>
                  <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="{{ asset('images/user/user.png') }}" alt="user photo">
                  </button>
                </div>
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                  <div class="px-4 py-3" role="none">
                    <p class="text-sm text-gray-900 dark:text-white" role="none">
                      <script>
                        document.write(authUser.name);
                      </script>
                    </p>
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                        <script>
                           document.write(authUser.email);
                        </script>
                    </p>
                  </div>
                  <ul class="py-1" role="none">
                      <a id="logout" href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                      <script>
                        document.getElementById('logout').addEventListener('click', signOut);

                        function signOut() {
                          localStorage.removeItem('token');
                          localStorage.removeItem('user');
                          window.location.href = '/auth/login';
                        }
                      </script>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
      </div>
    </nav>
    
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
      <div class="h-full px-5 pb-4 overflow-y-auto bg-white dark:bg-gray-800"> <!-- Ubah px-3 menjadi px-6 -->
         <ul class="space-y-2 font-medium text-white">  
            <li>
               <a href="/dashboard" class="nav-link flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg width="20" height="20" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path class="fill-black" fill-rule="evenodd" clip-rule="evenodd" d="M1.8 0H1.75C1.521 0 1.324 7.45058e-09 1.15 0.041C0.880636 0.105365 0.63435 0.243046 0.438431 0.438789C0.242511 0.634532 0.104608 0.880694 0.04 1.15C-3.72529e-08 1.324 0 1.52 0 1.75V4.25C0 4.479 7.45058e-09 4.676 0.041 4.85C0.105365 5.11936 0.243046 5.36565 0.438789 5.56157C0.634532 5.75749 0.880694 5.89539 1.15 5.96C1.324 6 1.52 6 1.75 6H4.25C4.479 6 4.676 6 4.85 5.959C5.11936 5.89464 5.36565 5.75695 5.56157 5.56121C5.75749 5.36547 5.89539 5.11931 5.96 4.85C6 4.676 6 4.48 6 4.25V1.75C6 1.521 6 1.324 5.959 1.15C5.89464 0.880636 5.75695 0.63435 5.56121 0.438431C5.36547 0.242511 5.11931 0.104608 4.85 0.04C4.676 -3.72529e-08 4.48 0 4.25 0H1.8ZM1.383 1.014C1.426 1.004 1.493 1 1.8 1H4.2C4.508 1 4.574 1.003 4.617 1.014C4.70683 1.03548 4.78895 1.08143 4.85426 1.14674C4.91957 1.21205 4.96552 1.29417 4.987 1.384C4.997 1.426 5 1.492 5 1.8V4.2C5 4.508 4.997 4.574 4.986 4.617C4.96452 4.70683 4.91857 4.78895 4.85326 4.85426C4.78795 4.91957 4.70583 4.96552 4.616 4.987C4.575 4.996 4.509 5 4.2 5H1.8C1.492 5 1.426 4.997 1.383 4.986C1.29317 4.96452 1.21105 4.91857 1.14574 4.85326C1.08043 4.78795 1.03448 4.70583 1.013 4.616C1.004 4.575 1 4.509 1 4.2V1.8C1 1.492 1.003 1.426 1.014 1.383C1.03548 1.29317 1.08143 1.21105 1.14674 1.14574C1.21205 1.08043 1.29417 1.03448 1.384 1.013M8.8 0H8.75C8.521 0 8.324 7.45058e-09 8.15 0.041C7.88064 0.105365 7.63435 0.243046 7.43843 0.438789C7.24251 0.634532 7.10461 0.880694 7.04 1.15C7 1.324 7 1.52 7 1.75V4.25C7 4.479 7 4.676 7.041 4.85C7.10537 5.11936 7.24305 5.36565 7.43879 5.56157C7.63453 5.75749 7.88069 5.89539 8.15 5.96C8.324 6 8.52 6 8.75 6H11.25C11.479 6 11.676 6 11.85 5.959C12.1194 5.89464 12.3656 5.75695 12.5616 5.56121C12.7575 5.36547 12.8954 5.11931 12.96 4.85C13 4.676 13 4.48 13 4.25V1.75C13 1.521 13 1.324 12.959 1.15C12.8946 0.880636 12.757 0.63435 12.5612 0.438431C12.3655 0.242511 12.1193 0.104608 11.85 0.04C11.676 -3.72529e-08 11.48 0 11.25 0H8.8ZM8.383 1.014C8.426 1.004 8.493 1 8.8 1H11.2C11.508 1 11.574 1.003 11.617 1.014C11.7068 1.03548 11.789 1.08143 11.8543 1.14674C11.9196 1.21205 11.9655 1.29417 11.987 1.384C11.997 1.426 12 1.492 12 1.8V4.2C12 4.508 11.996 4.574 11.986 4.617C11.9645 4.70683 11.9186 4.78895 11.8533 4.85426C11.788 4.91957 11.7058 4.96552 11.616 4.987C11.574 4.997 11.508 5 11.2 5H8.8C8.492 5 8.426 4.997 8.383 4.986C8.29317 4.96452 8.21105 4.91857 8.14574 4.85326C8.08043 4.78795 8.03448 4.70583 8.013 4.616C8.004 4.575 8 4.509 8 4.2V1.8C8 1.492 8.003 1.426 8.014 1.383C8.03548 1.29317 8.08142 1.21105 8.14674 1.14574C8.21205 1.08043 8.29417 1.03448 8.384 1.013M1.75 7H4.25C4.479 7 4.676 7 4.85 7.041C5.11936 7.10537 5.36565 7.24305 5.56157 7.43879C5.75749 7.63453 5.89539 7.88069 5.96 8.15C6 8.324 6 8.52 6 8.75V11.25C6 11.479 6 11.676 5.959 11.85C5.89464 12.1194 5.75695 12.3656 5.56121 12.5616C5.36547 12.7575 5.11931 12.8954 4.85 12.96C4.676 13 4.48 13 4.25 13H1.75C1.521 13 1.324 13 1.15 12.959C0.880636 12.8946 0.63435 12.757 0.438431 12.5612C0.242511 12.3655 0.104608 12.1193 0.04 11.85C-3.72529e-08 11.676 0 11.48 0 11.25V8.75C0 8.521 7.45058e-09 8.324 0.041 8.15C0.105365 7.88064 0.243046 7.63435 0.438789 7.43843C0.634532 7.24251 0.880694 7.10461 1.15 7.04C1.324 7 1.52 7 1.75 7ZM1.8 8C1.492 8 1.426 8.003 1.383 8.014C1.29317 8.03548 1.21105 8.08142 1.14574 8.14674C1.08043 8.21205 1.03448 8.29417 1.013 8.384C1.004 8.425 1 8.491 1 8.8V11.2C1 11.508 1.003 11.574 1.014 11.617C1.03548 11.7068 1.08143 11.789 1.14674 11.8543C1.21205 11.9196 1.29417 11.9655 1.384 11.987C1.426 11.997 1.492 12 1.8 12H4.2C4.508 12 4.574 11.996 4.617 11.986C4.70683 11.9645 4.78895 11.9186 4.85426 11.8533C4.91957 11.788 4.96552 11.7058 4.987 11.616C4.997 11.574 5 11.508 5 11.2V8.8C5 8.492 4.997 8.426 4.986 8.383C4.96452 8.29317 4.91857 8.21105 4.85326 8.14574C4.78795 8.08043 4.70583 8.03448 4.616 8.013C4.575 8.004 4.509 8 4.2 8H1.8ZM8.8 7H8.75C8.521 7 8.324 7 8.15 7.041C7.88064 7.10537 7.63435 7.24305 7.43843 7.43879C7.24251 7.63453 7.10461 7.88069 7.04 8.15C7 8.324 7 8.52 7 8.75V11.25C7 11.479 7 11.676 7.041 11.85C7.10537 12.1194 7.24305 12.3656 7.43879 12.5616C7.63453 12.7575 7.88069 12.8954 8.15 12.96C8.324 13.001 8.521 13.001 8.75 13.001H11.25C11.479 13.001 11.676 13.001 11.85 12.96C12.1192 12.8955 12.3653 12.7577 12.561 12.562C12.7567 12.3663 12.8945 12.1202 12.959 11.851C13 11.677 13 11.48 13 11.251V8.751C13 8.522 13 8.325 12.959 8.151C12.8948 7.88145 12.7572 7.63495 12.5614 7.43885C12.3657 7.24274 12.1194 7.10469 11.85 7.04C11.676 7 11.48 7 11.25 7H8.8ZM8.383 8.014C8.426 8.004 8.493 8 8.8 8H11.2C11.508 8 11.574 8.003 11.617 8.014C11.7068 8.03548 11.789 8.08142 11.8543 8.14674C11.9196 8.21205 11.9655 8.29417 11.987 8.384C11.997 8.426 12 8.492 12 8.8V11.2C12 11.508 11.996 11.574 11.986 11.617C11.9645 11.7068 11.9186 11.789 11.8533 11.8543C11.788 11.9196 11.7058 11.9655 11.616 11.987C11.574 11.997 11.508 12 11.2 12H8.8C8.492 12 8.426 11.996 8.383 11.986C8.29317 11.9645 8.21105 11.9186 8.14574 11.8533C8.08043 11.788 8.03448 11.7058 8.013 11.616C8.004 11.575 8 11.509 8 11.2V8.8C8 8.492 8.003 8.426 8.014 8.383C8.03548 8.29317 8.08142 8.21105 8.14674 8.14574C8.21205 8.08043 8.29417 8.03448 8.384 8.013" fill="white"/>
                  </svg>  
                  <span class="ms-3">Dashboard</span>
               </a>
            </li>
            <li>
              <a id="users" href="/users" class="nav-link flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg width="20" height="20" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path class="fill-black" d="M10.2613 12.2813C10.2613 10.03 7.75127 8.2 5.50002 8.2C3.24877 8.2 0.73877 10.03 0.73877 12.2813M5.50002 6.16C6.22157 6.16 6.91358 5.87336 7.42379 5.36315C7.93401 4.85293 8.22064 4.16093 8.22064 3.43938C8.22064 2.71782 7.93401 2.02582 7.42379 1.5156C6.91358 1.00539 6.22157 0.71875 5.50002 0.71875C4.77846 0.71875 4.08646 1.00539 3.57625 1.5156C3.06603 2.02582 2.77939 2.71782 2.77939 3.43938C2.77939 4.16093 3.06603 4.85293 3.57625 5.36315C4.08646 5.87336 4.77846 6.16 5.50002 6.16Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>  
                  <span class="ms-3">User</span>
              </a>
              <script>
                if (authUser.role == 1) {
                  document.getElementById('users').style.display = 'visible';
                } else {
                  document.getElementById('users').style.display = 'invisible';
                }
              </script>
           </li>
            <li>
               <a class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="ikan" data-collapse-toggle="ikan">
                  <svg width="20" height="20" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path class="fill-black" d="M11.977 1.44444H13.3V0H0.7V1.44444H2.023C0.727858 2.78774 0.000571952 4.60526 0 6.5C0 9.36722 1.617 11.8372 3.962 13H10.038C11.2255 12.4126 12.2277 11.4906 12.9288 10.3403C13.6299 9.19015 14.0013 7.85875 14 6.5C14 4.52833 13.223 2.74444 11.977 1.44444ZM3.024 2.46278L3.99 1.44444H10.01L10.976 2.46278C11.3566 2.85524 11.6797 3.30292 11.935 3.79167C11.1659 3.66262 10.4356 3.35382 9.8 2.88889C8.092 4.12389 5.908 4.12389 4.2 2.88889C3.542 3.36556 2.8 3.67611 2.065 3.79167C2.317 3.30778 2.639 2.86 3.024 2.46278ZM9.695 11.5556H4.305C3.42326 11.0623 2.68755 10.3317 2.17604 9.44155C1.66453 8.55138 1.39635 7.53485 1.4 6.5C1.4 6.08833 1.449 5.67667 1.533 5.28667C2.46313 5.26068 3.37526 5.01615 4.2 4.57167C5.95 5.51056 8.05 5.51056 9.8 4.57167C10.64 5.01944 11.55 5.265 12.467 5.28667C12.551 5.67667 12.6 6.08833 12.6 6.5C12.6036 7.53485 12.3355 8.55138 11.824 9.44155C11.3125 10.3317 10.5767 11.0623 9.695 11.5556ZM10.5 8.30556C10.5 9.30222 9.324 10.1111 7.875 10.1111C7.063 10.1111 6.342 9.85111 5.831 9.50444C5.369 10.1111 4.431 10.1111 3.5 10.1111C4.27 10.1111 4.55 9.30222 4.55 8.30556C4.55 7.30889 4.27 6.5 3.5 6.5C4.431 6.5 5.369 6.5 5.859 7.15722C6.342 6.76 7.063 6.5 7.875 6.5C9.324 6.5 10.5 7.30889 10.5 8.30556Z" fill="white"/>
                  </svg>
                  <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Data Ikan</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
               </a>
               <ul id="ikan" class="hidden py-2 px-5 space-y-2">
                  <li>
                     <a href="/fish/disease" class="nav-link flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="ms-3">Penyakit ikan</span>
                     </a>
                  </li>
                  <li>
                     <a href="/fish" class="nav-link flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="ms-3">Fish</span>
                     </a>
                  </li>
               </ul>
            </li>
            <li>
            <a href="/product" class="nav-link flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg width="20" height="20" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path class="fill-black" d="M14 0H0V4.10526H0.7V11.6316C0.7 11.9945 0.8475 12.3426 1.11005 12.5992C1.3726 12.8558 1.7287 13 2.1 13H11.9C12.2713 13 12.6274 12.8558 12.8899 12.5992C13.1525 12.3426 13.3 11.9945 13.3 11.6316V4.10526H14V0ZM1.4 1.36842H12.6V2.73684H1.4V1.36842ZM11.9 11.6316H2.1V4.10526H11.9V11.6316ZM4.9 5.47368H9.1C9.1 5.83661 8.9525 6.18468 8.68995 6.4413C8.4274 6.69793 8.0713 6.84211 7.7 6.84211H6.3C5.9287 6.84211 5.5726 6.69793 5.31005 6.4413C5.0475 6.18468 4.9 5.83661 4.9 5.47368Z" fill="white"/>
               </svg>
               <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Produk</span>
            </a>
            </li>
            <li>
              <a href="/article" class="nav-link flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                 <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.2583 5.8668C16.975 6.15013 16.7 6.42513 16.6917 6.70013C16.6667 6.9668 16.95 7.2418 17.2167 7.50013C17.6167 7.9168 18.0083 8.2918 17.9917 8.70013C17.975 9.10846 17.55 9.53346 17.125 9.95013L13.6833 13.4001L12.5 12.2168L16.0417 8.68346L15.2417 7.88346L14.0583 9.05846L10.9333 5.93346L14.1333 2.7418C14.4583 2.4168 15 2.4168 15.3083 2.7418L17.2583 4.6918C17.5833 5.00013 17.5833 5.5418 17.2583 5.8668ZM2.5 14.3751L10.4667 6.40013L13.5917 9.52513L5.625 17.5001H2.5V14.3751Z" fill="black"/>
                 </svg>
                 <span class="ms-3">Artikel</span>
               </a>
            </li>
        </ul>
      </div>
   </aside>

   {{$slot}}
  
   
   </body>
</html>

<script>
   document.addEventListener('DOMContentLoaded', () => {
      const navLinks = document.querySelectorAll('.nav-link');
      const currentUrl = window.location.pathname;

      navLinks.forEach(link => {
         if (link.getAttribute('href') === currentUrl) {
            link.classList.add('selected');
         }
      });

      const dropdownLinks = document.querySelectorAll('#ikan .nav-link');
      const dropdownMenu = document.getElementById('ikan');

      dropdownLinks.forEach(link => {
         if (link.getAttribute('href') === currentUrl) {
            dropdownMenu.classList.add('block');
            dropdownMenu.classList.remove('hidden');
         }
      });
   });
</script>