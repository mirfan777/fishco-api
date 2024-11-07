<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles Management</title>
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Include modals for create and edit actions -->
    @include('pages.article.modals.create')
    @include('pages.article.modals.edit')
    @include('layout.main')

    <main class="sm:ml-64 min-h-screen bg-gray-50 pt-10 mt-5">
        <section class="dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto w-full h-full px-4 lg:px-12">
                <h2 class="text-title-md2 font-bold text-black dark:text-white mb-6" style="font-size: 24px;">Tabel Artikel</h2>
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="flex flex-col md:flex-row items-center justify-between p-4 space-y-3 md:space-y-0 md:space-x-4">
                        <div class="w-full md:w-1/2">
                            <!-- Search Form -->
                            <form id="searchForm" class="flex items-center">
                                <label for="simple-search" class="sr-only">Cari</label>
                                <input type="text" id="simple-search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full pl-10 p-2" placeholder="Cari artikel">
                            </form>
                        </div>
                        <div class="w-full md:w-auto">
                            <!-- Add Article Button -->
                            <button data-modal-target="create-article" data-modal-toggle="create-article" class="bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg text-sm px-5 py-2.5">Tambah data</button>
                        </div>
                    </div>

                    <!-- Articles Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="bg-gray-50 text-gray-700 uppercase text-xs dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Judul</th>
                                    <th scope="col" class="px-4 py-3">Slug</th>
                                    <th scope="col" class="px-4 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="articleTable" class="bg-white dark:bg-gray-800">
                                <!-- Data rows will be dynamically loaded by JavaScript -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Navigation -->
                    <nav class="flex items-center justify-between p-4" aria-label="Table Navigation">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400" id="pagination-info"></span>
                        <ul class="inline-flex items-center -space-x-px" id="pagination"></ul>
                    </nav>
                </div>
            </div>
        </section>
    </main>

    <!-- JavaScript Section -->
    <script>
        let currentPage = 1;
        let currentSearch = '';

        // Fetch article data and populate the table
        const fetchArticleData = (page = 1, query = '') => {
            currentPage = page;
            currentSearch = query;

            $.ajax({
                url: `/api/article?page=${page}&search=${query}`,
                method: 'GET',
                success: function(response) {
                    const articleTable = $('#articleTable');
                    articleTable.empty();

                    if (response.data && response.data.length > 0) {
                        response.data.forEach(article => {
                            articleTable.append(`
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">${article.title}</td>
                                    <td class="px-4 py-3">${article.slug}</td>
                                    <td class="px-4 py-3">
                                        <a href="/article/detail/?id=${article.id}" class="bg-blue-500 text-white font-bold py-1 px-2 rounded">Detail</a>
                                        <button onclick="deleteArticle(${article.id})" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded">Hapus</button>
                                    </td>
                                </tr>
                            `);
                        });
                        renderPagination(response.meta);
                    } else {
                        articleTable.append(`
                            <tr>
                                <td colspan="3" class="px-4 py-3 text-center">Data tidak ditemukan</td>
                            </tr>
                        `);
                    }
                },
                error: function(xhr, status, error) {
                    $('#articleTable').html(`
                        <tr>
                            <td colspan="3" class="px-4 py-3 text-center text-red-500">Gagal memuat data</td>
                        </tr>
                    `);
                }
            });
        };

        // Render pagination based on the API metadata
        const renderPagination = (meta) => {
            const pagination = $('#pagination');
            const paginationInfo = $('#pagination-info');

            paginationInfo.html(`Showing <span class="font-semibold text-gray-900 dark:text-white">${meta.from}-${meta.to}</span> of <span class="font-semibold text-gray-900 dark:text-white">${meta.total}</span>`);
            pagination.empty();

            pagination.append(`
                <li>
                    <button onclick="fetchArticleData(${meta.current_page - 1}, '${currentSearch}')" class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg ${meta.current_page === 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-100'}" ${meta.current_page === 1 ? 'disabled' : ''}>Previous</button>
                </li>
            `);

            meta.links.slice(1, -1).forEach(link => {
                pagination.append(`
                    <li>
                        <button onclick="fetchArticleData(${link.label}, '${currentSearch}')" class="px-3 py-2 leading-tight ${link.active ? 'text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700' : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100'}">${link.label}</button>
                    </li>
                `);
            });

            pagination.append(`
                <li>
                    <button onclick="fetchArticleData(${meta.current_page + 1}, '${currentSearch}')" class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg ${meta.current_page === meta.last_page ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-100'}" ${meta.current_page === meta.last_page ? 'disabled' : ''}>Next</button>
                </li>
            `);
        };

        // Search form submission
        $('#searchForm').on('submit', function(e) {
            e.preventDefault();
            const query = $('#simple-search').val();
            fetchArticleData(1, query);
        });

        $(document).ready(function() {
            fetchArticleData();
        });
    </script>
</body>

</html>
