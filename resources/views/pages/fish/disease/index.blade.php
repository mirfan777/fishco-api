<x-layout.main>
        <!-- Modals etc -->
        @include('pages.fish.disease.modals.create')
        @include('pages.fish.disease.modals.edit')       
        <main class="sm:ml-64 min-h-screen bg-gray-50 pt-10 mt-5">
            <section class="dark:bg-gray-900 p-3 sm:p-5">
                <div class="mx-auto w-full h-full px-4 lg:px-12">
                    <h2 class="text-title-md2 font-bold text-black dark:text-white mb-6" style="font-size: 24px;">Tabel Penyakit Ikan</h2>
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <!-- Bagian Pencarian dan Tombol Tambah Data -->
                        <div class="flex flex-col md:flex-row items-center justify-between p-4 space-y-3 md:space-y-0 md:space-x-4">
                            <!-- Tombol Tambah Data -->
                            <div class="w-full md:w-auto">
                                <button data-modal-target="create-disease" data-modal-toggle="create-disease" class="bg-[#0278c7] hover:bg-[#0362a1] text-white font-medium rounded-lg text-sm px-5 py-2.5">Tambah data</button>
                            </div>
                        </div>
                        
                        <!-- Tabel Data Penyakit -->
                        <div class="overflow-x-auto p-5">
                            <table class="w-full text-sm text-left text-gray-500 " id="disease-table" >
                                <thead class="bg-gray-50 text-gray-700 uppercase text-xs dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">
                                            <span class="flex items-center">
                                                disease name
                                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                                </svg>
                                            </span>
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            <span class="flex items-center">
                                                disease type
                                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                                </svg>
                                            </span>
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            <span class="flex items-center">
                                                cause agent
                                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                                </svg>
                                            </span>
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            <span class="flex items-center">
                                                affected part
                                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                                </svg>
                                            </span>
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            <span class="flex items-center">
                                                affected fish
                                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                                </svg>
                                            </span>
                                        </th>           
                                        <th scope="col" class="px-4 py-3">Action</th>
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
</x-layout.main>

<script>
    let currentDiseaseId = null;
    let dataTable;

    const initializeModalPosition = () => {
        $('#edit-disease').removeClass('hidden').addClass('flex').css({
            'justify-content': 'center',
            'align-items': 'center'
            
        });
    };

    const initializeDataTable = () => {
        if (dataTable) {
            dataTable.destroy(); // Destroy previous instance if it exists
        }

        dataTable = new simpleDatatables.DataTable("#disease-table", {
            searchable: true,
            paging: true,
            perPage: 5,
            perPageSelect: [5, 10, 15, 20, 25],
            sortable: true
        });
    };

    $('#create-affected-fish').select2({
        placeholder: 'Pilih ikan yang terpengaruh',
        width: '100%'
    });

    // Fetch data dari API menggunakan AJAX
    $.ajax({
        url: '/api/fishes',
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        success: function(response) {
            // Memasukkan data ikan ke dalam select option
            if (response.data && response.data.length > 0) {
                response.data.forEach(fish => {
                    $('#create-affected-fish').append(new Option(fish.name, fish.id));
                });
            }
        },
        error: function(xhr, status, error) {
            console.error("API Error:", error);
        }
    });

    const fetchDiseaseData = () => {
        $.ajax({
            url: `/api/diseases`,
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem('token'),
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log("API Response:", response);

                const diseaseTableBody = $('#disease-table tbody'); // Target the tbody directly
                diseaseTableBody.empty();

                if (response.data && response.data.length > 0) {
                    response.data.forEach(disease => {
                        const fishNames = disease.affected_fish.map(fish => fish.name).join(' , ');

                        diseaseTableBody.append(`
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">${disease.name}</td>
                                <td class="px-4 py-3">${disease.type}</td>
                                <td class="px-4 py-3">${disease.cause_agent}</td>
                                <td class="px-4 py-3">${disease.affected_part}</td>
                                <td class="px-4 py-3">${fishNames}</td>
                                <td class="px-4 py-3">
                                    <button data-modal-target="edit-disease" data-modal-toggle="edit-disease" onclick="fetchDiseaseDataById(${disease.id})" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-1 px-2 rounded">Edit</button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded" onclick="confirmDelete(${disease.id})">Hapus</button>
                                </td>
                            </tr>
                        `);
                    });
                } else {
                    diseaseTableBody.append(`
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
                $('#disease-table tbody').html(`
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
                        url: `/api/disease/delete/${id}`,
                        type: 'DELETE',
                        processData: false,
                        contentType: false,
                        headers: { 
                            'Authorization': `Bearer ${localStorage.getItem('token')}`,
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Accept': 'application/json',
                        },
                        success: function(result) {
                            Swal.fire({
                                title: 'Terhapus!',
                                text: 'Penyakit ikan berhasil dihapus.',
                                icon: 'success',
                                timer: 1200, 
                                showConfirmButton: false
                            }).then(() => {
                                location.reload(); // Reload the page to reflect changes
                            });
                        },
                        error: function(err) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Gagal untuk menghapus penyakit ikan, silahkan coba lagi',
                                icon: 'error',
                                timer: 1200, 
                                showConfirmButton: false
                            });
                        }
                    });
                }
            });
        }

    const fetchDiseaseDataById = (id) => {
        $.ajax({
            url: `/api/disease/${id}`,
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem('token'),
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log("API Response:", response); 
                $('#edit-disease-name').val(response.data.name);
                $('#edit-disease-symptoms').val(response.data.symptoms);
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

    // Fetch data and initialize table on page load
    fetchDiseaseData();
</script>

