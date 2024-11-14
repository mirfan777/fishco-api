<x-layout.main>
    @include('pages.article.modals.edit')
    
    <main class="min-h-screen pt-12 sm:ml-64 bg-gray-50">
        <div class="container mx-auto p-6">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                <div class="flex flex-col lg:flex-row gap-8 lg:p-12">
                    <!-- Article Details Section -->
                    <div class="w-full">
                        <!-- Thumbnail Image -->
                        <div class="w-full lg:w-1/3 flex justify-center">
                            <img id="detail-thumbnail" class="rounded-lg w-full h-auto lg:w-auto lg:h-60" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="Article Thumbnail">
                        </div>
                        
                        <h1 id="detail-article-title" class="text-4xl font-bold text-gray-900 dark:text-white mb-6">Judul Artikel</h1>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Article Metadata -->
                            <div>
                                <p class="text-gray-700 dark:text-gray-300"><span class="font-medium">Slug:</span> <span id="detail-slug" class="ml-2"></span></p>
                                <p class="text-gray-700 dark:text-gray-300 mt-4"><span class="font-medium">Body:</span> <span id="detail-body" class="ml-2"></span></p>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="flex gap-4 mt-8">
                            <button data-modal-target="edit-article" data-modal-toggle="edit-article" class="text-white bg-yellow-400 hover:bg-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-900">Edit data</button>
                        </div>
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
                        $('#detail-slug').text(article.slug ? `: ${article.slug}` : ": Not available");
                        $('#detail-body').text(article.body ? `: ${article.body}` : ": Not available");
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
    });
</script>