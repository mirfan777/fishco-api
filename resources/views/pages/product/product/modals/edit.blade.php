<!-- Main modal -->
<div id="edit-product" tabindex="-1" aria-hidden="true" class="hidden overflow-x-hidden fixed top-0 right-0 left-0 z-[99999] bg-black bg-opacity-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)]">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Data Product
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-product">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form id="edit-product-form">
                    <div class="flex flex-col md:flex-row md:justify-between w-full gap-5">
                        <div class="md:w-1/2">
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="edit-product-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" id="edit-product-name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter product name" required />
                            </div>

                            <!-- Category -->
                            <div class="mb-3">
                                <label for="edit-category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                <input type="text" id="edit-category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Category" required />
                            </div>
                            
                            <!-- Price -->
                            <div class="mb-3">
                                <label for="edit-price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                <input type="number" id="edit-price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Price" required />
                            </div>

                            <!-- Link -->
                            <div class="mb-3">
                                <label for="edit-link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link</label>
                                <input type="text" id="edit-link" name="link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Link" required />
                            </div>
                        </div>
                    
                        <div class="md:w-1/2">
                            <!-- Description -->
                            <div class="mb-3">
                                <label for="edit-product-description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                                <textarea id="edit-product-description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter description" required></textarea>
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
    
            // Close modal on button click
            $('#edit-product form').on('submit', function (e) {
                e.preventDefault();

            console.log(currentProductId);

            // Edit formData object
            const formData = new FormData();

            //get product id
            
            // Append other form data to formData object
            formData.append('name', $('#edit-product-name').val());
            formData.append('category', $('#edit-category').val());
            formData.append('price', $('#edit-price').val());
            formData.append('link', $('#edit-link').val());
            formData.append('description', $('#edit-product-description').val());

            const submitBtn = $(this).find('button[type="submit"]');
            submitBtn.prop('disabled', true);

            // Kirim permintaan AJAX
            $.ajax({
                url: `/api/product/update/${currentProductId}`, 
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
                success: function (response) {
                    // Notifikasi sukses
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Data berhasil diperbarui!',
                        timer: 2000,
                        showConfirmButton: false
                    });

                    // Menutup modal
                    closeEditModal(); // Panggil fungsi untuk menutup modal

                    // Reload halaman setelah 500ms
                    setTimeout(function () {
                        location.reload();
                    }, 500);
                },
                error: function (xhr, status, error) {
                    // Notifikasi error
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed!',
                        text: `Error: ${xhr.responseJSON.message || 'Data gagal diperbarui.'}`
                    });
                    console.log("Error response:", xhr.responseJSON);
                    $('#edit-product').hide(); // Sembunyikan modal setelah berhasil
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                }
            });
        });
</script>
