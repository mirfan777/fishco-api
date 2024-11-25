<!-- Main modal -->
<div id="edit-user" tabindex="-1" aria-hidden="true" class="hidden overflow-x-hidden fixed top-0 right-0 left-0 z-[99999] bg-black bg-opacity-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)]">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit User
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-user">
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
                                <label for="edit-user-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" id="edit-user-name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan nama" required />
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="edit-user-email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" id="edit-user-email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan email" required />
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="edit-user-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" id="edit-user-password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan password" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label for="edit-user-confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password</label>
                                <input type="password" id="edit-user-confirm-password" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Konfirmasi Password" />
                                <p id="password-error" class="text-red-500 text-sm mt-1 hidden">Password dan Konfirmasi Password tidak sesuai.</p>
                            </div>

                            <!-- Phone Number -->
                            <div class="mb-3">
                                <label for="edit-user-phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Hp</label>
                                <input type="text" id="edit-user-phone" name="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter No. Hp" required />
                            </div>

                            <!-- Address -->
                            <div class="mb-3">
                                <label for="edit-user-address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <input type="text" id="edit-user-address" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Alamat" required />
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<script>
    $(document).ready(function () {
        // Function to fetch user data by ID
        window.fetchUserDataById = function(id) {
            $.ajax({
                url: `/api/user/${id}`,
                method: 'GET',
                headers: { 
                    'Authorization': `Bearer ${localStorage.getItem('token')}`,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json',
                },
                success: function(response) {
                    const user = response.data;
                    if (user) {
                        $('#edit-user-name').val(user.name);
                        $('#edit-user-email').val(user.email);
                        $('#edit-user-password').val(''); // Leave password fields empty
                        $('#edit-user-confirm-password').val(''); // Leave password fields empty
                        $('#edit-user-phone').val(user.phone_number);
                        $('#edit-user-address').val(user.address);
                        currentUserId = user.id;
                        initializeModalPosition();
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed!',
                        text: 'Failed to fetch user data. Please try again.'
                    });
                    console.log("Error response:", xhr.responseJSON);
                }
            });
        }

        // Initialize modal position
        function initializeModalPosition() {
            $('#edit-user').removeClass('hidden').addClass('flex').css({
                'justify-content': 'center',
                'align-items': 'center'
            });
        }

        // Event listener for form submission
        $('#edit-user form').on('submit', function (e) {
            e.preventDefault();

            // Edit formData object
            const formData = new FormData();

            // Get user ID and collect form data
            const userId = currentUserId;
            
            // Append form data to formData object
            formData.append('name', $('#edit-user-name').val());
            formData.append('email', $('#edit-user-email').val());
            formData.append('phone_number', $('#edit-user-phone').val());
            formData.append('address', $('#edit-user-address').val());

            // Check if passwords match
            const password = $('#edit-user-password').val();
            const confirmPassword = $('#edit-user-confirm-password').val();
            if (password || confirmPassword) {
                if (password !== confirmPassword) {
                    $('#edit-user-confirm-password').addClass('border-red-500');
                    $('#password-error').removeClass('hidden');
                    return;
                } else {
                    $('#edit-user-confirm-password').removeClass('border-red-500');
                    $('#password-error').addClass('hidden');
                    formData.append('password', password);
                    formData.append('password_confirmation', confirmPassword);
                }
            }

            const submitBtn = $(this).find('button[type="submit"]');
            submitBtn.prop('disabled', true);

            // Send AJAX request
            $.ajax({
                url: `/api/user/update/${userId}`,
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
                        text: 'Data user berhasil di update!',
                        timer: 1200,
                        showConfirmButton: false
                    });
                    $('[data-modal-hide="edit-user"]').click();
                    setTimeout(function () {
                        location.reload();
                    }, 500);
                },
                
                error: function (xhr, status, error) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        let errorMessage = 'Validation failed:';
                        for (const key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                errorMessage += `\n${errors[key].join(', ')}`;
                            }
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed!',
                            text: errorMessage
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed!',
                            text: `Error: ${xhr.responseJSON.message || 'Failed to update user data.'}`
                        });
                    }
                    console.log("Error response:", xhr.responseJSON);
                },
                complete: function() {
                    submitBtn.prop('disabled', false);
                }
            });
        });

        // Close modal on button click
        $('[data-modal-hide="edit-user"]').on('click', function() {
            $('#edit-user').addClass('hidden').removeClass('flex');
        });
    });
</script>