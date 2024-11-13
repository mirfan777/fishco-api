<!-- Main modal -->
<div id="edit-fish" tabindex="-1" aria-hidden="true" class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[99999] bg-black bg-opacity-50 justify-center items-center w-full md:inset-0 h-[calc(100%-   0rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl max-h-full ">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Data Ikan
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-fish">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form class="w-full"  enctype="multipart/form-data">
                    <div class="flex flex-col md:flex-row md:justify-between w-full gap-5">
                        {{-- taksonomi --}}
                        <div class="md:w-1/2">
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="edit-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" id="edit-name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter fish name" required />
                            </div>
                        
                            <!-- Kingdom -->
                            <div class="mb-3">
                                <label for="edit-kingdom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kingdom</label>
                                <input type="text" id="edit-kingdom" name="kingdom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter kingdom" required />
                            </div>
                        
                            <!-- Phylum -->
                            <div class="mb-3">
                                <label for="edit-phylum" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phylum</label>
                                <input type="text" id="edit-phylum" name="phylum" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter phylum" required />
                            </div>
                        
                            <!-- Class -->
                            <div class="mb-3">
                                <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                                <input type="text" id="edit-class" name="class" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter class" required />
                            </div>
                        
                            <!-- Order -->
                            <div class="mb-3">
                                <label for="order" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order</label>
                                <input type="text" id="edit-order" name="order" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter order" required />
                            </div>
                        
                            <!-- Family -->
                            <div class="mb-3">
                                <label for="family" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Family</label>
                                <input type="text" id="edit-family" name="family" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter family" required />
                            </div>
                        
                            <!-- Genus -->
                            <div class="mb-3">
                                <label for="genus" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genus</label>
                                <input type="text" id="edit-genus" name="genus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter genus" required />
                            </div>
                        
                            <!-- Species -->
                            <div class="mb-3">
                                <label for="species" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Species</label>
                                <input type="text" id="edit-species" name="species" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter species" required />
                            </div>
                        
                            <!-- Colour -->
                            <div class="mb-3">
                                <label for="colour" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Colour</label>
                                <input type="text" id="edit-colour" name="colour" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter colour" required />
                            </div>
                        </div>
                    
                        <div class="md:w-1/2">
                            {{-- food --}}
                            <div>
                                <!-- Food Type -->
                                <div class="mb-3">
                                    <label for="edit-food_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Food Type</label>
                                    <input type="text" id="edit-food_type" name="food_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter food type" required />
                                </div>
                            
                                <!-- Food -->
                                <div class="mb-3">
                                    <label for="edit-food" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Food</label>
                                    <input type="text" id="edit-food" name="food" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter food" required />
                                </div>
                            </div>

                            {{-- habitat --}}
                            <div>
                                <!-- Habitat -->
                                <div class="mb-3">
                                    <label for="habitat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Habitat</label>
                                    <input type="text" id="edit-habitat" name="habitat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter habitat" required />
                                </div>

                                <!-- Min Temperature -->
                                <div class="mb-3">
                                    <label for="min_temperature" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Min Temperature</label>
                                    <input type="number" step="0.1" id="edit-min_temperature" name="min_temperature" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter min temperature" required />
                                </div>

                                <!-- Max Temperature -->
                                <div class="mb-3">
                                    <label for="max_temperature" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Max Temperature</label>
                                    <input type="number" step="0.1" id="edit-max_temperature" name="max_temperature" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter max temperature" required />
                                </div>

                                <!-- Min pH -->
                                <div class="mb-3">
                                    <label for="min_ph" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Min pH</label>
                                    <input type="number" step="0.1" id="edit-min_ph" name="min_ph" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter min pH" required />
                                </div>

                                <!-- Max pH -->
                                <div class="mb-3">
                                    <label for="max_ph" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Max pH</label>
                                    <input type="number" step="0.1" id="edit-max_ph" name="max_ph" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter max pH" required />
                                </div>
                            </div>

                            {{-- thumbnail dan overview --}}
                            <div>
                                <label for="edit-overview" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
                                <textarea id="edit-overview" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                            
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="edit-thumbnail">Thumbnail</label>
                                <input name="edit-thumbnail" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="edit-thumbnail" type="file">
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
        $('#edit-fish form').on('submit', function (e) {
            e.preventDefault();

            // Create formData object
            const formData = new FormData();

            // Append file if it exists
            const fileInput = document.getElementById('edit-thumbnail');
            if (fileInput.files.length > 0) {
                formData.append('thumbnail', fileInput.files[0]);
            }

            // Get fish ID and collect form data
            const urlParams = new URLSearchParams(window.location.search);
            const fishId = urlParams.get('id');
            
            // Append other form data to formData object
            formData.append('name', $('#edit-name').val());
            formData.append('kingdom', $('#edit-kingdom').val());
            formData.append('phylum', $('#edit-phylum').val());
            formData.append('class', $('#edit-class').val());
            formData.append('order', $('#edit-order').val());
            formData.append('family', $('#edit-family').val());
            formData.append('genus', $('#edit-genus').val());
            formData.append('species', $('#edit-species').val());
            formData.append('colour', $('#edit-colour').val());
            formData.append('food_type', $('#edit-food_type').val());
            formData.append('food', $('#edit-food').val());
            formData.append('habitat', $('#edit-habitat').val());
            formData.append('min_temperature', $('#edit-min_temperature').val());
            formData.append('max_temperature', $('#edit-max_temperature').val());
            formData.append('min_ph', $('#edit-min_ph').val());
            formData.append('max_ph', $('#edit-max_ph').val());
            formData.append('overview', $('#edit-overview').val());

            const submitBtn = $(this).find('button[type="submit"]');
            submitBtn.prop('disabled', true);

            // Send AJAX request
            $.ajax({
                url: `/api/fish/update/${fishId}`,
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
                        timer: 2000,
                        showConfirmButton: false
                    });
                    $('[data-modal-hide="edit-fish"]').click();
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
