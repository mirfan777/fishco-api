<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      Form Layout | TailAdmin - Tailwind CSS Admin Dashboard Template
    </title>
    @vite(['resources/css/style.css'  , 'resources/js/app.js'])
  </head>

  <body>
        @include('layout.main')

        <main class="sm:ml-64 min-h-screen bg-gray-50 pt-10 mt-5"> 
          <section class="dark:bg-gray-900 p-3 sm:p-5">
              <div class="mx-auto w-full h-full px-4 lg:px-12">
                  <h2 class="text-title-md2 font-bold text-black dark:text-white mb-6" style="font-size: 24px;">Fish Table</h2>
                  <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                      <div class="flex flex-col md:flex-row items-center justify-between p-4 space-y-3 md:space-y-0 md:space-x-4">
                          <div class="w-full md:w-1/2">
                              <form id="searchForm" class="flex items-center">
                                  <label for="simple-search" class="sr-only">Search</label>
                                  <input type="text" id="simple-search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full pl-10 p-2" placeholder="Search">
                              </form>
                          </div>
                          <div class="w-full md:w-auto">
                              <button data-modal-target="create-fish" data-modal-toggle="create-fish" class="bg-blue-700 text-white font-medium rounded-lg text-sm px-5 py-2.5">Tambah data</button>
                          </div>
                      </div>
                      <div class="overflow-x-auto">
                          <table class="w-full text-sm text-left text-gray-500">
                              <thead class="bg-gray-50 text-gray-700 uppercase text-xs dark:bg-gray-700 dark:text-gray-400">
                                  <tr>
                                      <th class="px-4 py-3">Fish name</th>
                                      <th class="px-4 py-3">Species</th>
                                      <th class="px-4 py-3">Habitat</th>
                                      <th class="px-4 py-3">Food Type</th>
                                      <th class="px-4 py-3">Action</th>
                                  </tr>
                              </thead>
                              <tbody id="fishTable" class="bg-white dark:bg-gray-800">
                                  <!-- Rows will be populated dynamically -->
                              </tbody>
                          </table>
                      </div>
                      <nav class="flex items-center justify-between p-4" aria-label="Table navigation">
                          <span class="text-sm font-normal text-gray-500 dark:text-gray-400" id="pagination-info">
                              <!-- Pagination info will be populated dynamically -->
                          </span>
                          <ul class="inline-flex items-center -space-x-px" id="pagination">
                              <!-- Pagination will be populated dynamically -->
                          </ul>
                      </nav>
                  </div>
              </div>
          </section>
      </main>
  </body>
</html>
