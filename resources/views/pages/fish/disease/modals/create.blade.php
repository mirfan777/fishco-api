<!-- Main modal -->
<div id="create-disease" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-999999 bg-black bg-opacity-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
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
                        <!-- General -->
                        <div class="md:w-1/2">
                            <!-- Disease Name -->
                            <div class="mb-3">
                                <label for="disease_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disease Name</label>
                                <input type="text" id="disease_name" name="disease_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter disease name" required />
                            </div>

                            <!-- Affected Fish Type -->
                            <div class="mb-3">
                                <label for="fish_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Affected Fish Type</label>
                                <input type="text" id="fish_type" name="fish_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter fish type" required />
                            </div>

                            <!-- Symptoms -->
                            <div class="mb-3">
                                <label for="symptoms" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Symptoms</label>
                                <input type="text" id="symptoms" name="symptoms" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter disease symptoms" required />
                            </div>

                            <!-- Cause -->
                            <div class="mb-3">
                                <label for="cause" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cause</label>
                                <input type="text" id="cause" name="cause" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter disease cause" required />
                            </div>

                            <!-- Treatment -->
                            <div class="mb-3">
                                <label for="treatment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Treatment</label>
                                <input type="text" id="treatment" name="treatment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter treatment" required />
                            </div>

                            <!-- Prevention -->
                            <div class="mb-3">
                                <label for="prevention" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prevention</label>
                                <input type="text" id="prevention" name="prevention" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter prevention method" required />
                            </div>
                        </div>

                        <div class="md:w-1/2">
                            <!-- Environment -->
                            <!-- Water Type -->
                            <div class="mb-3">
                                <label for="water_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Water Type</label>
                                <input type="text" id="water_type" name="water_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Example: Freshwater, Saltwater" required />
                            </div>

                            <!-- Temperature -->
                            <div class="mb-3">
                                <label for="temperature" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Temperature (°C)</label>
                                <input type="number" step="0.1" id="temperature" name="temperature" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter temperature" required />
                            </div>

                            <!-- pH -->
                            <div class="mb-3">
                                <label for="ph" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Water pH</label>
                                <input type="number" step="0.1" id="ph" name="ph" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter water pH" required />
                            </div>

                            {{-- thumbnail dan overview --}}
                            <div>
                                <label for="disease_detail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disease Details</label>
                                <textarea id="disease_detail" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write details about the disease..."></textarea>

                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload disease image</label>
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
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

  