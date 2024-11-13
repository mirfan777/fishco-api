<x-layout.main>
        @include('pages.article.modals.edit')
        
        <main class="sm:ml-64 min-h-screen mt-20 bg-gray-50">
            <div class="flex flex-col lg:flex-row gap-2 mb-5 lg:p-20 p-2">
                <div class="flex flex-col">
                    <h1 id="detail-article-title" class="text-title text-4xl">Judul Article</h1>
                    <div class="flex flex-col gap-5 md:flex-row md:gap-56">
                        <div class="flex flex-col gap-2">
                            <div class="flex"><p class="w-40">Slug</p><p id="detail-slug">: </p></div>
                            <div class="flex"><p class="w-40">Body</p><p id="detail-body">: </p></div>
                        </div>
                    </div>
                    <div class="flex md:flex-row flex-col w-full gap-5 mt-5">
                        <button data-modal-target="edit-article" data-modal-toggle="edit-article" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit data</button>
                    </div>
                </div>
            </div>
        </main>
</x-layout.main>

    <script>
        $(document).ready(function () {
        // Retrieve articleId from URL query parameter
        const urlParams = new URLSearchParams(window.location.search);
        const articleId = urlParams.get('id');

        // Load default article data and images if articleId is present
        // if (articleId) {
        //     loadFishData(articleId);
        //     loadFishImages(articleId, 0);
        // } else {
        //     console.error("No articleId found in URL.");
        // }

        // Event handler for tab click to load images based on status
        // $('ul a').on('click', function (e) {
        //     e.preventDefault();

        //     $('ul a').removeClass('text-blue-600 bg-gray-100 dark:text-blue-500 dark:bg-gray-800');
        //     $(this).addClass('text-blue-600 bg-gray-100 dark:text-blue-500 dark:bg-gray-800');

        //     const status = $(this).data('status');
        //     loadFishImages(fishId, status);
        // });

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
                  const article = response.data;

                  console.log("Fetched article data:", article); // Debugging line

                  // Update all fields, checking if each one exists to prevent undefined issues
                    // $('#detail-fish-thumbnail').attr("src", '/data/images/' + fish.thumbnail).attr("alt", fish.name);
                    $('#detail-article-title').text(article.title ? article.title : "Not available");
                    $('#detail-slug').text(article.slug ? `: ${article.slug}` : ": Not available");
                    $('#detail-body').text(article.body ? `: ${article.body}` : ": Not available");

                    // edit article modal   
                    $('#edit-article-title').val(article.title ? article.title : "Not available");
                    $('#edit-article-slug').val(article.slug ? article.slug : "Not available");
                    $('#edit-article-body').val(article.body ? article.body : "Not available");
            
                    // // upload fish modal
                    // $('#upload-id').val(fish.id ? fish.id : "Not available");
                    // $('#kingdom').val(fish.kingdom ? fish.kingdom : "Not available");
                    // $('#phylum').val(fish.phylum ? fish.phylum : "Not available");
                    // $('#class').val(fish.class ? fish.class : "Not available");

                    // // delete fish modal
              },
              error: function (xhr) {
                  console.error('Error fetching article data:', xhr);
              }
          });
      }

      loadArticleData(articleId)

        // Function to load fish images based on status
        // function loadFishImages(fishId, status) {
        //     $.ajax({
        //         url: `/api/fish/${fishId}`,
        //         method: 'GET',
        //         success: function (response) {
        //             const fish = response.data;
        //             const filteredImages = fish.images.filter(image => image.status === status);

        //             $('#fish-images').empty();

        //             filteredImages.forEach(image => {
        //                 $('#fish-images').append(`
        //                     <div class="relative max-w-xl mx-auto group">
        //                         <img class="h-auto max-w-full rounded-lg object-cover rounded-md" src="/data/images/${image.image}" alt="Fish Image">
        //                         <div class="group-hover:visible invisible absolute inset-0 bg-gray-700 opacity-60 rounded-md"></div>
        //                         <div class="group-hover:visible invisible absolute inset-0 flex items-center justify-center">
        //                             <button data-modal-target="delete-image-fish" data-modal-toggle="delete-image-fish" class="flex gap-1 item-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
        //                                 <svg width="18" height="18" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        //                                 <path d="M9.625 1.53125V2.625H11.5938C11.7678 2.625 11.9347 2.69414 12.0578 2.81721C12.1809 2.94028 12.25 3.1072 12.25 3.28125C12.25 3.4553 12.1809 3.62222 12.0578 3.74529C11.9347 3.86836 11.7678 3.9375 11.5938 3.9375H2.40625C2.2322 3.9375 2.06528 3.86836 1.94221 3.74529C1.81914 3.62222 1.75 3.4553 1.75 3.28125C1.75 3.1072 1.81914 2.94028 1.94221 2.81721C2.06528 2.69414 2.2322 2.625 2.40625 2.625H4.375V1.53125C4.375 0.686 5.061 0 5.90625 0H8.09375C8.939 0 9.625 0.686 9.625 1.53125ZM3.934 5.84063L4.5115 11.6156C4.51693 11.6696 4.54223 11.7197 4.58249 11.7561C4.62276 11.7924 4.67511 11.8126 4.72938 11.8125H9.27063C9.32489 11.8126 9.37724 11.7924 9.41751 11.7561C9.45777 11.7197 9.48307 11.6696 9.4885 11.6156L10.066 5.84063C10.0877 5.67112 10.1747 5.51676 10.3084 5.41037C10.4421 5.30398 10.6121 5.25396 10.7822 5.27094C10.9522 5.28793 11.1089 5.37057 11.219 5.5013C11.329 5.63204 11.3838 5.80055 11.3715 5.971L10.794 11.746C10.7562 12.1238 10.5795 12.4741 10.298 12.729C10.0165 12.9838 9.65033 13.1249 9.27063 13.125H4.72938C4.34981 13.125 3.98379 12.9839 3.70231 12.7293C3.42083 12.4746 3.24396 12.1245 3.206 11.7469L2.6285 5.97187C2.61754 5.88499 2.62408 5.79679 2.64774 5.71247C2.6714 5.62815 2.7117 5.54942 2.76626 5.48091C2.82081 5.41241 2.88853 5.35552 2.96542 5.31359C3.04231 5.27167 3.12681 5.24556 3.21395 5.2368C3.30108 5.22804 3.38909 5.2368 3.47278 5.26259C3.55648 5.28837 3.63417 5.33064 3.70127 5.38691C3.76837 5.44318 3.82354 5.51232 3.86351 5.59024C3.90347 5.66816 3.92744 5.7533 3.934 5.84063ZM5.6875 1.53125V2.625H8.3125V1.53125C8.3125 1.47323 8.28945 1.41759 8.24843 1.37657C8.20741 1.33555 8.15177 1.3125 8.09375 1.3125H5.90625C5.84823 1.3125 5.79259 1.33555 5.75157 1.37657C5.71055 1.41759 5.6875 1.47323 5.6875 1.53125Z" fill="white"/>
        //                                 </svg>
        //                                 <span>Delete</span>
        //                             </button>
        //                         </div>
        //                     </div>
        //                 `);
        //             });
        //         },
        //         error: function (xhr) {
        //             console.error('Error fetching fish images:', xhr);
        //         }
        //     });
        // }
    });
    </script>
</body>
</html>
