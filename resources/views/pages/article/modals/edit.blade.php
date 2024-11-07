<!-- Main Modal for Creating Article -->
<div id="edit-article" tabindex="-1" aria-hidden="true" class="hidden overflow-x-hidden fixed top-0 right-0 left-0 z-[99999] bg-black bg-opacity-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)]">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal Content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Artikel
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-article">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="p-4 md:p-5 space-y-4">
                <form id="editArticleForm" class="w-full">
                    <div class="flex flex-col md:flex-row md:justify-between w-full gap-5">
                        <div class="md:w-1/2">
                            <!-- Title -->
                            <div class="mb-3">
                                <label for="edit-article-title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                <input type="text" id="edit-article-title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter article title" required />
                            </div>
                            <!-- Slug -->
                            <div class="mb-3">
                                <label for="edit-article-slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                                <input type="text" id="edit-article-slug" name="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter article slug" required />
                            </div>
                        </div>
                        
                        <div class="md:w-1/2">
                            <!-- Description/Body -->
                            <div class="mb-3">
                                <label for="edit-article-body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                                <textarea id="edit-article-body" name="body" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter article body" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#edit-article form').on('submit', function (e) {
            e.preventDefault();

            // Edit formData object
            const formData = new FormData();

            // // Append file if it exists
            // const fileInput = document.getElementById('edit-thumbnail');
            // if (fileInput.files.length > 0) {
            //     formData.append('thumbnail', fileInput.files[0]);
            // }

            // Get fish ID and collect form data
            const urlParams = new URLSearchParams(window.location.search);
            const articleId = urlParams.get('id');
            
            // Append other form data to formData object
            formData.append('title', $('#edit-article-title').val());
            formData.append('slug', $('#edit-article-slug').val());
            formData.append('body', $('#edit-article-body').val());

            const submitBtn = $(this).find('button[type="submit"]');
            submitBtn.prop('disabled', true);

            // Send AJAX request
            $.ajax({
                url: `/api/article/update/${articleId}`,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Data berhasil diperbarui!',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    $('[data-modal-hide="edit-article"]').click();
                    setTimeout(function () {
                        location.reload();
                    }, 500);
                },
                
                error: function (xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed!',
                        text: `Error: ${xhr.responseJSON.message || 'Data gagal diperbarui.'}`
                    });
                    console.log("Error response:", xhr.responseJSON);
                }
            });
        });
    });
</script>

