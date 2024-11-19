<!-- Main modal -->
<div id="edit-fish" tabindex="-1" aria-hidden="true" class="hidden overflow-x-hidden fixed top-0 right-0 left-0 z-[99999] bg-black bg-opacity-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)]">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
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
                <form class="w-full" enctype="multipart/form-data">
                    <div class="flex flex-col md:flex-row md:justify-between w-full gap-5">
                        {{-- taksonomi --}}
                        <div class="md:w-1/2">
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="edit-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" id="edit-name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan nama ikan" required />
                            </div>
                        
                            <!-- Kingdom -->
                            <div class="mb-3">
                                <label for="edit-kingdom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kingdom</label>
                                <input type="text" id="edit-kingdom" name="kingdom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan kingdom" required />
                            </div>
                        
                            <!-- Phylum -->
                            <div class="mb-3">
                                <label for="edit-phylum" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phylum</label>
                                <input type="text" id="edit-phylum" name="phylum" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan phylum" required />
                            </div>
                        
                            <!-- Class -->
                            <div class="mb-3">
                                <label for="edit-class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                                <input type="text" id="edit-class" name="class" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan class" required />
                            </div>
                        
                            <!-- Order -->
                            <div class="mb-3">
                                <label for="edit-order" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order</label>
                                <input type="text" id="edit-order" name="order" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan order" required />
                            </div>
                        
                            <!-- Family -->
                            <div class="mb-3">
                                <label for="edit-family" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Family</label>
                                <input type="text" id="edit-family" name="family" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan family" required />
                            </div>
                        
                            <!-- Genus -->
                            <div class="mb-3">
                                <label for="edit-genus" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genus</label>
                                <input type="text" id="edit-genus" name="genus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan genus" required />
                            </div>
                        
                            <!-- Species -->
                            <div class="mb-3">
                                <label for="edit-species" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Spesies</label>
                                <input type="text" id="edit-species" name="species" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan spepies" required />
                            </div>
                        
                            <!-- Colour -->
                            <div class="mb-3">
                                <label for="edit-colour" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Warna</label>
                                <input type="text" id="edit-colour" name="colour" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan warna" required />
                            </div>
                        </div>
                    
                        <div class="md:w-1/2">
                            {{-- venomous and poisonous --}}
                            <div class="">
                               <label class="block  text-sm font-medium text-gray-900 dark:text-white">Berbahaya</label>
                               <div class="flex gap-2 py-3">
                                    <div class="flex items-center mb-4">
                                        <input id="edit-venomous" type="checkbox" value="true" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="edit-venomous" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Beracun</label>
                                    </div>
                                    <div class="flex items-center mb-4">
                                        <input id="edit-poisonous" type="checkbox" value="true" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="edit-poisonous" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Berbisa</label>
                                    </div>
                               </div>
                            </div>

                            {{-- food --}}
                            <div>
                                <!-- Food Type -->
                                <div class="">
                                    <label class="block mb-1  text-sm font-medium text-gray-900 dark:text-white">Food Type</label>
                                    <div class="flex items-center py-5">
                                        <input type="radio" id="food-type-karnivora" name="food_type" value="carnivore" class="mr-2">
                                        <label for="food-type-karnivora" class="mr-4 text-sm font-medium text-gray1-900 dark:text-white">Karnivora</label>

                                        <input type="radio" id="food-type-herbivora" name="food_type" value="herbivore" class="mr-2">
                                        <label for="food-type-herbivora" class="mr-4 text-sm font-medium text-gray-900 dark:text-white">Herbivora</label>
                                        
                                        <input type="radio" id="food-type-omnivora" name="food_type" value="omnivore" class="mr-2">
                                        <label for="food-type-omnivora" class="text-sm font-medium text-gray-900 dark:text-white">Omnivora</label>
                                    </div>
                                </div>   

                                <!-- Food -->
                                <div class="">
                                    <label for="edit-food" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Makanan</label>
                                    <input type="text" id="edit-food" name="food" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan makanan" required />
                                </div>
                            </div>
                            {{-- habitat --}}
                            <div>
                                <!-- Habitat -->
                                <div class="">
                                    <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Habitat</label>
                                    <div class="flex items-center py-3">
                                        <input type="radio" id="habitat-air-tawar" name="habitat" value="freshwater" class="mr-2">
                                        <label for="habitat-air-tawar" class="mr-4 text-sm font-medium text-gray-900 dark:text-white">Air Tawar</label>
                                        
                                        <input type="radio" id="habitat-air-laut" name="habitat" value="saltwater" class="mr-2">
                                        <label for="habitat-air-laut" class="mr-4 text-sm font-medium text-gray-900 dark:text-white">Air Laut</label>
                                        
                                        <input type="radio" id="habitat-air-payau" name="habitat" value="brackishwater" class="mr-2">
                                        <label for="habitat-air-payau" class="text-sm font-medium text-gray-900 dark:text-white">Air Payau</label>
                                    </div>
                                </div>

                                <!-- Min Temperature -->
                                <div class="">
                                    <label for="edit-min_temperature" class="block py-2.5 text-sm font-medium text-gray-900 dark:text-white">Min Temperature (°C)</label>
                                    <input type="number" step="0.1" id="edit-min_temperature" name="min_temperature" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan min temperatur" required />
                                </div>

                                <!-- Max Temperature -->
                                <div class="">
                                    <label for="edit-max_temperature" class="block py-2.5 text-sm font-medium text-gray-900 dark:text-white">Max Temperature (°C)</label>
                                    <input type="number" step="0.1" id="edit-max_temperature" name="max_temperature" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan max temperatur" required />
                                </div>

                                <!-- Min pH -->
                                <div class="">
                                    <label for="edit-min_ph" class="block py-2.5 text-sm font-medium text-gray-900 dark:text-white">Min pH</label>
                                    <input type="number" step="0.1" id="edit-min_ph" name="min_ph" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan pH min" required />
                                </div>

                                <!-- Max pH -->
                                <div class="">
                                    <label for="edit-max_ph" class="block py-2.5 text-sm font-medium text-gray-900 dark:text-white">Max pH</label>
                                    <input type="number" step="0.1" id="edit-max_ph" name="max_ph" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan pH max" required />
                                </div>

                                <!-- Min salinity -->
                                <div class="">
                                    <label for="edit-min_salinity" class="block py-2.5 text-sm font-medium text-gray-900 dark:text-white">Min kegaraman air (pH)</label>
                                    <input type="number" step="0.1" id="edit-min_salinity" name="min_salinity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan pH min kegaraman air" required />
                                </div>

                                <!-- Max salinity -->
                                <div class="">
                                    <label for="edit-max_salinity" class="block py-2.5 text-sm font-medium text-gray-900 dark:text-white">Max kegaraman air (pH)</label>
                                    <input type="number" step="0.1" id="edit-max_salinity" name="max_salinity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan pH max kegaraman air" required />
                                </div>

                                <!-- Min size -->
                                <div class="">
                                    <label for="edit-average_size" class="block py-2.5 text-sm font-medium text-gray-900 dark:text-white">Rata - Rata ukuran (cm)</label>
                                    <input type="number" step="0.1" id="edit-average_size" name="average_size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan rata - rata ukuran ikan" required />
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="">
                        <label class="block py-2.5 text-sm font-medium text-gray-900 dark:text-white" for="edit-thumbnail">Upload gambar ikan</label>
                        <input name="thumbnail" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="edit-thumbnail" type="file">
                    </div>

                    <!-- Fish Detail and Thumbnail -->
                    <div class="mt-5">
                        <label for="edit-overview" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detail Ikan</label>
                        <textarea id="edit-overview" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan detail ikan"></textarea>
                    </div>
                    

                
                    <!-- Submit Button -->
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('#edit-fish form').on('submit', function (e) {
            e.preventDefault();

            // Validate file input
            const fileInput = document.getElementById('edit-thumbnail');
            const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                if (!validTypes.includes(file.type)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid File Type',
                        text: 'Only JPEG, PNG, and GIF files are allowed.'
                    });
                    return;
                }
            }

            // Create FormData object
            const formData = new FormData();

            // Append file if it exists
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
            formData.append('venomous', $('#edit-venomous').is(':checked') ? 1 : 0);
            formData.append('poisonous', $('#edit-poisonous').is(':checked') ? 1 : 0);
            formData.append('food_type', $('input[name="food_type"]:checked').val());
            formData.append('food', $('#edit-food').val());

            // Check if habitat is selected
            const habitat = $('input[name="habitat"]:checked').val();
            if (habitat !== undefined) {
                formData.append('habitat', habitat);
            }

            formData.append('min_temperature', $('#edit-min_temperature').val());
            formData.append('max_temperature', $('#edit-max_temperature').val());
            formData.append('min_ph', $('#edit-min_ph').val());
            formData.append('max_ph', $('#edit-max_ph').val());
            formData.append('min_salinity', $('#edit-min_salinity').val());
            formData.append('max_salinity', $('#edit-max_salinity').val());
            formData.append('average_size', $('#edit-average_size').val());
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
                    // Close modal on error
                    $('#edit-fish').hide();

                    Swal.fire({
                        icon: 'error',
                        title: 'Failed!',
                        text: `Error: ${xhr.responseJSON.message || 'Data gagal diperbarui.'}`
                    }).then((result) => {
                        // Ensure modal and backdrop are removed
                        $('#edit-fish').hide();
                        $('#edit-fish form')[0].reset();
                        $('[data-modal-hide="edit-fish"]').click();
                    });

                    console.log("Error response:", xhr.responseJSON);
                },
                complete: function () {
                    submitBtn.prop('disabled', false);
                }
            });
        });
    });
</script>