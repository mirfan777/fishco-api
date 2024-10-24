<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      Form Elements | TailAdmin - Tailwind CSS Admin Dashboard Template
    </title>
    @vite(['resources/css/style.css' , 'resources/css/satoshi.css' , 'resources/js/app.js'])
  </head>

  <body
    x-data="{ page: 'formElements', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
          darkMode = JSON.parse(localStorage.getItem('darkMode'));
          $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}"
  >
    @include('pages.fish.fish.modals.upload-image')
    @include('pages.fish.fish.modals.edit')
    @include('pages.fish.fish.modals.delete')
    <!-- ===== Preloader Start ===== -->
    @include('partials.preloader')
    <!-- ===== Preloader End ===== -->

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
      <!-- ===== Sidebar Start ===== -->
      @include('partials.sidebar')
      <!-- ===== Sidebar End ===== -->

      <!-- ===== Content Area Start ===== -->
      <div
        class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden"
      >
        <!-- ===== Header Start ===== -->
        @include('partials.header')
        <!-- ===== Header End ===== -->

        <!-- ===== Main Content Start ===== -->
        <main>
          <div class="flex flex-col lg:flex-row gap-2 mb-5 lg:p-20 p-2">
            <div class="lg:w-60 lg:h-60 w-full h-full mx-10">
              <img class="rounded-lg w-full h-full lg:w-60 lg:h-60" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="alt">
            </div>
            <div class=" flex flex-col justify-center ">
              <h1 class="text-title text-4xl">Title</h1>
              <div class="flex flex-col gap-5 md:flex-row md:gap-56">
                <!-- Taxonomy Section -->
                <div class="flex flex-col gap-2 ">
                  <h2 class="text-title text-xl font-bold">Taxonomy</h2>
                  <div class="flex ">
                    <p class="w-40">Kingdom</p>
                    <p>: lorem</p>
                  </div>
                  <div class="flex">
                    <p class="w-40">Phylum</p>
                    <p>: lorem</p>
                  </div>
                  <div class="flex">
                    <p class="w-40">Class</p>
                    <p>: lorem</p>
                  </div>
                  <div class="flex">
                    <p class="w-40">Order</p>
                    <p>: lorem</p>
                  </div>
                  <div class="flex">
                    <p class="w-40">Family</p>
                    <p>: lorem</p>
                  </div>
                  <div class="flex">
                    <p class="w-40">Genus</p>
                    <p>: lorem</p>
                  </div>
                  <div class="flex">
                    <p class="w-40">Species</p>
                    <p>: lorem</p>
                  </div>
                  <div class="flex">
                    <p class="w-40">Colour</p>
                    <p>: lorem</p>
                  </div>
                </div>
            
                <!-- Foods, Habitat, and Water Conditions Section -->
                <div class="flex flex-col gap-2 ">
                  <h2 class="text-title text-xl font-bold">Foods</h2>
                  <div class="flex">
                    <p class="w-40">Type</p>
                    <p>: lorem</p>
                  </div>
                  <div class="flex">
                    <p class="w-40">Food</p>
                    <p>: lorem</p>
                  </div>
                  <h2 class="text-title text-xl font-bold">Habitat</h2>
                  <div class="flex">
                    <p class="w-40">Type</p>
                    <p>: lorem</p>
                  </div>
                  <h2 class="text-title text-xl font-bold">Water Conditions</h2>
                  <div class="flex">
                    <p class="w-40">Temperature</p>
                    <p>: 1°C - 12°C</p>
                  </div>
                  <div class="flex">
                    <p class="w-40">pH</p>
                    <p>: 12 - 14</p>
                  </div>
                </div>
              </div>
            
              <!-- Overview Section -->
              <div class="mt-5">
                <h2 class="text-title text-xl font-bold">Overview</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure saepe facilis consequuntur similique, repellendus deleniti pariatur beatae corporis omnis est totam non aliquid tempora culpa doloribus quibusdam voluptas natus provident..</p>
              </div>

              <div class="flex gap-5 mt-5">
                <button data-modal-target="edit-fish" data-modal-toggle="edit-fish" class="w-fit block text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800" type="button">
                  Edit data
                </button>
                <button data-modal-target="upload-image" data-modal-toggle="upload-image" class="w-fit block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                  Tambah data foto
                </button>
                <button data-modal-target="delete-fish" data-modal-toggle="delete-fish" class="block text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">
                  Hapus data
                </button>
              </div>
            </div>
            
          </div>

        <ul class="flex flex-wrap lg:px-20 p-2 text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <li class="me-2">
                <a href="#" aria-current="page" class="inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500">Ikan Sehat</a>
            </li>
            <li class="me-2">
                <a href="#" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Ikan Sakit</a>
            </li>
        </ul>
        


          <div class="grid grid-cols-2 md:grid-cols-6 gap-4 lg:p-20 p-2">
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-6.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-7.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-8.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-9.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-10.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg" alt="">
            </div>
          </div>

        </main>
        <!-- ===== Main Content End ===== -->
      </div>
      <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->

  </body>
</html>
