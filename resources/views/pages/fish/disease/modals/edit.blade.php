<!-- Main modal -->
<div id="edit-disease" tabindex="-1" aria-hidden="true" class="hidden overflow-x-hidden fixed top-0 right-0 left-0 z-[99999] bg-black bg-opacity-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)]">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Data Disease
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-disease">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form class="w-full" id="editDiseaseForm" method="POST">
                    <div class="flex flex-col md:flex-row md:justify-between w-full gap-5">
                        <div class="md:w-1/2">
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="edit-disease-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" id="edit-disease-name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukan nama penyakit" required />
                            </div>
            
                            <!-- disease_type -->
                            <div class="mb-3">
                                <label for="edit-disease-type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Penyakit</label>
                                <input type="text" id="edit-disease-type" name="disease_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukan tipe penyakit" required />
                            </div>
            
                            <!-- cause_agent -->
                            <div class="mb-3">
                                <label for="edit-cause-agent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penyebab</label>
                                <input type="text" id="edit-cause-agent" name="cause_agent" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukan penyebab" required />
                            </div>
            
                            <!-- affected_parts -->
                            <div class="mb-3">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bagian yang terpengaruh</label>
                                <p class="text-xs mb-2 text-red-500">*Pilih bagian minimal 1</p>
                                <div class="flex gap-5">
                                    <div>
                                        <div class="flex items-center mb-4">
                                            <input type="checkbox" name="edit-affected_parts[]" value="fins" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                            <label class="ms-2 text-sm font-medium text-gray-900">Sirip</label>
                                        </div>
                                        <div class="flex items-center mb-4">
                                            <input type="checkbox" name="edit-affected_parts[]" value="gills" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                            <label class="ms-2 text-sm font-medium text-gray-900">Insang</label>
                                        </div>
                                        <div class="flex items-center mb-4">
                                            <input type="checkbox" name="edit-affected_parts[]" value="scales" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                            <label class="ms-2 text-sm font-medium text-gray-900">Sisik</label>
                                        </div>
                                        <div class="flex items-center mb-4">
                                            <input type="checkbox" name="edit-affected_parts[]" value="head" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                            <label class="ms-2 text-sm font-medium text-gray-900">Kepala</label>
                                        </div>
                                        <div class="flex items-center mb-4">
                                            <input type="checkbox" name="edit-affected_parts[]" value="swimming" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                            <label class="ms-2 text-sm font-medium text-gray-900">Cara Berenang</label>
                                        </div>
                                        <div class="flex items-center mb-4">
                                            <input type="checkbox" name="edit-affected_parts[]" value="weight" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                            <label class="ms-2 text-sm font-medium text-gray-900">Berat</label>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex items-center mb-4">
                                            <input type="checkbox" name="edit-affected_parts[]" value="body" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                            <label class="ms-2 text-sm font-medium text-gray-900">Tubuh</label>
                                        </div>
                                        <div class="flex items-center mb-4">
                                            <input type="checkbox" name="edit-affected_parts[]" value="tail" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                            <label class="ms-2 text-sm font-medium text-gray-900">Ekor</label>
                                        </div>
                                        <div class="flex items-center mb-4">
                                            <input type="checkbox" name="edit-affected_parts[]" value="eyes" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                            <label class="ms-2 text-sm font-medium text-gray-900">Mata</label>
                                        </div>
                                        <div class="flex items-center mb-4">
                                            <input type="checkbox" name="edit-affected_parts[]" value="mouth" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                            <label class="ms-2 text-sm font-medium text-gray-900">Mulut</label>
                                        </div>
                                        <div class="flex items-center mb-4">
                                            <input type="checkbox" name="edit-affected_parts[]" value="behaviour" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                            <label class="ms-2 text-sm font-medium text-gray-900">Perilaku</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Affected Fish -->
                            <div class="mb-3">
                                <label for="edit-affected-fish" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ikan yang terjangkit</label>
                                <select id="edit-affected-fish" name="affected_fish[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" multiple>
                                </select>
                            </div>
                        </div>
            
                        <div class="md:w-1/2">
                            <!-- description -->
                            <div class="mb-3">
                                <label for="edit-description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                                <textarea id="edit-description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukan deskripsi" required></textarea>
                            </div>
            
                            <!-- symptoms -->
                            <div class="mb-3">
                                <label for="edit-symptom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gejala</label>
                                <textarea id="edit-symptom" name="symptom" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukan gejala" required></textarea>
                            </div>

                            <!-- prevention -->
                            <div class="mb-3">
                                <label for="edit-prevention" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pencegahan</label>
                                <textarea id="edit-prevention" name="prevention" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukan cara pencegahan" required></textarea>
                            </div>
            
                            <!-- note -->
                            <div class="mb-3">
                                <label for="edit-note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                                <textarea id="edit-note" name="note" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukan note untuk penyakit" required></textarea>
                            </div>
            
                            <!-- Product Recommendations -->
                            <div class="mb-3">
                                <label for="edit-products" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rekomendasi Produk</label>
                                <select id="edit-products" name="product_recommendations[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" multiple>
                                </select>
                            </div>
                        </div>
                    </div>
            
                    <!-- Submit Button -->
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Close modal when the close button is clicked
    $(document).on('click', '[data-modal-hide]', function() {
        const modalId = $(this).attr('data-modal-hide');
        console.log('Closing modal:', modalId); // Debugging log
        $(`#${modalId}`).addClass('hidden').removeClass('flex');
    });

    $('#editDiseaseForm').on('submit', function(e) {
        e.preventDefault();
        const diseaseId = currentDiseaseId;

        const formData = {
            name: $('#edit-disease-name').val(),
            symptoms: $('#edit-symptom').val(),
            description: $('#edit-description').val(),
            note: $('#edit-note').val(),
            disease_type: $('#edit-disease-type').val(),
            cause_agent: $('#edit-cause-agent').val(),
            prevention: $('#edit-prevention').val(),
            affected_fish: ($('#edit-affected-fish').val() && $('#edit-affected-fish').val().length > 0) 
                ? $('#edit-affected-fish').val() 
                : null, // Send null if no value
            product_recommendations: ($('#edit-products').val() && $('#edit-products').val().length > 0) 
                ? $('#edit-products').val() 
                : null, // Send null if no value
            affected_part: $('input[name="edit-affected_parts[]"]:checked').map(function() {
                return $(this).val();
            }).get(),
        };

        $.ajax({
            url: `/api/disease/update/${diseaseId}`,
            type: 'POST',
            data: formData,
            headers: { 
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json',
            },
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Data penyakit berhasil di update.',
                    icon: 'success',
                    timer: 1200,
                    showConfirmButton: false,
                });
                
                // Hide modal after success
                $('#edit-disease').addClass('hidden').removeClass('flex');

                // Optionally reload data or page
                setTimeout(function () {
                    location.reload();
                }, 500);
            },
            error: function(xhr, status, error) {
                // Tutup modal terlebih dahulu
                $('#edit-disease').addClass('hidden').removeClass('flex');
                Swal.fire({
                    title: 'Error!',
                    text: 'Gagal untuk mengupdate data penyakit, silahkan coba lagi.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                console.error('Error:', error);
            }
        });
    });
});
</script>
