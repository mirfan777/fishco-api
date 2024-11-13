<!-- Main Modal for Creating Article -->
<div id="create-article" tabindex="-1" aria-hidden="true" class="hidden overflow-x-hidden fixed top-0 right-0 left-0 z-[99999] bg-black bg-opacity-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)]">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal Content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Artikel Baru
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="create-article">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="p-4 md:p-5 space-y-4">
                <form id="createArticleForm" class="w-full">
                    <div class="flex flex-col w-full gap-5">
                        <div class="w-full">
                            <!-- Title -->
                            <div class="mb-3">
                                <label for="create-article-title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                <input type="text" id="create-article-title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter article title" required />
                            </div>
                            <!-- Slug -->
                            <div class="mb-3">
                                <label for="create-article-slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                                <input type="text" id="create-article-slug" name="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter article slug" required />
                            </div>
                            <!-- Description/Body -->
                            <div class="mb-3">
                                <label for="create-article-body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                                <textarea id="create-article-body" name="body" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter article body" required></textarea>
                            </div>
                            <!-- Thumbnail Upload -->
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="create-article-thumbnail">Upload Thumbnail Artikel</label>
                                <input name="thumbnail" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="create-article-thumbnail" type="file">
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button with Spacing -->
                    <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#create-article form').on('submit', function(e) {
            e.preventDefault();
            
            // Membuat objek FormData untuk menangani upload file
            const formData = new FormData();
            
            // Mendapatkan input file
            const fileInput = document.getElementById('create-article-thumbnail');
            if (fileInput.files.length > 0) {
                formData.append('thumbnail', fileInput.files[0]);
            }
            
            // Menambahkan field form ke FormData
            formData.append('title', $('#create-article-title').val());
            formData.append('slug', $('#create-article-slug').val());
            formData.append('body', $('#create-article-body').val());
            formData.append('user_id', '1');

            // Log entri FormData untuk debugging
            for (let [key, value] of formData.entries()) {
                console.log(`${key}:`, value);
            }

            // Menonaktifkan tombol submit saat proses berlangsung
            const submitBtn = $(this).find('button[type="submit"]');
            submitBtn.prop('disabled', true);

            // Mengirim permintaan AJAX
            $.ajax({
                url: '/api/article/create',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: { 
                    'Authorization': `Bearer ${localStorage.getItem('token')}`,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json',
                },
                success: function(response) {
                    // Menampilkan pesan sukses
                    Swal.fire({
                        title: 'Sukses!',
                        text: 'Data artikel berhasil ditambahkan',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        // Mereset form dan menutup modal
                        $('#create-article form')[0].reset();
                        $('#create-article').hide();
                    });
                    $('[data-modal-hide="create-article"]').click();
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                },
                error: function(xhr, status, error) {
                    console.error('Error creating article:', xhr.responseText);
                },
                complete: function() {
                    // Mengaktifkan kembali tombol submit setelah permintaan selesai
                    submitBtn.prop('disabled', false);
                }
            });
        });
    });
</script>