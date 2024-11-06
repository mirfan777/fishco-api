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

                            <!-- Symptoms -->
                            <div class="mb-3">
                                <label for="create-symptoms" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Symptoms</label>
                                <input type="text" id="create-symptoms" name="symptoms" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter symptoms" required />
                            </div>
                        </div>
                    
                        <div class="md:w-1/2">
                            <!-- Description -->
                            <div class="mb-3">
                                <label for="create-disease-description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disease Description</label>
                                <textarea id="create-disease-description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter description" required></textarea>
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

        // Validate form before submission
        if (!validateForm()) {
            Swal.fire({
                title: 'Error!',
                text: 'Please fill out all required fields correctly.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        // Prepare form data without picture
        const formData = {
            name: $('#create-disease-name').val(),
            description: $('#create-disease-description').val(),
            symptoms: $('#create-symptoms').val()
        };

        // Disable submit button while processing
        const submitBtn = $(this).find('button[type="submit"]');
        submitBtn.prop('disabled', true);

        $.ajax({
            url: '/api/disease/create',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
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
        $('#create-disease form input[required], #create-disease form textarea[required]').each(function() {
            if (!$(this).val()) {
                $(this).addClass('border-red-500');
                isValid = false;
            } else {
                $(this).removeClass('border-red-500');
            }
        });

        return isValid;
    }

    // Real-time validation on input change
    $('#create-disease form input, #create-disease form textarea').on('input', function() {
        if ($(this).val()) {
            $(this).removeClass('border-red-500');
        }
    });
});
</script>