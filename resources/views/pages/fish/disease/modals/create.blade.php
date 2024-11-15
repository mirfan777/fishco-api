<!-- Main modal -->
<div id="create-disease" tabindex="-1" aria-hidden="true" class="hidden overflow-x-hidden fixed top-0 right-0 left-0 z-[99999] bg-black bg-opacity-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)]">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Data Disease
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="create-disease">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form class="w-full">
                    <div class="flex flex-col md:flex-row md:justify-between w-full gap-5">
                        <div class="md:w-1/2">
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="create-disease-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" id="create-disease-name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter disease name" required />
                            </div>

                            <!-- disease_type -->
                            <div class="mb-3">
                                <label for="create-disease_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">disease_type</label>
                                <input type="text" id="create-symptoms" name="symptoms" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter symptoms" required />
                            </div>

                            <!-- cause_agent -->
                            <div class="mb-3">
                                <label for="create-cause_agent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">cause_agent</label>
                                <input type="text" id="create-symptoms" name="symptoms" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter symptoms" required />
                            </div>

                            <!-- affected_part -->
                            <div class="mb-3 ">
                                <label for="create-cause_agent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Affected Parts</label>
                                <div class="flex gap-5">
                                    <div>
                                        <div class="flex items-center mb-4">
                                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default checkbox</label>
                                        </div>
                                        <div class="flex items-center mb-4">
                                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default checkbox</label>
                                        </div>
                                        <div class="flex items-center mb-4">
                                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default checkbox</label>
                                        </div>
                                        <div class="flex items-center mb-4">
                                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default checkbox</label>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex items-center mb-4">
                                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default checkbox</label>
                                        </div>
                                        <div class="flex items-center mb-4">
                                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default checkbox</label>
                                        </div>
                                        <div class="flex items-center mb-4">
                                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default checkbox</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="create-affected-fish" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Affected Fish</label>
                                <select id="create-affected-fish" class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" multiple="multiple">
                                    <!-- Data akan diisi secara dinamis oleh AJAX -->
                                </select>
                            </div>
                        
                        </div>

                        <div class="md:w-1/2">
                            <!-- description -->
                            <div class="mb-3">
                                <label for="create-description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">description</label>
                                <textarea id="create-disease-description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter descriptions" required></textarea>
                            </div>

                            <!-- symptoms -->
                            <div class="mb-3">
                                <label for="create-symptom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">symptom</label>
                                <textarea id="create-disease-symptom" name="symptom" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter symptoms" required></textarea>
                            </div>

                            <!-- note -->
                            <div class="mb-3">
                                <label for="create-note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">note</label>
                                <textarea id="create-disease-note" name="note" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter notes" required></textarea>
                            </div>

                            <!-- Product Recommendation -->
                            <div class="mb-3">
                                <label for="create-affected-fish" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Affected Fish</label>
                                <textarea id="create-affected-fish" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter description" required></textarea>
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

{{-- <meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<script>
$(document).ready(function() {
    

    $('#create-disease form').on('submit', function(e) {
        e.preventDefault();

        // Disable submit button while processing
        const submitBtn = $(this).find('button[type="submit"]');
        submitBtn.prop('disabled', true);

        // Validate form before submission
        if (!validateForm()) {
            Swal.fire({
                title: 'Error!',
                text: 'Please fill out all required fields correctly.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            submitBtn.prop('disabled', false);
            return;
        }

        // Prepare form data
        const formData = new FormData(this);

        $.ajax({
            url: '/api/disease/create',
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
                    text: 'Disease data has been successfully added',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    // Reset form and close modal
                    $('#create-disease form')[0].reset();
                    $('#create-disease').hide();
                });
                $('[data-modal-hide="create-disease"]').click();
                setTimeout(function () {
                    location.reload();
                }, 500);
            },
            error: function(xhr, status, error) {
                // Show error message
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to add disease data. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                submitBtn.prop('disabled', false);
            }
        });
    });

    function validateForm() {
        // Add your form validation logic here
        // Return true if the form is valid, otherwise return false
        return true;
    }
});
</script>