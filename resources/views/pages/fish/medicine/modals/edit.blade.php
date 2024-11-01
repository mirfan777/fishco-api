<!-- Main modal -->
<div id="edit-medicine" tabindex="-1" aria-hidden="true" data-modal-target="edit-medicine" class="hidden overflow-x-hidden fixed top-0 right-0 left-0 z-[99999] bg-black bg-opacity-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)]">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Medicine Data
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-medicine">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form id="edit-medicine-form" class="w-full">
                    <div class="flex flex-col md:flex-row md:justify-between w-full gap-5">
                        <div class="md:w-1/2">
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="edit-medicine-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" id="edit-medicine-name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter medicine name" required />
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="edit-medicine-description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Medicine Description</label>
                                <textarea id="edit-medicine-description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter description" required></textarea>
                            </div>
                        </div>
                    
                        <div class="md:w-1/2">
                            <!-- Disease Dropdown -->
                            <div class="mb-3">
                                <label for="edit-disease-id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disease</label>
                                <select id="edit-disease-id" name="disease_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="">Select a Disease</option>
                                </select>
                            </div>

                            <!-- Fish Dropdown -->
                            <div class="mb-3">
                                <label for="edit-fish-id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fish</label>
                                <select id="edit-fish-id" name="fish_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
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
    // Function to populate disease and fish dropdowns
    function populateDropdowns(selectedDiseaseId = null, selectedFishId = null) {
        console.log("Calling /api/dropdown-data");

        return $.ajax({
            url: '/api/dropdown-data',
            type: 'GET',
            success: function(data) {
                console.log("Dropdown data received:", data);

                const diseaseDropdown = $('#edit-disease-id');
                const fishDropdown = $('#edit-fish-id');

                // Clear existing options and add default option
                diseaseDropdown.empty().append('<option value="">Select Disease</option>');
                fishDropdown.empty().append('<option value="">Select Fish</option>');

                // Populate disease dropdown
                data.diseases.forEach(disease => {
                    diseaseDropdown.append(`<option value="${disease.id}">${disease.name}</option>`);
                });

                // Populate fish dropdown
                data.fishes.forEach(fish => {
                    fishDropdown.append(`<option value="${fish.id}">${fish.name}</option>`);
                });

                // Set the selected options after populating the dropdowns
                if (selectedDiseaseId) {
                    console.log("Setting selected disease ID:", selectedDiseaseId);
                    diseaseDropdown.val(selectedDiseaseId).change(); // Explicitly set the value
                }
                if (selectedFishId) {
                    console.log("Setting selected fish ID:", selectedFishId);
                    fishDropdown.val(selectedFishId).change(); // Explicitly set the value
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching dropdown data:', error);
                console.log('XHR object:', xhr);
                console.log('Status:', status);
            }
        });
    }

    // Function to open the edit modal and populate data
    window.openEditModal = function(id) {
        console.log(`Opening edit modal for medicine ID: ${id}`);
        
        $.ajax({
            url: `/api/medicine/${id}`,
            type: 'GET',
            success: function(response) {
                const data = response.data;

                console.log("Medicine data:", data);

                // Populate form fields with medicine data
                $('#edit-medicine-name').val(data.name);
                $('#edit-medicine-description').val(data.description);

                // Populate dropdowns and then show modal after a short delay
                populateDropdowns(data.disease_id, data.fish_id).done(() => {
                    setTimeout(() => {
                        $('#edit-medicine').removeClass('hidden');
                    }, 300); // 300 ms delay to ensure data is populated
                });

                // Set medicine ID on the form for submission
                $('#edit-medicine-form').data('medicine-id', id);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching medicine data:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to load medicine data. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    }

    // Handle form submission for editing medicine
    $('#edit-medicine-form').on('submit', function(e) {
        e.preventDefault();
        const medicineId = $(this).data('medicine-id');
        const formData = {
            name: $('#edit-medicine-name').val(),
            description: $('#edit-medicine-description').val(),
            disease_id: $('#edit-disease-id').val(),
            fish_id: $('#edit-fish-id').val(),
        };

        $.ajax({
            url: `/api/medicine/update/${medicineId}`,
            type: 'POST',
            data: formData,
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Medicine data has been successfully updated.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    $('#edit-medicine').addClass('hidden');
                    location.reload();
                });
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to update medicine data. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                console.error('Error:', error);
            }
        });
    });

    // Hide modal on button click
    $('[data-modal-hide="edit-medicine"]').on('click', function() {
        $('#edit-medicine').addClass('hidden');
    });
});
</script>




