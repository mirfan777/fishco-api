<x-layout.main>
    <!-- @include('pages.fish.fish.modals.upload-image') -->
    @include('pages.fish.fish.modals.edit')
    
    <main class="min-h-screen pt-12 sm:ml-64 bg-gray-50">
        <div class="container mx-auto p-6">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                <div class="flex flex-col lg:flex-row gap-6">
                    <!-- Image Section -->
                    <div class="w-full lg:w-1/3 flex justify-center">
                        <img id="detail-fish-thumbnail" class="rounded-lg w-80 h-80 lg:w-60 lg:h-60" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="Fish Thumbnail">
                    </div>

                    <!-- Detail Section -->
                    <div class="w-full lg:w-2/3 flex flex-col justify-between">
                        <h1 id="detail-fish-name" class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Fish Name</h1>

                        <!-- Taxonomy and Food Information -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Taxonomy -->
                            <div>
                                <h2 class="text-xl font-bold mb-2 text-gray-700 dark:text-gray-300">Taxonomy</h2>
                                <div class="text-gray-600 dark:text-gray-400">
                                    <p><span class="font-medium w-32 inline-block">Kingdom:</span> <span id="detail-kingdom"></span></p>
                                    <p><span class="font-medium w-32 inline-block">Phylum:</span> <span id="detail-phylum"></span></p>
                                    <p><span class="font-medium w-32 inline-block">Class:</span> <span id="detail-class"></span></p>
                                    <p><span class="font-medium w-32 inline-block">Order:</span> <span id="detail-order"></span></p>
                                    <p><span class="font-medium w-32 inline-block">Family:</span> <span id="detail-family"></span></p>
                                    <p><span class="font-medium w-32 inline-block">Genus:</span> <span id="detail-genus"></span></p>
                                    <p><span class="font-medium w-32 inline-block">Species:</span> <span id="detail-species"></span></p>
                                    <p><span class="font-medium w-32 inline-block">Colour:</span> <span id="detail-colour"></span></p>
                                </div>

                                <h2 class="text-xl font-bold mb-2 text-gray-700 dark:text-gray-300">Bahaya</h2>
                                <div>
                                    <p><span class="font-medium w-32 inline-block">Berbisa</span> <span id="detail-venomous"></span></p>
                                    <p><span class="font-medium w-32 inline-block">Beracun</span> <span id="detail-poisonous"></span></p>
                                </div>
                            </div>

                            <!-- Food and Habitat -->
                            <div>
                                <h2 class="text-xl font-bold mb-2 text-gray-700 dark:text-gray-300">Makanan</h2>
                                <div class="text-gray-600 dark:text-gray-400">
                                    <p><span class="font-medium w-32 inline-block">Tipe:</span> <span id="detail-food-type"></span></p>
                                    <p><span class="font-medium w-32 inline-block">Makanan:</span> <span id="detail-food"></span></p>
                                </div>
                                
                                <h2 class="text-xl font-bold mt-4 mb-2 text-gray-700 dark:text-gray-300">Habitat</h2>
                                <div class="text-gray-600 dark:text-gray-400">
                                    <p><span class="font-medium w-32 inline-block">Tipe:</span> <span id="detail-habitat"></span></p>
                                </div>

                                <h2 class="text-xl font-bold mt-4 mb-2 text-gray-700 dark:text-gray-300">Kondisi Air</h2>
                                <div class="text-gray-600 dark:text-gray-400">
                                    <p><span class="font-medium w-32 inline-block">Temperatur:</span> <span id="detail-temperature"></span></p>
                                    <p><span class="font-medium w-32 inline-block">pH:</span> <span id="detail-ph"></span></p>
                                </div>

                                <h2 class="text-xl font-bold mt-4 mb-2 text-gray-700 dark:text-gray-300">Ukuran ikan</h2>
                                <div class="text-gray-600 dark:text-gray-400">
                                    <p><span class="font-medium w-32 inline-block">Ukuran:</span> <span id="detail-average_size"></span></p>
                                </div>
                            </div>
                        </div>

                        <!-- Overview Section -->
                        <div class="mt-6">
                            <h2 class="text-xl font-bold text-gray-700 dark:text-gray-300">Overview</h2>
                            <p id="detail-overview" class="text-gray-600 dark:text-gray-400 mt-2">Lorem ipsum dolor sit amet consectetur...</p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col md:flex-row gap-4 mt-6">
                            <button data-modal-target="upload-image" data-modal-toggle="upload-image" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">Tambah data foto</button>
                            <button data-modal-target="edit-fish" data-modal-toggle="edit-fish" class="text-white bg-yellow-400 hover:bg-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-900">Edit data</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Navigation -->
            <!-- <ul class="flex justify-left border-b mt-10 border-gray-200 dark:border-gray-700 text-gray-500 text-sm font-medium">
                <li class="mr-2">
                    <a href="#" data-status="0" class="inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500">Ikan Sehat</a>
                </li>
                <li class="mr-2">
                    <a href="#" data-status="1" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Ikan Sakit</a>
                </li>
            </ul> -->

            <!-- Fish Images Gallery -->
            <!-- <div id="fish-images" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 p-6 mt-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg"></div> -->
        </div>
    </main>
</x-layout.main>

<script>
    

    $(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const fishId = urlParams.get('id');

    if (fishId) {
        loadFishData(fishId);
        loadFishImages(fishId, 0);
    } else {
        console.error("No fishId found in URL.");
    }

    $('ul a').on('click', function (e) {
        e.preventDefault();

        $('ul a').removeClass('text-blue-600 bg-gray-100 dark:text-blue-500 dark:bg-gray-800');
        $(this).addClass('text-blue-600 bg-gray-100 dark:text-blue-500 dark:bg-gray-800');

        const status = $(this).data('status');
        loadFishImages(fishId, status);
    });

    window.getImageId = function (imageId) {
        Swal.fire({
            title: "Are you sure?",
            text: `want to delete this image with ID: ${imageId}`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/api/fish/${fishId}/delete-image/${imageId}`,
                type: 'DELETE',
                headers: { 
                    'Authorization': `Bearer ${localStorage.getItem('token')}`,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json',
                },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Data successfully deleted.',
                        timer: 2000,
                    });
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
                }
            });
        }
        });
    };

    function setRadioButtonData(data) {
        // Check food_type
        if (data.food_type) {
            $(input[name="food_type"][value="${data.food_type}"]).prop('checked', true);
        }

        // Check habitat
        if (data.habitat) {
            $(input[name="habitat"][value="${data.habitat}"]).prop('checked', true);
        }
    }

    

    function loadFishData(fishId) {
        $.ajax({
            url: `/api/fish/${fishId}`,
            method: 'GET',
            headers: { 
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json',
            },
            success: function (response) {
                const fish = response.data;

                $('#detail-fish-thumbnail').attr("src", '/data/images/' + fish.thumbnail).attr("alt", fish.name);
                $('#detail-fish-name').text(fish.name || "Not available");
                $('#detail-kingdom').text(fish.kingdom || "Not available");
                $('#detail-phylum').text(fish.phylum || "Not available");
                $('#detail-class').text(fish.class || "Not available");
                $('#detail-order').text(fish.order || "Not available");
                $('#detail-family').text(fish.family || "Not available");
                $('#detail-genus').text(fish.genus || "Not available");
                $('#detail-species').text(fish.species || "Not available");
                $('#detail-colour').text(fish.colour || "Not available");
                $('#detail-venomous').text(fish.venomous ? "Yes" : "No");
                $('#detail-poisonous').text(fish.poisonous ? "Yes" : "No");
                $('#detail-food-type').text(fish.food_type || "Not available");
                $('#detail-food').text(fish.food || "Not available");
                $('#detail-temperature').text((fish.min_temperature && fish.max_temperature) ? `${fish.min_temperature}°C - ${fish.max_temperature}°C` : "Not available");
                $('#detail-ph').text((fish.min_ph && fish.max_ph) ? `${fish.min_ph}pH - ${fish.max_ph}pH` : "Not available");
                $('#detail-average_size').text(fish.average_size ? `${fish.average_size} cm` : "Not available");
                $('#detail-habitat').text(fish.habitat || "Not available");
                $('#detail-overview').text(fish.overview || "No overview available");

                
                const foodTypeValue = fish.food_type?.toString();
                if (foodTypeValue) {
                    $(`input[name="food_type"][value="${foodTypeValue}"]`).prop('checked', true);
                }
                
                const habitatValue = fish.habitat?.toString();
                if (habitatValue) {
                    $(`input[name="habitat"][value="${habitatValue}"]`).prop('checked', true);
                }

                $('#edit-name').val(fish.name || "Not available");
                $('#edit-kingdom').val(fish.kingdom || "Not available");
                $('#edit-phylum').val(fish.phylum || "Not available");
                $('#edit-class').val(fish.class || "Not available");
                $('#edit-order').val(fish.order || "Not available");
                $('#edit-family').val(fish.family || "Not available");
                $('#edit-genus').val(fish.genus || "Not available");
                $('#edit-species').val(fish.species || "Not available");
                $('#edit-colour').val(fish.colour || "Not available");
                $('#edit-venomous').prop('checked', fish.venomous == 1);
                $('#edit-poisonous').prop('checked', fish.poisonous == 1);
                $('#edit-food-type').val(fish.food_type || "Not available");
                $('#edit-food').val(fish.food || "Not available");
                $('#edit-min_temperature').val(fish.min_temperature || "Not available");
                $('#edit-max_temperature').val(fish.max_temperature || "Not available");
                $('#edit-min_ph').val(fish.min_ph || "Not available");
                $('#edit-max_ph').val(fish.max_ph || "Not available");
                $('#edit-average_size').val(fish.average_size || "Not available");
                
                $('#edit-overview').val(fish.overview || "No overview available");
                $('#edit-thumbnail').val(fish.thumbnail || "No thumbnail available");

                // Set the checked radio button based on data
                setRadioButtonData(fish);
            },
            error: function (xhr) {
                console.error('Error fetching fish data:', xhr);
            }
        });
    }

    function loadFishImages(fishId, status) {
        $.ajax({
            url: `/api/fish/${fishId}`,
            method: 'GET',
            headers: { 
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json',
            },
            success: function (response) {
                const fish = response.data;
                const filteredImages = fish.images.filter(image => image.status === status);

    //             $('#fish-images').empty();

                filteredImages.forEach(image => {
                    $('#fish-images').append(`
                        <div class="relative max-w-xl mx-auto group">
                            <img class="h-56 w-56 rounded-lg object-cover rounded-md" src="/data/images/${image.image}" alt="Fish Image">
                            <div class="group-hover:visible invisible absolute inset-0 bg-gray-700 opacity-60 rounded-md"></div>
                            <div class="group-hover:visible invisible absolute inset-0 flex items-center justify-center">
                                <button onClick='getImageId(${image.id})' data-modal-target="delete-image-fish" data-modal-toggle="delete-image-fish" class="flex gap-1 item-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    <svg width="18" height="18" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.625 1.53125V2.625H11.5938C11.7678 2.625 11.9347 2.69414 12.0578 2.81721C12.1809 2.94028 12.25 3.1072 12.25 3.28125C12.25 3.4553 12.1809 3.62222 12.0578 3.74529C11.9347 3.86836 11.7678 3.9375 11.5938 3.9375H2.40625C2.2322 3.9375 2.06528 3.86836 1.94221 3.74529C1.81914 3.62222 1.75 3.4553 1.75 3.28125C1.75 3.1072 1.81914 2.94028 1.94221 2.81721C2.06528 2.69414 2.2322 2.625 2.40625 2.625H4.375V1.53125C4.375 0.686 5.061 0 5.90625 0H8.09375C8.939 0 9.625 0.686 9.625 1.53125ZM3.934 5.84063L4.5115 11.6156C4.51693 11.6696 4.54223 11.7197 4.58249 11.7561C4.62276 11.7924 4.67511 11.8126 4.72938 11.8125H9.27063C9.32489 11.8126 9.37724 11.7924 9.41751 11.7561C9.45777 11.7197 9.48307 11.6696 9.4885 11.6156L10.066 5.84063C10.0877 5.67112 10.1747 5.51676 10.3084 5.41037C10.4421 5.30398 10.6121 5.25396 10.7822 5.27094C10.9522 5.28793 11.1089 5.37057 11.219 5.5013C11.329 5.63204 11.3838 5.80055 11.3715 5.971L10.794 11.746C10.7562 12.1238 10.5795 12.4741 10.298 12.729C10.0165 12.9838 9.65033 13.1249 9.27063 13.125H4.72938C4.34981 13.125 3.98379 12.9839 3.70231 12.7293C3.42083 12.4746 3.24396 12.1245 3.206 11.7469L2.6285 5.97187C2.61754 5.88499 2.62408 5.79679 2.64774 5.71247C2.6714 5.62815 2.7117 5.54942 2.76626 5.48091C2.82081 5.41241 2.88853 5.35552 2.96542 5.31359C3.04231 5.27167 3.12681 5.24556 3.21395 5.2368C3.30108 5.22804 3.38909 5.2368 3.47278 5.26259C3.55648 5.28837 3.63417 5.33064 3.70127 5.38691C3.76837 5.44318 3.82354 5.51232 3.86351 5.59024C3.90347 5.66816 3.92744 5.7533 3.934 5.84063ZM5.6875 1.53125V2.625H8.3125V1.53125C8.3125 1.47323 8.28945 1.41759 8.24843 1.37657C8.20741 1.33555 8.15177 1.3125 8.09375 1.3125H5.90625C5.84823 1.3125 5.79259 1.33555 5.75157 1.37657C5.71055 1.41759 5.6875 1.47323 5.6875 1.53125Z" fill="white"/>
                                    </svg>
                                    <span>Delete</span>
                                </button>
                            </div>
                        </div>
                    `);
                });
            },
            error: function (xhr) {
                console.error('Error fetching fish images:', xhr);
            }
        });
    }
});
</script>