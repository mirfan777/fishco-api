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
                                            nama penyakit
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="flex items-center">
                                            tipe penyakit
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="flex items-center">
                                            penyebab
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="flex items-center">
                                            bagian yang terkena
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="flex items-center">
                                            ikan yang terdampak
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

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    let currentDiseaseId = null;
    let dataTable;

    const affectedPartsMap = {
        fins: 'Sirip',
        gills: 'Insang',
        scales: 'Sisik',
        head: 'Kepala',
        swimming: 'Cara Berenang',
        weight: 'Berat',
        body: 'Tubuh',
        tail: 'Ekor',
        eyes: 'Mata',
        mouth: 'Mulut',
        behaviour: 'Perilaku'
    };

    $('#edit-affected-fish, #create-affected-fish').select2({
        placeholder: 'Masukan Ikan',
        allowClear: true
    });

    $('#edit-products, #create-products').select2({
        placeholder: 'Masukan Produk',
        allowClear: true
    });

    const initializeDataTable = () => {
        if (dataTable) {
            dataTable.destroy(); 
        }

        dataTable = new simpleDatatables.DataTable("#disease-table", {
            searchable: true,
            paging: true,
            perPage: 5,
            perPageSelect: [5, 10, 15, 20, 25],
            sortable: true
        });
    };

    $.ajax({
            url: '/api/products',
            type: 'GET',
            headers: { 
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json',
            },
            success: function(response) {
                const productSelect = $('#create-products');
                response.data.forEach(product => {
                    productSelect.append(new Option(product.name, product.id));
                });
            }
        });

        $.ajax({
            url: '/api/fishes',
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            },
            success: function(response) {
                const fishSelect = $('#create-affected-fish');
                response.forEach(fish => {
                    fishSelect.append(new Option(fish.name, fish.id));
                });
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
                        let fishNames = disease.affected_fish.map(fish => fish.name).join(' , ');
                        let affectedParts = disease.affected_part.split(',').map(part => affectedPartsMap[part.trim()] || part.trim()).join(', ');

                        if (!fishNames) {
                            fishNames = '<i>NULL</i>';
                        }

                        if (!affectedParts) {
                            affectedParts = '<i>NULL</i>';
                        }

                        diseaseTableBody.append(`
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">${disease.name}</td>
                                <td class="px-4 py-3">${disease.disease_type}</td>
                                <td class="px-4 py-3">${disease.cause_agent}</td>
                                <td class="px-4 py-3">${affectedParts}</td>
                                <td class="px-4 py-3">${fishNames}</td>
                                <td class="px-4 py-3">
                                    <div class="flex space-x-1">
                                        <button data-modal-target="edit-disease" data-modal-toggle="edit-disease" onclick="fetchDiseaseDataById(${disease.id})" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-1 px-2 rounded">Edit</button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded" onclick="confirmDelete(${disease.id})">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        `);
                    });
                } else {
                    diseaseTableBody.append(`
                        <tr>
                            <td colspan="6" class="px-4 py-3 text-center">Data tidak ditemukan</td>
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
                        <td colspan="6" class="px-4 py-3 text-center">Data tidak ditemukan</td>
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
                                location.reload(); 
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
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(response) {
                    currentDiseaseId = response.data.id;

                    // Populate the form fields with the response data
                    $('#edit-disease-name').val(response.data.name);
                    $('#edit-disease-type').val(response.data.disease_type);
                    $('#edit-cause-agent').val(response.data.cause_agent);
                    $('#edit-description').val(response.data.description);
                    $('#edit-symptom').val(response.data.symptoms);
                    $('#edit-prevention').val(response.data.prevention);
                    $('#edit-note').val(response.data.note);

                    // Fetch and populate affected fish options
                    $.ajax({
                        url: '/api/fishes',
                        method: 'GET',
                        headers: {
                            'Accept': 'application/json',
                            'Authorization': `Bearer ${localStorage.getItem('token')}`,
                        },
                        success: function(fishResponse) {
                            const editFishSelect = $('#edit-affected-fish');
                            editFishSelect.empty(); // Clear current options
                            fishResponse.forEach(fish => {
                                const isSelected = response.data.affected_fish.some(selectedFish => selectedFish.id === fish.id);
                                const option = new Option(fish.name, fish.id, isSelected, isSelected);
                                editFishSelect.append(option);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching fishes:', error);
                        },
                    });

                    // Fetch and populate product recommendations
                    $.ajax({
                        url: '/api/products',
                        method: 'GET',
                        headers: {
                            'Accept': 'application/json',
                            'Authorization': `Bearer ${localStorage.getItem('token')}`,
                        },
                        success: function(productResponse) {
                            const editProductSelect = $('#edit-products');
                            editProductSelect.empty(); // Clear current options
                            productResponse.data.forEach(product => {
                                const isSelected = response.data.products_recommendation.some(
                                    selectedProduct => selectedProduct.id === product.id
                                );
                                const option = new Option(product.name, product.id, isSelected, isSelected);
                                editProductSelect.append(option);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching products:', error);
                        },
                    });

                    // Update affected parts checkboxes
                    $('input[name="edit-affected_parts[]"]').prop('checked', false); // Uncheck all
                    if (response.data.affected_part) {
                        response.data.affected_part.split(',').forEach(part => {
                            $(`input[name="edit-affected_parts[]"][value="${part.trim()}"]`).prop('checked', true);
                        });
                    }

                    // Show modal (adjust based on your library or framework)
                    const modalElement = document.getElementById('edit-disease');
                    if (modalElement) {
                        modalElement.classList.remove('hidden'); // Show modal
                        modalElement.classList.add('flex');     // Ensure proper alignment
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching disease data:', error);
                },
            });
        };

    // Fetch data and initialize table on page load
    fetchDiseaseData();
</script>