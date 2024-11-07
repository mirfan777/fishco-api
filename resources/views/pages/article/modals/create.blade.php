<!-- Main Modal for Creating Article -->
<div id="create-article" tabindex="-1" aria-hidden="true" class="hidden overflow-x-hidden fixed top-0 right-0 left-0 z-[99999] bg-black bg-opacity-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)]">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal Content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Artikel Baru
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="create-article">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="p-4 md:p-5 space-y-4">
                <form id="createArticleForm" class="w-full">
                    <div class="flex flex-col md:flex-row md:justify-between w-full gap-5">
                        <div class="md:w-1/2">
                            <!-- Title -->
                            <div class="mb-3">
                                <label for="create-article-title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                <input type="text" id="create-article-title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter article title" required />
                            </div>
                            <!-- Slug -->
                            <div class="mb-3">
                                <label for="create-article-slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                                <input type="text" id="create-article-slug" name="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter article slug" required />
                            </div>
                        </div>
                        
                        <div class="md:w-1/2">
                            <!-- Description/Body -->
                            <div class="mb-3">
                                <label for="create-article-body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                                <textarea id="create-article-body" name="body" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter article body" required></textarea>
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
    $('#create-article form').on('submit', function(e) {
        e.preventDefault();

        console.log('Form submission triggered');

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
            title: $('#create-article-title').val(),
            slug: $('#create-article-slug').val(),
            body: $('#create-article-body').val(),
            user_id : 1
        };

        console.log('Form Data:', formData);

        const submitBtn = $(this).find('button[type="submit"]');
        submitBtn.prop('disabled', true);

        $.ajax({
            url: '/api/article/create',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Article has been successfully added',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    $('#create-article form')[0].reset();
                    $('#create-article').hide();
                    $('[data-modal-hide="create-article"]').click();
                });
                setTimeout(function () {
                    location.reload();
                }, 500);
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to add article. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                console.error('AJAX Error:', xhr.responseText || error);
            },
            complete: function() {
                submitBtn.prop('disabled', false);
            }
        });
    });

    function validateForm() {
        let isValid = true;

        $('#create-article form input[required], #create-article form textarea[required]').each(function() {
            if (!$(this).val()) {
                $(this).addClass('border-red-500');
                isValid = false;
            } else {
                $(this).removeClass('border-red-500');
            }
        });

        console.log('Validation Result:', isValid);
        return isValid;
    }

    $('#create-article form input, #create-article form textarea').on('input', function() {
        if ($(this).val()) {
            $(this).removeClass('border-red-500');
        }
    });s
});
</script>
