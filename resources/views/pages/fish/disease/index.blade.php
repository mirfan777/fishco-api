<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disease</title>
    <!-- Menyertakan file CSS dan JavaScript dari Vite -->
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <!-- Library jQuery dan SweetAlert2 untuk keperluan interaksi dan notifikasi -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <!-- Menyertakan modal untuk form "Tambah Data Penyakit" -->
    @include('pages.fish.disease.modals.create')
    <!-- Menyertakan layout utama -->
    @include('layout.main')
    
    <main class="sm:ml-64 min-h-screen bg-gray-50">
        <section class="dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto w-full h-full px-4 lg:px-12">
                <h2 class="text-title-md2 font-bold text-black dark:text-white mb-6">Tabel Disease</h2>
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <!-- Bagian Pencarian dan Tombol Tambah Data -->
                    <div class="flex flex-col md:flex-row items-center justify-between p-4 space-y-3 md:space-y-0 md:space-x-4">
                        <!-- Form Pencarian -->
                        <div class="w-full md:w-1/2">
                            <form id="searchForm" class="flex items-center">
                                <label for="simple-search" class="sr-only">Cari</label>
                                <input type="text" id="simple-search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full pl-10 p-2" placeholder="Cari penyakit">
                            </form>
                        </div>
                        <!-- Tombol Tambah Data -->
                        <div class="w-full md:w-auto">
                            <button data-modal-target="create-disease" data-modal-toggle="create-disease" class="bg-blue-700 text-white font-medium rounded-lg text-sm px-5 py-2.5">Tambah data</button>
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

    <!-- Script untuk pengambilan data penyakit, pencarian, dan pagination -->
    <script>
        // Variabel untuk menyimpan halaman dan pencarian saat ini
        let currentPage = 1;
        let currentSearch = '';

        // Fungsi untuk mengambil data penyakit berdasarkan halaman dan pencarian
        const fetchDiseaseData = (page = 1, query = '') => {
            currentPage = page;
            currentSearch = query;
            
            $.ajax({
                url: /api/disease?page=${page}&search=${query},
                method: 'GET',
                success: function(response) {
                    const diseaseTable = $('#diseaseTable');
                    diseaseTable.empty();
                    
                    // Memeriksa apakah ada data penyakit yang ditemukan
                    if (response.data && response.data.length > 0) {
                        // Menambahkan data penyakit ke tabel
                        response.data.forEach(disease => {
                            diseaseTable.append(`
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">${disease.name}</td>
                                    <td class="px-4 py-3">${disease.symptoms}</td>
                                    <td class="px-4 py-3">
                                        <a href="/disease/detail/?id=${disease.id}" class="bg-blue-500 text-white font-bold py-1 px-2 rounded">Detail</a>
                                        <button class="bg-red-500 text-white font-bold py-1 px-2 rounded">Hapus</button>
                                    </td>
                                </tr>
                            `);
                        });
                        
                        // Menampilkan pagination sesuai data yang diambil
                        renderPagination(response.meta);
                    } else {
                        // Menampilkan pesan jika tidak ada data yang ditemukan
                        diseaseTable.append(`
                            <tr>
                                <td colspan="3" class="px-4 py-3 text-center">Data tidak ditemukan</td>
                            </tr>
                        `);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Kesalahan mengambil data:', error);
                    $('#diseaseTable').html(`
                        <tr>
                            <td colspan="3" class="px-4 py-3 text-center text-red-500">Gagal memuat data</td>
                        </tr>
                    `);
                }
            });
        };

        // Fungsi untuk menampilkan pagination dan info halaman
        const renderPagination = (meta) => {
            const pagination = $('#pagination');
            pagination.empty();
            const paginationInfo = $('#pagination-info');
            paginationInfo.text(Menampilkan halaman ${meta.current_page} dari ${meta.last_page});

            // Tombol halaman sebelumnya
            if (meta.current_page > 1) {
                pagination.append(<li><button onclick="fetchDiseaseData(${meta.current_page - 1})" class="px-3 py-2 rounded-lg">Sebelumnya</button></li>);
            }

            // Tombol halaman berikutnya
            if (meta.current_page < meta.last_page) {
                pagination.append(<li><button onclick="fetchDiseaseData(${meta.current_page + 1})" class="px-3 py-2 rounded-lg">Berikutnya</button></li>);
            }
        };

        // Inisialisasi pengambilan data pertama kali
        fetchDiseaseData();

        // Mengambil data saat ada pencarian
        $('#searchForm').on('submit', function(e) {
            e.preventDefault();
            const query = $('#simple-search').val();
            fetchDiseaseData(1, query);
        });
    </script>
</body>
</html>