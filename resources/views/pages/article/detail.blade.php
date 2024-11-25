<x-layout.main>
    <main class="min-h-screen pt-12 sm:ml-64 bg-gray-50">
        <div class="container mx-auto p-6">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                <div class="flex flex-col lg:flex-row gap-8 lg:p-12">
                    <!-- Article Details Section -->
                    <div class="w-full">
                        <h1 id="detail-article-title" class="text-4xl font-bold text-gray-900 dark:text-white mb-6">Judul Artikel</h1>
                        <!-- Thumbnail Image -->
                        <div class="w-full flex justify-center mb-6">
                            <img id="detail-thumbnail" class="rounded-lg" src="" alt="Article Thumbnail" style="width: 1100px; height: 400px; object-fit: cover; margin-bottom: 20px;">
                        </div>
                        
                        <form id="editArticleForm" class="w-full" enctype="multipart/form-data">
                            <div class="flex flex-col w-full gap-5">
                                <div class="w-full">
                                    <!-- Thumbnail Upload -->
                                    <div class="mb-3">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="edit-article-thumbnail">Ubah Thumbnail</label>
                                        <input name="thumbnail" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="edit-article-thumbnail" type="file" accept=".jpeg,.png,.jpg,.gif,.svg">
                                    </div>
                                    <!-- Title -->
                                    <div class="mb-3">
                                        <label for="edit-article-title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                                        <input type="text" id="edit-article-title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan judul artikel" required />
                                    </div>
                                    <!-- Slug -->
                                    <div class="mb-3">
                                        <label for="edit-article-slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                                        <input type="text" id="edit-article-slug" name="slug" class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly />
                                    </div>
                                    <!-- Description/Body -->
                                    <div class="mb-3">
                                        <label for="edit-article-body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Badan Artikel</label>
                                        <textarea id="edit-article-body" name="body" rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan badan artikel" required></textarea>
                                    </div>
                                </div>
                            </div>
                    
                            <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout.main>

<script>
    $(document).ready(function () {
        const urlParams = new URLSearchParams(window.location.search);
        const articleId = urlParams.get('id');

        function loadArticleData(articleId) {
            $.ajax({
                url: `/api/article/${articleId}`,
                method: 'GET',
                headers: { 
                    'Authorization': `Bearer ${localStorage.getItem('token')}`,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json',
                },
                success: function (response) {
                    if (response && response.data) {
                        const article = response.data;

                        console.log("Fetched article data:", article); // Debugging line
                        const thumbnailUrl = article.thumbnail.startsWith('http') ? article.thumbnail : '/data/thumbnails/' + article.thumbnail;
                        console.log("Thumbnail URL:", thumbnailUrl);

                        // Additional debugging
                        const img = new Image();
                        img.onload = function() {
                            console.log("Image loaded successfully:", thumbnailUrl);
                        };
                        img.onerror = function() {
                            console.error("Failed to load image:", thumbnailUrl);
                        };
                        img.src = thumbnailUrl;

                        $('#detail-article-title').text(article.title ? article.title : "Not available");
                        $('#detail-thumbnail').attr("src", thumbnailUrl).attr("alt", article.title);

                        // edit article modal   
                        $('#edit-article-title').val(article.title ? article.title : "Not available");
                        $('#edit-article-slug').val(article.slug ? article.slug : "Not available");
                        $('#edit-article-body').val(article.body ? article.body : "Not available");
                    } else {
                        console.error('Invalid response format:', response);
                    }
                },
                error: function (xhr) {
                    console.error('Error fetching article data:', xhr);
                }
            });
        }

        if (articleId) {
            loadArticleData(articleId);
        } else {
            console.error('Article ID not found in URL');
        }

        
        function generateSlug(title) {
            return title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        }

       
        $('#edit-article-title').on('input', function() {
            const title = $(this).val();
            const slug = generateSlug(title);
            $('#edit-article-slug').val(slug);
        });

        $('form').on('submit', function (e) {
            e.preventDefault();
            $('#edit-article-slug').prop('readonly', false)
    
            const formData = new FormData();

            formData.append('title', $('#edit-article-title').val());
            formData.append('slug', $('#edit-article-slug').val());
            formData.append('body', $('#edit-article-body').val());
            const fileInput = document.getElementById('edit-article-thumbnail');
            
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml'];
                
                if (validTypes.includes(file.type)) {
                    formData.append('thumbnail', file);
                } else {
                    alert('Invalid file type. Please upload an image file (jpeg, png, jpg, gif, svg).');
                    return;
                }
            }

            
            const urlParams = new URLSearchParams(window.location.search);
            const articleId = urlParams.get('id');
        

            const submitBtn = $(this).find('button[type="submit"]');
           
            $.ajax({
                url: `/api/article/update/${articleId}`,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: { 
                    'Authorization': `Bearer ${localStorage.getItem('token')}`,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json',
                },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Data berhasil diperbarui!',
                        timer: 1200,
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                },
                
                
                error: function (xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed!',
                        text: `Error: ${xhr.responseJSON.message || 'Data gagal diperbarui.'}`
                    });
                    console.log("Error response:", xhr.responseJSON);
                },
                complete: function() {
                    submitBtn.prop('disabled', false);
                }
            });
        });
    });
</script>