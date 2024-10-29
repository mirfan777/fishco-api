<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fish</title>
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @include('pages.fish.fish.modals.create')
    @include('layout.main')
    
    <main class="sm:ml-64 min-h-screen bg-gray-50">
        <section class="dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto w-full h-full px-4 lg:px-12">
                <h2 class="text-title-md2 font-bold text-black dark:text-white mb-6">Fish Table</h2>
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

    <script>
        let currentPage = 1;
        let currentSearch = '';

        // Fetch fish data with search and pagination
        const fetchFishData = (page = 1, query = '') => {
            currentPage = page;
            currentSearch = query;
            
            $.ajax({
                url: `/api/fish?page=${page}&search=${query}`,
                method: 'GET',
                success: function(response) {
                    const fishTable = $('#fishTable');
                    fishTable.empty();
                    
                    if (response.data && response.data.length > 0) {
                        response.data.forEach(fish => {
                            fishTable.append(`
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">${fish.name}</td>
                                    <td class="px-4 py-3">${fish.species}</td>
                                    <td class="px-4 py-3">${fish.habitat}</td>
                                    <td class="px-4 py-3">${fish.food_type}</td>
                                    <td class="px-4 py-3">
                                        <a href="/fish/detail/?id=${fish.id}" class="bg-blue-500 text-white font-bold py-1 px-2 rounded">Detail</a>
                                        <button class="bg-red-500 text-white font-bold py-1 px-2 rounded">Hapus</button>
                                    </td>
                                </tr>
                            `);
                        });
                        
                        renderPagination(response.meta);
                    } else {
                        fishTable.append(`
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-center">No data found</td>
                            </tr>
                        `);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                    $('#fishTable').html(`
                        <tr>
                            <td colspan="5" class="px-4 py-3 text-center text-red-500">Error loading data</td>
                        </tr>
                    `);
                }
            });
        };

        // Render pagination links
        const renderPagination = (meta) => {
            const pagination = $('#pagination');
            const paginationInfo = $('#pagination-info');
            
            // Update pagination info
            paginationInfo.html(`
                Showing <span class="font-semibold text-gray-900 dark:text-white">${meta.from}-${meta.to}</span> of 
                <span class="font-semibold text-gray-900 dark:text-white">${meta.total}</span>
            `);

            pagination.empty();

            // Previous page button
            pagination.append(`
                <li>
                    <button onclick="fetchFishData(${meta.current_page - 1}, '${currentSearch}')" 
                            class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg ${meta.current_page === 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-100'}"
                            ${meta.current_page === 1 ? 'disabled' : ''}>
                        Previous
                    </button>
                </li>
            `);

            // Page numbers
            meta.links.slice(1, -1).forEach(link => {
                pagination.append(`
                    <li>
                        <button onclick="fetchFishData(${link.label}, '${currentSearch}')" 
                                class="px-3 py-2 leading-tight ${link.active 
                                    ? 'text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700' 
                                    : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100'}">
                            ${link.label}
                        </button>
                    </li>
                `);
            });

            // Next page button
            pagination.append(`
                <li>
                    <button onclick="fetchFishData(${meta.current_page + 1}, '${currentSearch}')" 
                            class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg ${meta.current_page === meta.last_page ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-100'}"
                            ${meta.current_page === meta.last_page ? 'disabled' : ''}>
                        Next
                    </button>
                </li>
            `);
        };

        // Live search with debounce
        let searchTimeout;
        $('#searchForm').on('input', function() {
            const query = $(this).find('input[name="search"]').val();
            
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                fetchFishData(1, query);
            }, 300);
        });

        // Initial fetch
        fetchFishData();
    </script>
</body>
</html>