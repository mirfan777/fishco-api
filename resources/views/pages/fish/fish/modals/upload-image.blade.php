<!-- Main modal -->
<div id="upload-image" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[99999] bg-black bg-opacity-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Upload Gambar Ikan
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="upload-image">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form id="upload-image-form" class="w-full" enctype="multipart/form-data">
                    <!-- Status -->
                    <div class="mb-3">
                        <div class="flex">
                            <div class="flex items-center me-4">
                                <input id="upload-status-0" type="radio" value="0" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required>
                                <label for="upload-status-0" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sehat</label>
                            </div>
                            <div class="flex items-center me-4">
                                <input id="upload-status-1" type="radio" value="1" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required>
                                <label for="upload-status-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sakit</label>
                            </div>
                        </div>
                    </div>

                    <!-- Jenis Penyakit -->
                    <div id="upload-disease-section" class="mb-3 hidden">
                        <label for="upload-disease-id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Penyakit</label>
                        <select id="upload-disease-id" name="disease_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="">Select Disease</option>
                        </select>
                    </div>

                    <!-- Upload Image -->
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" required />
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function () {
    // Ambil ID ikan dari URL parameter
    const urlParams = new URLSearchParams(window.location.search);
    const fishId = urlParams.get('id');
    if (!fishId) {
        alert('Fish ID not found in the URL');
        return;
    }

   // Hide the disease selection section initially
    $('#upload-disease-section').hide();
    $('#upload-disease-id').prop('required', false);

    // Show or hide the disease selection based on status
    $('input[name="status"]').on('change', function () {
        if ($('#upload-status-1').is(':checked')) {
            // Show the disease selection section
            $('#upload-disease-section').show();
            $('#upload-disease-id').prop('required', true);
        } else {
            // Hide the disease selection section
            $('#upload-disease-section').hide();
            $('#upload-disease-id').prop('required', false);
        }
    });


    // Fetch disease list dari API
    function fetchDiseases() {
        $.ajax({
            url: '/api/diseases',
            type: 'GET',
            headers: { 
                    'Authorization': `Bearer ${localStorage.getItem('token')}`,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json',
                },
            success: function (response) {
                const diseaseDropdown = $('#upload-disease-id');
                diseaseDropdown.empty();
                diseaseDropdown.append('<option value="">Select Disease</option>');
                response.data.forEach(function (disease) {
                    diseaseDropdown.append(`<option value="${disease.id}">${disease.name}</option>`);
                });
            },
            error: function (xhr, status, error) {
                console.error('Error fetching diseases:', error);
            }
        });
    }

    fetchDiseases();

    // Event submit form
    $('#upload-image-form').on('submit', function (e) {
        e.preventDefault();

        // Upload image
        const formData = new FormData();
        formData.append('fish_id', fishId);
        formData.append('status', $('input[name="status"]:checked').val());
        formData.append('disease_id', $('input[name="status"]:checked').val() == '0' ? null : $('#upload-disease-id').val());
        formData.append('image', $('#dropzone-file')[0].files[0]);

        $.ajax({
            url: `/api/fish/${fishId}/upload`,
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
                        title: 'Success!',
                        text: 'Gambar ikan berhasil diupload',
                        icon: 'success',
                        timer: 1200, 
                        showConfirmButton: false
                    }).then((result) => {
                        $('#upload-image-form form')[0].reset();
                        $('#upload-image-form').hide();
                    });
                    $('[data-modal-hide="upload-image"]').click();
                    setTimeout(function () {
                        location.reload();
                    }, 500);
            },
            error: function (xhr, status, error) {
                alert('Gagal untuk mengupload gambar ikan, silahkan coaba lagi.');
                console.error(error);
            },
        });
    });
});


</script>