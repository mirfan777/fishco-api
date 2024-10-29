<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fish Details | TailAdmin Dashboard</title>
    <!-- Include CSS dan JavaScript -->
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @include('pages.fish.fish.modals.upload-image')
    @include('pages.fish.fish.modals.edit')
    @include('pages.fish.fish.modals.delete')
    @include('layout.main')
    
    <main class="sm:ml-64 min-h-screen mt-20 bg-gray-50">
        <div class="flex flex-col lg:flex-row gap-2 mb-5 lg:p-20 p-2">
            <div class="lg:w-60 lg:h-60 w-80 h-80 md:mx-10">
                <img id="detail-fish-thumbnail" class="rounded-lg w-80 h-80 lg:w-60 lg:h-60" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="alt">
            </div>
            <div class="flex flex-col justify-center">
                <h1 id="detail-fish-name" class="text-title text-4xl">Fish Name</h1>
                <div class="flex flex-col gap-5 md:flex-row md:gap-56">
                    <div class="flex flex-col gap-2">
                        <h2 class="text-title text-xl font-bold">Taxonomy</h2>
                        <div class="flex"><p class="w-40">Kingdom</p><p id="detail-kingdom">: </p></div>
                        <div class="flex"><p class="w-40">Phylum</p><p id="detail-phylum">: </p></div>
                        <div class="flex"><p class="w-40">Class</p><p id="detail-class">: </p></div>
                        <div class="flex"><p class="w-40">Order</p><p id="detail-order">: </p></div>
                        <div class="flex"><p class="w-40">Family</p><p id="detail-family">: </p></div>
                        <div class="flex"><p class="w-40">Genus</p><p id="detail-genus">: </p></div>
                        <div class="flex"><p class="w-40">Species</p><p id="detail-species">: </p></div>
                        <div class="flex"><p class="w-40">Colour</p><p id="detail-colour">: </p></div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h2 class="text-title text-xl font-bold">Foods</h2>
                        <div class="flex"><p class="w-40">Type</p><p id="detail-food-type">: </p></div>
                        <div class="flex"><p class="w-40">Food</p><p id="detail-food">: </p></div>
                        <h2 class="text-title text-xl font-bold">Habitat</h2>
                        <div class="flex"><p class="w-40">Type</p><p id="detail-habitat">: </p></div>
                        <h2 class="text-title text-xl font-bold">Water Conditions</h2>
                        <div class="flex"><p class="w-40">Temperature</p><p id="detail-temperature">: </p></div>
                        <div class="flex"><p class="w-40">pH</p><p id="detail-ph">: </p></div>
                    </div>
                </div>
                <div class="mt-5">
                    <h2 class="text-title text-xl font-bold">Overview</h2>
                    <p id="detail-overview">Lorem ipsum dolor sit amet consectetur...</p>
                </div>
                <div class="flex md:flex-row flex-col w-full gap-5 mt-5">
                    <button data-modal-target="upload-image" data-modal-toggle="upload-image" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah data foto</button>
                    <button data-modal-target="edit-fish" data-modal-toggle="edit-fish" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit data</button>
                    <button data-modal-target="delete-fish" data-modal-toggle="delete-fish" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus data</button>
                </div>
            </div>
        </div>

        <ul class="flex flex-wrap lg:px-20 p-2 text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <li class="me-2">
                <a href="#" data-status="0" class="inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500">Ikan Sehat</a>
            </li>
            <li class="me-2">
                <a href="#" data-status="1" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Ikan Sakit</a>
            </li>
        </ul>

        <div id="fish-images" class="grid grid-cols-2 md:grid-cols-6 gap-4 lg:p-20 p-2"></div>
    </main>

    <script>
        $(document).ready(function () {
        // Retrieve fishId from URL query parameter
        const urlParams = new URLSearchParams(window.location.search);
        const fishId = urlParams.get('id');

        // Load default fish data and images if fishId is present
        if (fishId) {
            loadFishData(fishId);
            loadFishImages(fishId, 0);
        } else {
            console.error("No fishId found in URL.");
        }

        // Event handler for tab click to load images based on status
        $('ul a').on('click', function (e) {
            e.preventDefault();

            $('ul a').removeClass('text-blue-600 bg-gray-100 dark:text-blue-500 dark:bg-gray-800');
            $(this).addClass('text-blue-600 bg-gray-100 dark:text-blue-500 dark:bg-gray-800');

            const status = $(this).data('status');
            loadFishImages(fishId, status);
        });

        function loadFishData(fishId) {
          $.ajax({
              url: `/api/fish/${fishId}`,
              method: 'GET',
              success: function (response) {
                  const fish = response.data;

                  console.log("Fetched fish data:", fish); // Debugging line

                  // Update all fields, checking if each one exists to prevent undefined issues
                    $('#detail-fish-thumbnail').attr("src", '/data/images/' + fish.thumbnail).attr("alt", fish.name);
                    $('#detail-fish-name').text(fish.name ? fish.name : "Not available");
                    $('#detail-kingdom').text(fish.kingdom ? `: ${fish.kingdom}` : ": Not available");
                    $('#detail-phylum').text(fish.phylum ? `: ${fish.phylum}` : ": Not available");
                    $('#detail-class').text(fish.class ? `: ${fish.class}` : ": Not available");
                    $('#detail-order').text(fish.order ? `: ${fish.order}` : ": Not available");
                    $('#detail-family').text(fish.family ? `: ${fish.family}` : ": Not available");
                    $('#detail-genus').text(fish.genus ? `: ${fish.genus}` : ": Not available");
                    $('#detail-species').text(fish.species ? `: ${fish.species}` : ": Not available");
                    $('#detail-colour').text(fish.colour ? `: ${fish.colour}` : ": Not available");
                    $('#detail-food-type').text(fish.food_type ? `: ${fish.food_type}` : ": Not available");
                    $('#detail-food').text(fish.food ? `: ${fish.food}` : ": Not available");
                    $('#detail-temperature').text((fish.min_temperature && fish.max_temperature) ? 
                        `: ${fish.min_temperature}°C - ${fish.max_temperature}°C` : ": Not available");
                    $('#detail-ph').text((fish.min_ph && fish.max_ph) ? 
                        `: ${fish.min_ph} - ${fish.max_ph}` : ": Not available");
                    $('#detail-habitat').text(fish.habitat ? `: ${fish.habitat}` : ": Not available");
                    $('#detail-overview').text(fish.overview ? fish.overview : "No overview available");

                    // edit fish modal   
                    $('#edit-name').val(fish.name ? fish.name : "Not available");
                    $('#edit-kingdom').val(fish.kingdom ? fish.kingdom : "Not available");
                    $('#edit-phylum').val(fish.phylum ? fish.phylum : "Not available");
                    $('#edit-class').val(fish.class ? fish.class : "Not available");
                    $('#edit-order').val(fish.order ? fish.order : "Not available");
                    $('#edit-family').val(fish.family ? fish.family : "Not available");
                    $('#edit-genus').val(fish.genus ? fish.genus : "Not available");
                    $('#edit-species').val(fish.species ? fish.species : "Not available");
                    $('#edit-colour').val(fish.colour ? fish.colour : "Not available");
                    $('#edit-food_type').val(fish.food_type ? fish.food_type : "Not available");
                    $('#edit-food').val(fish.food ? fish.food : "Not available");
                    $('#edit-temperature').val((fish.min_temperature && fish.max_temperature) ? `${fish.min_temperature} - ${fish.max_temperature}` : "Not available");
                    $('#edit-min_temperature').val(fish.min_temperature ? fish.min_temperature : "Not available");
                    $('#edit-max_temperature').val(fish.max_temperature ? fish.max_temperature : "Not available");
                    $('#edit-min_ph').val(fish.min_ph ? fish.min_ph : "Not available");
                    $('#edit-max_ph').val(fish.max_ph ? fish.max_ph : "Not available");
                    $('#edit-habitat').val(fish.habitat ? fish.habitat : "Not available");
                    $('#edit-overview').val(fish.overview ? fish.overview : "No overview available");

                    // upload fish modal
                    $('#upload-id').val(fish.id ? fish.id : "Not available");
                    $('#kingdom').val(fish.kingdom ? fish.kingdom : "Not available");
                    $('#phylum').val(fish.phylum ? fish.phylum : "Not available");
                    $('#class').val(fish.class ? fish.class : "Not available");

                    // delete fish modal
              },
              error: function (xhr) {
                  console.error('Error fetching fish data:', xhr);
              }
          });
      }

        // Function to load fish images based on status
        function loadFishImages(fishId, status) {
            $.ajax({
                url: `/api/fish/${fishId}`,
                method: 'GET',
                success: function (response) {
                    const fish = response.data;
                    const filteredImages = fish.images.filter(image => image.status === status);

                    $('#fish-images').empty();

                    filteredImages.forEach(image => {
                        $('#fish-images').append(`
                            <div>
                                <img class="h-auto max-w-full rounded-lg" src="${image.image}" alt="Fish Image">
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
</body>
</html>
