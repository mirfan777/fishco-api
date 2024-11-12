<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Medicine</title>
        <!-- Menyertakan file CSS dan JavaScript dari Vite -->
        @vite(['resources/css/style.css', 'resources/js/app.js'])
        <!-- Library jQuery dan SweetAlert2 untuk keperluan interaksi dan notifikasi -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <!-- Menyertakan modal untuk form "Tambah Data Penyakit" -->
        @include('pages.fish.medicine.modals.create')
        @include('pages.fish.medicine.modals.edit')
        <!-- Menyertakan layout utama -->
        @include('layout.main')
        
        <main class="sm:ml-64 min-h-screen bg-gray-50 pt-10 mt-5">
            <section class="dark:bg-gray-900 p-3 sm:p-5">
                <div class="mx-auto w-full h-full px-4 lg:px-12">
                    <h2 class="text-title-md2 font-bold text-black dark:text-white mb-6" style="font-size: 24px;">Tabel Obat Ikan</h2>
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <!-- Bagian Pencarian dan Tombol Tambah Data -->
                        <div class="flex flex-col md:flex-row items-center justify-between p-4 space-y-3 md:space-y-0 md:space-x-4">
                            <!-- Tombol Tambah Data -->
                            <div class="w-full md:w-auto">
                                <button data-modal-target="create-medicine" data-modal-toggle="create-medicine" class="bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg text-sm px-5 py-2.5">Tambah data</button>
                            </div>
                        </div>
                        

                        <!-- Tabel Data Penyakit -->
                        <div class="overflow-x-auto p-5">
                            <table class="w-full text-sm text-left text-gray-500 " id="medicine-table" >
                                <thead class="bg-gray-50 text-gray-700 uppercase text-xs dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">
                                            <span class="flex items-center">
                                                Nama Obat
                                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                                </svg>
                                            </span>
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            <span class="flex items-center">
                                                Deskripsi Obat
                                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                                </svg>
                                            </span>
                                        </th>
                                        <th scope="col" class="px-4 py-3">Aksi</th>
                                    </tr> 
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </main> 
    </body>
</html>

<script>
    let currentMedicineId = null;
    let dataTable;

    const initializeModalPosition = () => {
        $('#edit-medicine').removeClass('hidden').addClass('flex').css({
            'justify-content': 'center',
            'align-items': 'center'
        });
    };

    const initializeDataTable = () => {
        if (dataTable) {
            dataTable.destroy(); // Destroy previous instance if it exists
        }

        dataTable = new simpleDatatables.DataTable("#medicine-table", {
            searchable: true,
            paging: true,
            perPage: 5,
            perPageSelect: [5, 10, 15, 20, 25],
            sortable: true
        });
    };

    function populateDropdowns(diseaseId = null, fishId = null) {

        $.ajax({
            url: '/api/diseases',
            type: 'GET',
            success: function(data) {
                const diseaseDropdown = $('#edit-disease-id');
                diseaseDropdown.empty();
                diseaseDropdown.append('<option value="">Select Disease</option>');
                data.forEach(function(disease) {
                    const isSelected = diseaseId === disease.id ? 'selected' : '';
                    diseaseDropdown.append(`<option value="${disease.id}" ${isSelected}>${disease.name}</option>`);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching diseases:', error);
            }
        });

        // Populate Fish Dropdown
        $.ajax({
            url: '/api/fishes',
            type: 'GET',
            success: function(data) {
                const fishDropdown = $('#edit-fish-id');
                fishDropdown.empty();
                fishDropdown.append('<option value="">Select Fish</option>');
                data.forEach(function(fish) {
                    const isSelected = fishId === fish.id ? 'selected' : '';
                    fishDropdown.append(`<option value="${fish.id}" ${isSelected}>${fish.name}</option>`);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching fishes:', error);
            }
        });
    }


    const fetchMedicineDataById = (id) => {
        $.ajax({
            url: `/api/medicine/${id}`,
            method: 'GET',
            success: function(response) {
                
                $('#edit-medicine-name').val(response.data.name);
                $('#edit-medicine-description').val(response.data.description);
                
                populateDropdowns(response.data.disease_id, response.data.fish_id);

                currentMedicineId = id;
                initializeModalPosition();
                $('#edit-medicine').show();
            },
            error: function(xhr, status, error) {
                console.error("API Error:", error); 
            }
        });
    };
    
    const fetchMedicineData = () => {
        $.ajax({
            url: `/api/medicines`,
            method: 'GET',
            success: function(response) {
                console.log("API Response:", response);

                const medicineTableBody = $('#medicine-table tbody'); // Target the tbody directly
                medicineTableBody.empty();

                if (response.data && response.data.length > 0) {
                    response.data.forEach(medicine => {
                        medicineTableBody.append(`
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">${medicine.name}</td>
                                <td class="px-4 py-3">${medicine.description}</td>
                                <td class="px-4 py-3">
                                    <button data-modal-target="edit-medicine" data-modal-toggle="edit-medicine" onclick="fetchMedicineDataById(${medicine.id})" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-1 px-2 rounded">Edit</button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded" onclick="confirmDelete(${medicine.id})">Hapus</button>
                                </td>
                            </tr>
                        `);
                    });
                } else {
                    medicineTableBody.append(`
                        <tr>
                            <td colspan="3" class="px-4 py-3 text-center">Data tidak ditemukan</td>
                        </tr>
                    `);
                }

                // Reinitialize DataTable after updating the content
                initializeDataTable();
            },
            error: function(xhr, status, error) {
                console.error("API Error:", error);
                $('#medicine-table tbody').html(`
                    <tr>
                        <td colspan="3" class="px-4 py-3 text-center">Data tidak ditemukan</td>
                    </tr>
                `);
            }
        });
    };

    function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah kamu yakin untuk menghapus?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0e91e9',
                cancelButtonColor: '#f56565',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/api/medicine/delete/${id}`,
                        type: 'DELETE',
                        success: function(result) {
                            Swal.fire({
                                title: 'Terhapus!',
                                text: 'Obat ikan berhasil dihapus.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                location.reload(); // Reload the page to reflect changes
                            });
                        },
                        error: function(err) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Gagal untuk menghapus obat ikan, silahkan coba lagi',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        }

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
                <button onclick="fetchMedicineData(${meta.current_page - 1}, '${currentSearch}')" 
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
                    <button onclick="fetchMedicineData(${link.label}, '${currentSearch}')" 
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
                <button onclick="fetchMedicineData(${meta.current_page + 1}, '${currentSearch}')" 
                        class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg ${meta.current_page === meta.last_page ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-100'}"
                        ${meta.current_page === meta.last_page ? 'disabled' : ''}>
                    Next
                </button>
            </li>
        `);
    };

    fetchMedicineData();

    $('#searchForm').on('submit', function(e) {
        e.preventDefault();
        const query = $('#simple-search').val();
        fetchMedicineData(1, query);
    });
</script>
