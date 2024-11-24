<x-layout.main>
    <main class="min-h-screen pt-12 sm:ml-64 bg-gray-50">
        <div class="container mx-auto p-6">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                <div class="flex flex-col lg:flex-row gap-8 lg:p-12">
                    <!-- Product Details Section -->
                    <div class="w-full">
                        <h1 id="detail-product-name" class="text-4xl font-bold text-gray-900 dark:text-white mb-6">Product Name</h1>
                        <!-- Thumbnail Image -->
                        <div class="w-full flex justify-center">
                            <img id="detail-thumbnail" class="rounded-lg w-full" src="" alt="Product Thumbnail">
                        </div>
                        
                        <form id="editProductForm" class="w-full" enctype="multipart/form-data">
                            <div class="flex flex-col w-full gap-5">
                                <div class="w-full">
                                    <!-- Thumbnail Upload -->
                                    <div class="mb-3">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="edit-product-thumbnail">Change Thumbnail</label>
                                        <input name="thumbnail" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="edit-product-thumbnail" type="file" accept=".jpeg,.png,.jpg,.gif,.svg">
                                    </div>
                                    <!-- Name -->
                                    <div class="mb-3">
                                        <label for="edit-product-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                        <input type="text" id="edit-product-name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter product name" required />
                                    </div>
                                    <!-- Category -->
                                    <div class="mb-3">
                                        <label for="edit-product-category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                        <input type="text" id="edit-product-category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter product category" required />
                                    </div>
                                    <!-- Price -->
                                    <div class="mb-3">
                                        <label for="edit-product-price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                        <input type="number" id="edit-product-price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter product price" required />
                                    </div>
                                    <!-- Link -->
                                    <div class="mb-3">
                                        <label for="edit-product-link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Link</label>
                                        <input type="url" id="edit-product-link" name="link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter product link" required />
                                    </div>
                                    <!-- Description -->
                                    <div class="mb-3">
                                        <label for="edit-product-description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                        <textarea id="edit-product-description" name="description" rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter product description" required></textarea>
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
    const productId = urlParams.get('id');

    function loadProductData(productId) {
        $.ajax({
            url: `/api/product/${productId}`,
            method: 'GET',
            headers: { 
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json',
            },
            success: function (response) {
                if (response && response.data) {
                    const product = response.data;

                    console.log("Fetched product data:", product); // Debugging line
                    const thumbnailUrl = product.thumbnail.startsWith('http') ? product.thumbnail : '/' + product.thumbnail;
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

                    $('#detail-product-name').text(product.name ? product.name : "Not available");
                    $('#detail-thumbnail').attr("src", thumbnailUrl + '?' + new Date().getTime()).attr("alt", product.name);

                    // edit product modal   
                    $('#edit-product-name').val(product.name ? product.name : "Not available");
                    $('#edit-product-category').val(product.category ? product.category : "Not available");
                    $('#edit-product-price').val(product.price ? product.price : "Not available");
                    $('#edit-product-link').val(product.link ? product.link : "Not available");
                    $('#edit-product-description').val(product.description ? product.description : "Not available");
                } else {
                    console.error('Invalid response format:', response);
                }
            },
            error: function (xhr) {
                console.error('Error fetching product data:', xhr);
            }
        });
    }

    if (productId) {
        loadProductData(productId);
    } else {
        console.error('Product ID not found in URL');
    }

    $('form').on('submit', function (e) {
        e.preventDefault();

        const formData = new FormData();

        formData.append('name', $('#edit-product-name').val());
        formData.append('category', $('#edit-product-category').val());
        formData.append('price', $('#edit-product-price').val());
        formData.append('link', $('#edit-product-link').val());
        formData.append('description', $('#edit-product-description').val());
        const fileInput = document.getElementById('edit-product-thumbnail');
        
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

        const submitBtn = $(this).find('button[type="submit"]');
       
        $.ajax({
            url: `/api/product/update/${productId}`,
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
                    text: 'Product updated successfully!',
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
                    text: `Error: ${xhr.responseJSON.message || 'Failed to update product.'}`
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