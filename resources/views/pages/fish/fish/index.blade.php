<x-layout.main>
    @include('pages.fish.fish.modals.create')

    <main class="sm:ml-64 min-h-screen bg-gray-50 pt-10 mt-5">
        <section class="dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto w-full h-full px-4 lg:px-12">
                <h2 class="text-title-md2 font-bold text-black dark:text-white mb-6" style="font-size: 24px;">Tabel Ikan</h2>
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <!-- Bagian Pencarian dan Tombol Tambah Data -->
                    <div class="flex flex-col md:flex-row items-center justify-between p-4 space-y-3 md:space-y-0 md:space-x-4">
                        <!-- Tombol Tambah Data -->
                        <div class="w-full md:w-auto">
                            <button data-modal-target="create-fish" data-modal-toggle="create-fish" class="bg-[#0278c7] hover:bg-[#0362a1] text-white font-medium rounded-lg text-sm px-5 py-2.5">Tambah data</button>
                        </div>
                    </div>
                    
                    <!-- Tabel Data Fish -->
                    <div class="overflow-x-auto p-5">
                        <table class="w-full text-sm text-left text-gray-500 " id="fish-table" >
                            <thead class="bg-gray-50 text-gray-700 uppercase text-xs dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="flex items-center">
                                            Nama Ikan
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="flex items-center">
                                            Species
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="flex items-center">
                                            Habitat
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="flex items-center">
                                            Jenis Makanan
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
</x-layout.main>

<script>
    let currentPage = 1;
    let currentFishId = null;
    let dataTable;

    const initializeModalPosition = () => {
        $('#edit-fish').removeClass('hidden').addClass('flex').css({
            'justify-content': 'center',
            'align-items': 'center'
        });
    };

        
    const initializeDataTable = () => {
        if (dataTable) {
            dataTable.destroy();
        }

        dataTable = new simpleDatatables.DataTable("#fish-table", {
            searchable: true,
            paging: true,
            perPage: 5,
            perPageSelect: [5, 10, 15, 20, 25],
            sortable: true
        });
    };

    const fetchFishData = () => {
        $.ajax({
            url: `/api/fishes`,
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem('token'),
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
            console.log("API Response:", response);

            const fishTableBody = $('#fish-table tbody'); // Target the tbody directly
            fishTableBody.empty();

            if (response && response.length > 0) {
                response.forEach(fish => {
                    // Check if habitat and food_type are defined
                    const habitat = fish.habitat !== undefined ? fish.habitat : 'N/A';
                    const foodType = fish.food_type !== undefined ? fish.food_type : 'N/A';

                    fishTableBody.append(`
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-3">${fish.name}</td>
                            <td class="px-4 py-3">${fish.species}</td>
                            <td class="px-4 py-3">${habitat}</td>
                            <td class="px-4 py-3">${foodType}</td>
                            <td class="px-4 py-3">
                                <a href="/fish/detail/?id=${fish.id}" class="bg-blue-500 text-white font-bold py-1 px-2 rounded">Detail</a>
                                <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded" onclick="confirmDelete(${fish.id})">Hapus</button>
                            </td>
                        </tr>
                    `);
                });
            } else {
                fishTableBody.append(`
                    <tr>
                        <td colspan="5" class="px-4 py-3 text-center">No data available</td>
                    </tr>
                `);
            }

                // Reinitialize DataTable after updating the content
                initializeDataTable();
            },
            error: function(xhr, status, error) {
                console.error("API Error:", error);
                $('#fish-table tbody').html(`
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
                        url: `/api/fish/delete/${id}`,
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
                                text: 'Ikan berhasil dihapus.',
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
                                text: 'Gagal untuk menghapus ikan, silahkan coba lagi',
                                icon: 'error',
                                timer: 1200, 
                                showConfirmButton: false
                            });
                        }
                    });
                }
            });
        }
    // Initial fetch
    fetchFishData();
</script>