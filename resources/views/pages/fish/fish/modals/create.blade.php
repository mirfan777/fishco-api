<!-- Main modal -->
<div id="create-fish" tabindex="-1" aria-hidden="true" class="hidden overflow-x-hidden fixed top-0 right-0 left-0 z-[99999] bg-black bg-opacity-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)]">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Data Ikan
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="create-fish">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form class="w-full" enctype="multipart/form-data">
                    <div class="flex flex-col md:flex-row md:justify-between w-full gap-5">
                        {{-- taksonomi --}}
                        <div class="md:w-1/2">
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="create-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" id="create-name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter fish name" required />
                            </div>
                        
                            <!-- Kingdom -->
                            <div class="mb-3">
                                <label for="create-kingdom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kingdom</label>
                                <input type="text" id="create-kingdom" name="kingdom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter kingdom" required />
                            </div>
                        
                            <!-- Phylum -->
                            <div class="mb-3">
                                <label for="create-phylum" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phylum</label>
                                <input type="text" id="create-phylum" name="phylum" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter phylum" required />
                            </div>
                        
                            <!-- Class -->
                            <div class="mb-3">
                                <label for="create-class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                                <input type="text" id="create-class" name="class" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter class" required />
                            </div>
                        
                            <!-- Order -->
                            <div class="mb-3">
                                <label for="create-order" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order</label>
                                <input type="text" id="create-order" name="order" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter order" required />
                            </div>
                        
                            <!-- Family -->
                            <div class="mb-3">
                                <label for="create-family" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Family</label>
                                <input type="text" id="create-family" name="family" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter family" required />
                            </div>
                        
                            <!-- Genus -->
                            <div class="mb-3">
                                <label for="create-genus" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genus</label>
                                <input type="text" id="create-genus" name="genus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter genus" required />
                            </div>
                        
                            <!-- Species -->
                            <div class="mb-3">
                                <label for="create-species" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Species</label>
                                <input type="text" id="create-species" name="species" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter species" required />
                            </div>
                        
                            <!-- Colour -->
                            <div class="mb-3">
                                <label for="create-colour" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Colour</label>
                                <input type="text" id="create-colour" name="colour" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter colour" required />
                            </div>
                        </div>
                    
                        <div class="md:w-1/2">
                            {{-- food --}}
                            <div>
                                <!-- Food Type -->
                                <div class="mb-3">
                                    <label for="create-food_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Food Type</label>
                                    <input type="text" id="create-food_type" name="food_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter food type" required />
                                </div>
                            
                                <!-- Food -->
                                <div class="mb-3">
                                    <label for="create-food" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Food</label>
                                    <input type="text" id="create-food" name="food" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter food" required />
                                </div>
                            </div>

                            {{-- habitat --}}
                            <div>
                                <!-- Habitat -->
                                <div class="mb-3">
                                    <label for="create-habitat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Habitat</label>
                                    <input type="text" id="create-habitat" name="habitat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter habitat" required />
                                </div>

                                <!-- Min Temperature -->
                                <div class="mb-3">
                                    <label for="create-min_temperature" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Min Temperature</label>
                                    <input type="number" step="0.1" id="create-min_temperature" name="min_temperature" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter min temperature" required />
                                </div>

                                <!-- Max Temperature -->
                                <div class="mb-3">
                                    <label for="create-max_temperature" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Max Temperature</label>
                                    <input type="number" step="0.1" id="create-max_temperature" name="max_temperature" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter max temperature" required />
                                </div>

                                <!-- Min pH -->
                                <div class="mb-3">
                                    <label for="create-min_ph" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Min pH</label>
                                    <input type="number" step="0.1" id="create-min_ph" name="min_ph" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter min pH" required />
                                </div>

                                <!-- Max pH -->
                                <div class="mb-3">
                                    <label for="create-max_ph" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Max pH</label>
                                    <input type="number" step="0.1" id="create-max_ph" name="max_ph" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter max pH" required />
                                </div>
                            </div>

                            {{-- thumbnail dan overview --}}
                            <div>
                                <label for="create-overview" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fish Detail</label>
                                <textarea id="create-overview" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Overview"></textarea>
                            
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="create-thumbnail">Upload fish image</label>
                                <input name="thumbnail" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="create-thumbnail" type="file">
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
    $(document).ready(function() {
    $('#create-fish form').on('submit', function(e) {
        e.preventDefault();
        
        // Create FormData object to handle file uploads
        const formData = new FormData();
        
        // Get the file input
        const fileInput = document.getElementById('create-thumbnail');
        if (fileInput.files.length > 0) {
            formData.append('thumbnail', fileInput.files[0]);
        }
        
        // Add all other form fields to FormData
        formData.append('name', $('#create-name').val());
        formData.append('kingdom', $('#create-kingdom').val());
        formData.append('phylum', $('#create-phylum').val());
        formData.append('class', $('#create-class').val());
        formData.append('order', $('#create-order').val());
        formData.append('family', $('#create-family').val());
        formData.append('genus', $('#create-genus').val());
        formData.append('species', $('#create-species').val());
        formData.append('colour', $('#create-colour').val());
        formData.append('food_type', $('#create-food_type').val());
        formData.append('food', $('#create-food').val());
        formData.append('min_temperature', $('#create-min_temperature').val());
        formData.append('max_temperature', $('#create-max_temperature').val());
        formData.append('min_ph', $('#create-min_ph').val());
        formData.append('max_ph', $('#create-max_ph').val());
        formData.append('habitat', $('#create-habitat').val());
        formData.append('overview', $('#create-overview').val());

        // Disable submit button while processing
        const submitBtn = $(this).find('button[type="submit"]');
        submitBtn.prop('disabled', true);

        $.ajax({
            url: '/api/fish/create',
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
                // Show success message
                Swal.fire({
                    title: 'Success!',
                    text: 'Fish data has been successfully added',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    // Reset form and close modal
                    $('#create-fish form')[0].reset();
                    $('#create-fish').hide();
                    
                });
                $('[data-modal-hide="create-fish"]').click();
                setTimeout(function () {
                    location.reload();
                }, 500);
            },
            error: function(xhr, status, error) {
                // Show error message
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to add fish data. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                
                console.error('Error:', error);
            },
            complete: function() {
                // Re-enable submit button and restore original text
                submitBtn.prop('disabled', false);
                submitBtn.html('Submit');
            }
        });
    });

    // Form validation
    function validateForm() {
        let isValid = true;
        
        // Check required fields
        $('#create-fish form input[required], #create-fish form textarea[required]').each(function() {
            if (!$(this).val()) {
                $(this).addClass('border-red-500');
                isValid = false;
            } else {
                $(this).removeClass('border-red-500');
            }
        });
        
        // Validate number fields
        const numberFields = ['min_temperature', 'max_temperature', 'min_ph', 'max_ph'];
        numberFields.forEach(field => {
            const value = $(`#${field}`).val();
            if (value && !$.isNumeric(value)) {
                $(`#${field}`).addClass('border-red-500');
                isValid = false;
            }
        });
        
        // Validate file input
        const fileInput = document.getElementById('file_input');
        if (fileInput.files.length > 0) {
            const file = fileInput.files[0];
            const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!validTypes.includes(file.type)) {
                $(fileInput).addClass('border-red-500');
                isValid = false;
            }
        }
        
        return isValid;
    }

    // Real-time validation on input change
    $('#create-fish form input, #create-fish form textarea').on('input', function() {
        if ($(this).val()) {
            $(this).removeClass('border-red-500');
        }
    });
});
</script>