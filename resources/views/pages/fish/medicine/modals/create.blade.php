<!-- Main modal -->
<div id="create-medicine" tabindex="-1" aria-hidden="true" class="hidden overflow-x-hidden fixed top-0 right-0 left-0 z-[99999] bg-black bg-opacity-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)]">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Data Medicine
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="create-medicine">
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
                                <label for="create-medicine-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" id="create-medicine-name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter medicine name" required />
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="create-medicine-description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Medicine Description</label>
                                <textarea id="create-medicine-description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter description" required></textarea>
                            </div>
                        </div>
                    
                        <div class="md:w-1/2">
                            <!-- Disease Dropdown -->
                            <div class="mb-3">
                                <label for="create-disease-id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disease</label>
                                <select id="create-disease-id" name="disease_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="">Select a Disease</option>
                                </select>
                            </div>

                            <!-- Fish Dropdown -->
                            <div class="mb-3">
                                <label for="create-fish-id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fish</label>
                                <select id="create-fish-id" name="fish_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="">Select a Fish</option>
                                </select>
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
    // Fetch and populate diseases and fishes data for the dropdowns
    function populateDropdowns() {
        // Populate Disease Dropdown
        $.ajax({
            url: '/api/diseases',
            type: 'GET',
            success: function(data) {
                const diseaseDropdown = $('#create-disease-id');
                diseaseDropdown.empty();
                diseaseDropdown.append('<option value="">Select Disease</option>');
                data.forEach(function(disease) {
                    diseaseDropdown.append(`<option value="${disease.id}">${disease.name}</option>`);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching diseases:', error);
            }
        });

        // Populate Fish Dropdown
        $.ajax({
            url: '/api/fishes',
            type: 'GET',
            success: function(data) {
                const fishDropdown = $('#create-fish-id');
                fishDropdown.empty();
                fishDropdown.append('<option value="">Select Fish</option>');
                data.forEach(function(fish) {
                    fishDropdown.append(`<option value="${fish.id}">${fish.name}</option>`);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching fishes:', error);
            }
        });
    }

    // Call function to populate dropdowns on page load
    populateDropdowns();

    // Form submit logic remains the same
    $('#create-medicine form').on('submit', function(e) {
        e.preventDefault();

        if (!validateForm()) {
            Swal.fire({
                title: 'Error!',
                text: 'Please fill out all required fields correctly.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        const formData = {
            name: $('#create-medicine-name').val(),
            description: $('#create-medicine-description').val(),
            disease_id: $('#create-disease-id').val(),
            fish_id: $('#create-fish-id').val(),
        };

        const submitBtn = $(this).find('button[type="submit"]');
        submitBtn.prop('disabled', true);

        $.ajax({
            url: '/api/medicine/create',
            type: 'POST',
            data: formData,
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Medicine data has been successfully added',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $('#create-medicine form')[0].reset();
                    $('#create-medicine').hide();
                });
                $('[data-modal-hide="create-medicine"]').click();
                setTimeout(function () {
                    location.reload();
                }, 500);
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to add medicine data. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                console.error('Error:', error);
            },
            complete: function() {
                submitBtn.prop('disabled', false);
                submitBtn.html('Submit');
            }
        });
    });

    function validateForm() {
        let isValid = true;

        $('#create-medicine form input[required], #create-medicine form textarea[required]').each(function() {
            if (!$(this).val()) {
                $(this).addClass('border-red-500');
                isValid = false;
            } else {
                $(this).removeClass('border-red-500');
            }
        });

        $('#create-disease-id, #create-fish-id').each(function() {
            if (!$(this).val()) {
                $(this).addClass('border-red-500');
                isValid = false;
            } else {
                $(this).removeClass('border-red-500');
            }
        });

        return isValid;
    }

    $('#create-medicine form input, #create-medicine form textarea, #create-disease-id, #create-fish-id').on('input change', function() {
        if ($(this).val()) {
            $(this).removeClass('border-red-500');
        }
    });
});
</script>


