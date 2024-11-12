<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Fishco Admin Login Page</title>
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Token CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-25 h-25 mr-1" src="{{ asset('images/logo/logo-fishco-med.svg') }}" alt="logo">   
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your admin account
                    </h1>
                    <form id="loginForm" class="space-y-4 md:space-y-6">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="example@fisco.com" required="">
                            <small id="emailError" class="text-red-500"></small> <!-- Tempat pesan error email -->
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            <small id="passwordError" class="text-red-500"></small> <!-- Tempat pesan error password -->
                        </div>
                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                    </form>
                    <div id="errorAlert" class="hidden"></div>
                </div>
            </div>
        </div>
    </section>
    
<script>
$(document).ready(function() {
    if (localStorage.getItem('user') || localStorage.getItem('token')) {
        window.location.href = '/fish';
    }

    $('#loginForm').on('submit', function(e) {
        e.preventDefault();

        const email = $('#email').val();
        const password = $('#password').val();
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/api/requestTokenAdmin',
            type: 'POST',
            dataType: 'json',
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: JSON.stringify({
                email: email,
                password: password,
                device_name: 'web'
            }),
            success: function(response) {
                let token = response.token;
                
                $.ajax({
                    url: `/api/profile`,
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        localStorage.setItem('user', JSON.stringify(response));
                        localStorage.setItem('token', token);

                        window.location.href = '/fish';
                    },
                    error: function (xhr) {
                        localStorage.removeItem('user');
                        localStorage.removeItem('token');
                    }
                }); 
            },
            error: function(xhr) {
                let errorMessage = 'Login failed';
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMessage = xhr.responseJSON.error;
                        } else if (xhr.responseText) {
                            errorMessage = xhr.responseText;
                        }

                        // Create the alert HTML dynamically
                        const alertHtml = `
                            <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">Access Denied:</span> ${errorMessage}
                                </div>
                            </div>
                        `;

                        // Inject the alert HTML into the placeholder and make it visible
                        $('#errorAlert').html(alertHtml).removeClass('hidden');
            }
        });
    });
});
</script>
</body>
</html>
