<!-- Main modal -->
<div id="create-user" tabindex="-1" aria-hidden="true" class="hidden overflow-x-hidden fixed top-0 right-0 left-0 z-[99999] bg-black bg-opacity-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)]">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah User
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="create-user">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form class="w-full">
                    <div class="flex flex-col">
                        <div class="w-full">
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="create-user-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" id="create-user-name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter name" required />
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="create-user-email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" id="create-user-email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter email" required />
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="create-user-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" id="create-user-password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter password" required />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label for="create-user-confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                                <input type="password" id="create-user-confirm-password" name="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Confirm password" required />
                            </div>

                            <!-- Address -->
                            <div class="mb-3">
                                <label for="create-user-address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                <textarea id="create-user-address" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter address" required></textarea>
                            </div>

                            <!-- Phone Number -->
                            <div class="mb-3">
                                <label for="create-user-phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                                <input type="text" id="create-user-phone" name="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter phone number" required />
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
    $('#create-user form').on('submit', function(e) {
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
            name: $('#create-user-name').val(),
            email: $('#create-user-email').val(),
            password: $('#create-user-password').val(),
            confirm_password: $('#create-user-confirm-password').val(),
            address: $('#create-user-address').val(),
            phone_number: $('#create-user-phone').val(),
            role: 1
        };

        // Disable submit button while processing
        const submitBtn = $(this).find('button[type="submit"]');
        submitBtn.prop('disabled', true);

        $.ajax({
            url: '/api/register',
            type: 'POST',
            data: JSON.stringify(formData),
            contentType: 'application/json',
            headers: { 
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json',
            },
            success: function(response) {
                // Show success message
                Swal.fire({
                    title: 'Success!',
                    text: 'User data has been successfully added',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    // Reset form and close modal
                    $('#create-user form')[0].reset();
                    $('#create-user').hide();
                });
                $('[data-modal-hide="create-user"]').click();
                setTimeout(function () {
                    location.reload();
                }, 500);
            },
            error: function(xhr, status, error) {
                // Show error message
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to add user data. Please try again.',
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
        $('#create-user form input[required], #create-user form textarea[required]').each(function() {
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
    $('#create-user form input, #create-user form textarea').on('input', function() {
        if ($(this).val()) {
            $(this).removeClass('border-red-500');
        }
    });
});
</script>