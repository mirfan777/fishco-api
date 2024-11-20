<x-layout.main>
    @include('pages.article.modals.create')
    
    <main class="sm:ml-64 min-h-screen bg-gray-50 pt-10 mt-5">
        <section class="dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto w-full h-full px-4 lg:px-12">
                <h2 class="text-title-md2 font-bold text-black dark:text-white mb-6" style="font-size: 24px;">Tabel Artikel</h2>
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <!-- Bagian Pencarian dan Tombol Tambah Data -->
                    <div class="flex flex-col md:flex-row items-center justify-between p-4 space-y-3 md:space-y-0 md:space-x-4">
                        <!-- Tombol Tambah Data -->
                        <div class="w-full md:w-auto">
                            <button data-modal-target="create-article" data-modal-toggle="create-article" class="bg-[#0278c7] hover:bg-[#0362a1] text-white font-medium rounded-lg text-sm px-5 py-2.5">Tambah data</button>
                        </div>
                    </div>
                    

                    <!-- Tabel Data Penyakit -->
                    <div class="overflow-x-auto p-5">
                        <table class="w-full text-sm text-left text-gray-500 " id="article-table" >
                            <thead class="bg-gray-50 text-gray-700 uppercase text-xs dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="flex items-center">
                                            Judul Artikel
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="flex items-center">
                                            Slug
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

<!-- JavaScript Section -->
<script>
    let currentPage = 1;
    let dataTable;

    const initializeDataTable = () => {
        if (dataTable) {
            dataTable.destroy(); // Destroy previous instance if it exists
        }

        dataTable = new simpleDatatables.DataTable("#article-table", {
            searchable: true,
            paging: true,
            perPage: 5,
            perPageSelect: [5, 10, 15, 20, 25],
            sortable: true
        });
    };

    const fetchArticleDataById = (id) => {
        $.ajax({
            url: `/api/articles/${id}`,
            method: 'GET',
            headers: { 
                    'Authorization': `Bearer ${localStorage.getItem('token')}`,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json',
                },
            success: function(response) {
                console.log("API Response:", response); 
                $('#edit-article-title').val(response.data.name);
                $('#edit-article-slug').val(response.data.category);
                $('#edit-article-body').val(response.data.price);
                $('#edit-article-thumbnail').val(response.data.link);

                currentArticleId = id;
                initializeModalPosition(); // Ensure modal is centered
                $('#edit-article').show();
            },
            error: function(xhr, status, error) {
                console.error("API Error:", error); // Debug: Log error details
            }
        });
    };

    const fetchArticleData = () => {
        $.ajax({
            url: `/api/articles`,
            method: 'GET',
            headers: { 
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json',
            },
            success: function(response) {
                console.log("API Response:", response);

                const articleTableBody = $('#article-table tbody'); // Target the tbody directly
                articleTableBody.empty();

                if (response && response.length > 0) {
                    response.forEach(article => {
                        articleTableBody.append(`
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">${article.title}</td>
                                <td class="px-4 py-3">${article.slug}</td>
                                <td class="px-4 py-3">
                                    <a href="/article/detail/?id=${article.id}" class="bg-blue-500 text-white font-bold py-1 px-2 rounded">Detail</a>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded" onclick="confirmDelete(${article.id})">Hapus</button>
                                </td>
                            </tr>
                        `);
                    });
                } else {
                    articleTableBody.append(`
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
                $('#article-table tbody').html(`
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
                    url: `/api/article/delete/${id}`,
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
                            title: 'Deleted!',
                            text: 'Artikel berhasil dihapus.',
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
                            text: 'Gagal untuk menghapus artikel, silahkan coba lagi.',
                            icon: 'error',
                            timer: 1200, 
                            showConfirmButton: false
                        });
                    }
                });
            }
        });
    }
     fetchArticleData();    
</script>