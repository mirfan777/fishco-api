<x-layout.main>
    @include('pages.user.modals.create')
    @include('pages.user.modals.edit') 
    <main class="sm:ml-64 min-h-screen bg-gray-50 pt-10 mt-5">
        <section class="dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto w-full h-full px-4 lg:px-12">
                <h2 class="text-title-md2 font-bold text-black dark:text-white mb-6" style="font-size: 24px;">Tabel User</h2>
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <!-- Bagian Pencarian dan Tombol Tambah Data -->
                    <div class="flex flex-col md:flex-row items-center justify-between p-4 space-y-3 md:space-y-0 md:space-x-4">
                        <!-- Tombol Tambah Data -->
                        <div class="w-full md:w-auto">
                            <button data-modal-target="create-user" data-modal-toggle="create-user" class="bg-[#0278c7] hover:bg-[#0362a1] text-white font-medium rounded-lg text-sm px-5 py-2.5">Tambah data</button>
                        </div>
                    </div>
                    

                    <!-- Tabel Data Penyakit -->
                    <div class="overflow-x-auto p-5">
                        <table class="w-full text-sm text-left text-gray-500 " id="user-table" >
                            <thead class="bg-gray-50 text-gray-700 uppercase text-xs dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="flex items-center">
                                            Id 
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="flex items-center">
                                            Nama 
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="flex items-center">
                                            Role
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="flex items-center">
                                            Email
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="flex items-center">
                                            No. Telepon
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="flex items-center">
                                            Alamat
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-4 py-3">Aksi</th>
                                </tr> 
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout.main>

<script>
     let currentUserId = null;
    let dataTable;

    const initializeModalPosition = () => {
        $('#edit-user').removeClass('hidden').addClass('flex').css({
            'justify-content': 'center',
            'align-items': 'center'
        });
    };

    const initializeDataTable = () => {
        if (dataTable) {
            dataTable.destroy(); // Destroy previous instance if it exists
        }

        dataTable = new simpleDatatables.DataTable("#user-table", {
            searchable: true,
            paging: true,
            perPage: 5,
            perPageSelect: [5, 10, 15, 20, 25],
            sortable: true
        });
    };
    
    const fetchUserDataById = (id) => {
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
                        $('#edit-user-password').val(user.password);
                        $('#edit-user-confirm-password').val(user.password);
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

    const fetchUserData = () => {
        $.ajax({
            url: `/api/users`,
            method: 'GET',
            headers: { 
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json',
            },
            success: function(response) {
                console.log("API Response:", response);

                const userTableBody = $('#user-table tbody'); // Target the tbody directly
                userTableBody.empty();

                if (response.data && response.data.length > 0) {
                    response.data.forEach(user => {
                        userTableBody.append(`
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">${user.id}</td>
                                <td class="px-4 py-3">${user.name}</td>
                                <td class="px-4 py-3">${user.role}</td>
                                <td class="px-4 py-3">${user.email}</td>
                                <td class="px-4 py-3">${user.phone_number}</td>
                                <td class="px-4 py-3">${user.address}</td>
                                <td class="px-4 py-3">
                                    <button data-modal-target="edit-user" data-modal-toggle="edit-user" onclick="fetchUserDataById(${user.id})" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-1 px-2 rounded">Edit</button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded" onclick="confirmDelete(${user.id})">Hapus</button>
                                </td>
                            </tr>
                        `);
                    });
                } else {
                    userTableBody.append(`
                        <tr>
                            <td colspan="3" class="px-4 py-3 text-center">Data tidak ditemukan</td>
                        </tr>
                    `);
                }

                // Reinitialize DataTable after updating the content
                initializeDataTable();
            },
            error: function(xhr, status, error) {
                console.error("API Error:", error);
                $('#user-table tbody').html(`
                    <tr>
                        <td colspan="3" class="px-4 py-3 text-center">Data tidak ditemukan</td>
                    </tr>
                `);
            }
        });
    };

    function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah kamu yakin untuk menghapus?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0e91e9',
                cancelButtonColor: '#f56565',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/api/user/delete/${id}`,
                        type: 'DELETE',
                        processData: false,
                        contentType: false,
                        headers: { 
                            'Authorization': `Bearer ${localStorage.getItem('token')}`,
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Accept': 'application/json',
                        },
                        success: function(result) {
                            Swal.fire({
                                title: 'Terhapus!',
                                text: 'User berhasil dihapus.',
                                icon: 'success',
                                timer: 1200, 
                                showConfirmButton: false
                            }).then(() => {
                                location.reload(); // Reload the page to reflect changes
                            });
                        },
                        error: function(err) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Gagal untuk menghapus user, silahkan coba lagi',
                                icon: 'error',
                                timer: 1200, 
                                showConfirmButton: false
                            });
                        }
                    });
                }
            });
        }


    fetchUserData();
</script>