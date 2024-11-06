<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disease</title>
    <!-- Menyertakan file CSS dan JavaScript dari Vite -->
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <!-- Library jQuery dan SweetAlert2 untuk keperluan interaksi dan notifikasi -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <!-- Menyertakan modal untuk form "Tambah Data Penyakit" -->
    @include('pages.fish.disease.modals.create')
    @include('pages.fish.disease.modals.edit')
    <!-- Menyertakan layout utama -->
    @include('layout.main')
    
    <main class="sm:ml-64 min-h-screen bg-gray-50 pt-10 mt-5">
        <section class="dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto w-full h-full px-4 lg:px-12">
                <h2 class="text-title-md2 font-bold text-black dark:text-white mb-6" style="font-size: 24px;">Disease Table</h2>
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <!-- Bagian Pencarian dan Tombol Tambah Data -->
                    <div class="flex flex-col md:flex-row items-center justify-between p-4 space-y-3 md:space-y-0 md:space-x-4">
                        <!-- Form Pencarian -->
                        <div class="w-full md:w-1/2">
                            <form id="searchForm" class="flex items-center" onsubmit="handleSearch(event)">
                                <label for="simple-search" class="sr-only">Cari</label>
                                <input type="text" id="simple-search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full pl-10 p-2" placeholder="Cari penyakit">
                            </form>
                        </div>
                        <!-- Tombol Tambah Data -->
                        <div class="w-full md:w-auto">
                            <button data-modal-target="create-disease" data-modal-toggle="create-disease" class="bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg text-sm px-5 py-2.5">Tambah data</button>
                        </div>
                    </div>

                    <!-- Tabel Data Penyakit -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="bg-gray-50 text-gray-700 uppercase text-xs dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Disease Name</th>
                                    <th scope="col" class="px-4 py-3">Symptoms</th>
                                    <th scope="col" class="px-4 py-3">Action</th>
                                </tr> 
                            </thead>
                            <tbody id="diseaseTable" class="bg-white dark:bg-gray-800">
                                <!-- Baris data akan dimuat secara dinamis dengan JavaScript -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Navigasi Pagination -->
                    <nav class="flex items-center justify-between p-4" aria-label="Navigasi Tabel">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400" id="pagination-info">
                            <!-- Info halaman akan dimuat secara dinamis -->
                        </span>
                        <ul class="inline-flex items-center -space-x-px" id="pagination">
                            <!-- Tombol pagination akan dimuat secara dinamis -->
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </main>

    
    
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let currentPage = 1;
let currentSearch = '';
let currentDiseaseId = null;

const initializeModalPosition = () => {
    $('#edit-disease').removeClass('hidden').addClass('flex').css({
        'justify-content': 'center',
        'align-items': 'center'
    });
};

const fetchDiseaseDataById = (id) => {
    $.ajax({
        url: `/api/disease/${id}`,
        method: 'GET',
        success: function(response) {
            console.log("API Response:", response); 
            $('#edit-disease-name').val(response.data.name);
            $('#edit-symptoms').val(response.data.symptoms);
            $('#edit-disease-description').val(response.data.description);

            currentDiseaseId = id;
            initializeModalPosition(); // Ensure modal is centered
            $('#edit-disease').show();
        },
        error: function(xhr, status, error) {
            console.error("API Error:", error); // Debug: Log error details
        }
    });
};

const fetchDiseaseData = (page = 1, query = '' ) => {
    currentPage = page;
    currentSearch = query;

    $.ajax({
        url: `/api/disease?page=${page}&search=${query}`,
        method: 'GET',
        success: function(response) {
            console.log("API Response:", response); // Debug: Log entire response

            const diseaseTable = $('#diseaseTable');
            diseaseTable.empty();

            // Ensure response structure is as expected
            if (response.data && response.data.length > 0) {
                response.data.forEach(disease => {
                    diseaseTable.append(`
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-3">${disease.name}</td>
                            <td class="px-4 py-3">${disease.symptoms}</td>
                            <td class="px-4 py-3">
                                <button data-modal-target="edit-disease" data-modal-toggle="edit-disease" onclick="fetchDiseaseDataById(${disease.id})" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-1 px-2 rounded">Edit</button>
                                <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded">Hapus</button>
                            </td>
                        </tr>
                    `);
                });

                renderPagination(response.meta);
            } else {
                diseaseTable.append(`
                    <tr>
                        <td colspan="3" class="px-4 py-3 text-center">Data tidak ditemukan</td>
                    </tr>
                `);
            }
        },
        error: function(xhr, status, error) {
            console.error("API Error:", error); // Debug: Log error details
            $('#diseaseTable').html(`
                <tr>
                    <td colspan="3" class="px-4 py-3 text-center text-red-500">Gagal memuat data</td>
                </tr>
            `);
        }
    });
};

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
            <button onclick="fetchDiseaseData(${meta.current_page - 1}, '${currentSearch}')" 
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
                <button onclick="fetchDiseaseData(${link.label}, '${currentSearch}')" 
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
            <button onclick="fetchDiseaseData(${meta.current_page + 1}, '${currentSearch}')" 
                    class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg ${meta.current_page === meta.last_page ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-100'}"
                    ${meta.current_page === meta.last_page ? 'disabled' : ''}>
                Next
            </button>
        </li>
    `);
};

fetchDiseaseData();

$('#searchForm').on('submit', function(e) {
    e.preventDefault();
    const query = $('#simple-search').val();
    fetchDiseaseData(1, query);
});
</script>
</html>
