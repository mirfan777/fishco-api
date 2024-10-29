<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fishco Landing Page</title>
    @vite(['resources/css/style.css', 'resources/css/satoshi.css', 'resources/js/app.js'])
</head>

<body class="bg-white relative">
    <!-- Main Section Start -->
    <section class="relative h-screen bg-[#F4FAFF] p-6 pt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center w-[90%] lg:w-[70%] mx-auto">
            <div class="w-full flex justify-between items-center col-span-full md:col-start-1 md:col-end-3 z-10">
                <div class="flex items-center space-x-2">
                    <img src="{{'images/landing/logo.png'}}" alt="Fishco Logo" class="h-16 md:h-20">
                </div>
                <!-- Hamburger Menu Button for Mobile -->
                <div class="md:hidden">
                    <button id="menu-button" class="text-gray-600 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
                <!-- Navbar -->
                <div id="navbar" class="hidden md:flex space-x-8 lg:space-x-12">
                    <a href="#" class="text-sm lg:text-xl font-semibold text-gray-600 hover:text-blue-500">Tentang
                        Kami</a>
                    <a href="#" class="text-sm lg:text-xl font-semibold text-gray-600 hover:text-blue-500">Fitur</a>
                    <a href="#" class="text-sm lg:text-xl font-semibold text-gray-600 hover:text-blue-500">Testimoni</a>
                    <a href="#" class="text-sm lg:text-xl font-semibold text-gray-600 hover:text-blue-500">FAQ</a>
                    <a href="#" class="text-sm lg:text-xl font-semibold text-gray-600 hover:text-blue-500">Kontak
                        Kami</a>
                </div>
            </div>
            <div class="space-y-6 lg:space-y-8 md:col-start-1 md:row-span-2 z-10">
                <h1 class="text-4xl lg:text-6xl font-bold text-gray-800 leading-tight">Solusi Cerdas Bagi para Pecinta
                    <span class="text-blue-600">Ikan Hias</span>
                </h1>
                <p class="text-lg lg:text-3xl text-gray-600 leading-relaxed">Nikmati kemudahan mendeteksi penyakit,
                    mengatur
                    ekosistem akuarium, dan mendapatkan tips perawatan terbaik.</p>
                <div class="flex space-x-4">
                    <a href="#"><img src="{{'images/landing/appstore.png'}}" alt="App Store"
                            class="h-10 md:h-12 lg:h-13"></a>
                    <a href="#"><img src="{{'images/landing/playstore.png'}}" alt="Google Play"
                            class="h-10 md:h-12 lg:h-13"></a>
                </div>
            </div>

            <div class="relative md:col-start-2 md:row-span-2 flex justify-center md:justify-end">
                <img src="{{'images/landing/scanner-header.png'}}" alt="Phone with Fish"
                    class="w-full md:w-[80%] lg:w-full object-cover">
            </div>
        </div>
    </section>
    <!-- Main Section End -->

    <!-- Features Start -->
    <div id="feature" class="container mx-auto py-10">
        <div class="text-center">
            <h5 class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 font-medium">App
                Features</h5>
            <h1 class="mb-8 text-4xl font-bold">Awesome Features</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Feature 1 -->
            <div
                class="feature-item bg-gray-100 rounded-lg p-6 transition-transform transform hover:-translate-y-3 hover:shadow-lg">
                <div
                    class="flex items-center justify-center bg-gradient-to-r from-blue-500 to-purple-500 rounded-full mb-4 w-14 h-14">
                    <i class="fa fa-eye text-white text-2xl"></i>
                </div>
                <h5 class="text-xl font-semibold mb-2">Scanner</h5>
                <p class="text-gray-600">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet
                    diam sed stet lorem.</p>
            </div>
            <!-- Feature 2 -->
            <div
                class="feature-item bg-gray-100 rounded-lg p-6 transition-transform transform hover:-translate-y-3 hover:shadow-lg">
                <div
                    class="flex items-center justify-center bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mb-4 w-14 h-14">
                    <i class="fa fa-layer-group text-white text-2xl"></i>
                </div>
                <h5 class="text-xl font-semibold mb-2">Fishbot</h5>
                <p class="text-gray-600">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet
                    diam sed stet lorem.</p>
            </div>
            <!-- Feature 3 -->
            <div
                class="feature-item bg-gray-100 rounded-lg p-6 transition-transform transform hover:-translate-y-3 hover:shadow-lg">
                <div
                    class="flex items-center justify-center bg-gradient-to-r from-blue-500 to-purple-500 rounded-full mb-4 w-14 h-14">
                    <i class="fa fa-edit text-white text-2xl"></i>
                </div>
                <h5 class="text-xl font-semibold mb-2">Ensiklopedia</h5>
                <p class="text-gray-600">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet
                    diam sed stet lorem.</p>
            </div>
            <!-- Feature 4 -->
            <div
                class="feature-item bg-gray-100 rounded-lg p-6 transition-transform transform hover:-translate-y-3 hover:shadow-lg">
                <div
                    class="flex items-center justify-center bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mb-4 w-14 h-14">
                    <i class="fa fa-shield-alt text-white text-2xl"></i>
                </div>
                <h5 class="text-xl font-semibold mb-2">Set Ekosistem</h5>
                <p class="text-gray-600">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet
                    diam sed stet lorem.</p>
            </div>
            <!-- Feature 5 -->
            <div
                class="feature-item bg-gray-100 rounded-lg p-6 transition-transform transform hover:-translate-y-3 hover:shadow-lg">
                <div
                    class="flex items-center justify-center bg-gradient-to-r from-blue-500 to-purple-500 rounded-full mb-4 w-14 h-14">
                    <i class="fa fa-cloud text-white text-2xl"></i>
                </div>
                <h5 class="text-xl font-semibold mb-2">Artikel</h5>
                <p class="text-gray-600">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet
                    diam sed stet lorem.</p>
            </div>
            <!-- Feature 6 -->
            <div
                class="feature-item bg-gray-100 rounded-lg p-6 transition-transform transform hover:-translate-y-3 hover:shadow-lg">
                <div
                    class="flex items-center justify-center bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mb-4 w-14 h-14">
                    <i class="fa fa-mobile-alt text-white text-2xl"></i>
                </div>
                <h5 class="text-xl font-semibold mb-2">Responsive</h5>
                <p class="text-gray-600">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet
                    diam sed stet lorem.</p>
            </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- Screenshot Start -->
    <div class="container mx-auto py-10">
        <div class="py-10 px-5 lg:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 items-center">
                <!-- Text Section -->
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 font-medium">
                        Screenshot</h5>
                    <h1 class="text-4xl font-bold mb-4">User Friendly interface And Very Easy To Use Fishco App</h1>
                    <p class="mb-4 text-gray-600">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                        labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit clita duo justo eirmod
                        magna dolore erat amet</p>
                    <ul class="space-y-3 mb-4">
                        <li class="flex items-center"><i class="fa fa-check text-blue-500 mr-3"></i>Diam dolor diam
                            ipsum et tempor sit</li>
                        <li class="flex items-center"><i class="fa fa-check text-blue-500 mr-3"></i>Aliqu diam amet diam
                            et eos labore</li>
                        <li class="flex items-center"><i class="fa fa-check text-blue-500 mr-3"></i>Clita erat ipsum et
                            lorem et sit</li>
                    </ul>
                </div>
                <!-- Image Section -->
                <div class="flex justify-center lg:justify-end wow fadeInUp" data-wow-delay="0.3s">
                    <div class="relative w-64 h-96 p-4 bg-white rounded-lg shadow-lg">
                        <div class="absolute inset-0 bg-center bg-no-repeat bg-contain z-10"
                            style="background-image: url('/path/to/screenshot-frame.png');"></div>
                        <div class="relative z-20 w-56 h-88">
                            <img class="w-full h-full object-cover" src="/path/to/screenshot-1.png" alt="Screenshot">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Screenshot End -->

    <!-- Process Start -->
    <div class="container mx-auto py-10">
        <div class="text-center pb-4">
            <h5 class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 font-medium">How It
                Works</h5>
            <h1 class="text-4xl font-bold mb-5">3 Langkah Mudah</h1>
        </div>
        <div class="grid lg:grid-cols-3 gap-8 justify-center">
            <div class="text-center pt-4">
                <div
                    class="relative bg-gray-50 rounded-lg pt-10 pb-6 px-6 shadow-md transition transform hover:scale-105 hover:shadow-lg duration-300">
                    <div
                        class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full w-24 h-24 flex items-center justify-center shadow-lg transition hover:scale-110 duration-300">
                        <i class="fa fa-cog fa-3x text-white"></i>
                    </div>
                    <h5 class="mt-8 mb-3 text-lg font-semibold">Install Aplikasi</h5>
                    <p class="text-gray-600">Tempor erat elitr rebum clita dolor diam ipsum sit diam amet diam eos erat
                        ipsum et lorem et sit sed stet</p>
                </div>
            </div>
            <div class="text-center pt-4">
                <div
                    class="relative bg-gray-50 rounded-lg pt-10 pb-6 px-6 shadow-md transition transform hover:scale-105 hover:shadow-lg duration-300">
                    <div
                        class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full w-24 h-24 flex items-center justify-center shadow-lg transition hover:scale-110 duration-300">
                        <i class="fa fa-address-card fa-3x text-white"></i>
                    </div>
                    <h5 class="mt-8 mb-3 text-lg font-semibold">Siapkan Profil Kamu</h5>
                    <p class="text-gray-600">Tempor erat elitr rebum clita dolor diam ipsum sit diam amet diam eos erat
                        ipsum et lorem et sit sed stet</p>
                </div>
            </div>
            <div class="text-center pt-4">
                <div
                    class="relative bg-gray-50 rounded-lg pt-10 pb-6 px-6 shadow-md transition transform hover:scale-105 hover:shadow-lg duration-300">
                    <div
                        class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full w-24 h-24 flex items-center justify-center shadow-lg transition hover:scale-110 duration-300">
                        <i class="fa fa-check fa-3x text-white"></i>
                    </div>
                    <h5 class="mt-8 mb-3 text-lg font-semibold">Nikmati Fiturnya</h5>
                    <p class="text-gray-600">Tempor erat elitr rebum clita dolor diam ipsum sit diam amet diam eos erat
                        ipsum et lorem et sit sed stet</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Process End -->

    <!-- Testimoni Section Start -->
    <section class="bg-[#F4FAFF] py-16 px-4 sm:px-6 lg:px-8 text-center">
        <!-- Title -->
        <h2 class="text-xl md:text-2xl lg:text-4xl font-bold text-gray-800 leading-tight">Testimoni</h2>
        <!-- Testimonial Text -->
        <blockquote class="text-sm italic md:text-base lg:text-lg text-gray-600 leading-relaxed mt-4">
            “Aplikasi yang luar biasa! Ikan cupang saya sakit dan Fishco langsung mendeteksi penyakitnya dengan akurat.
            Berkat
            saran dari aplikasinya, sekarang ikan saya sehat kembali!”
        </blockquote>
        <!-- Name and Role -->
        <p class="text-xl font-semibold text-gray-800">
            Zayn Orlando - <span class="text-purple-600">Pendiri YouTube</span>
        </p>
        <!-- Profile Images -->
        <div class="flex justify-center space-x-4 mt-8">
            <img src="/img/profile1.jpg" alt="Profile 1" class="w-16 h-16 rounded-full object-cover">
            <img src="/img/profile2.jpg" alt="Profile 2" class="w-16 h-16 rounded-full object-cover">
            <img src="/img/profile3.jpg" alt="Profile 3" class="w-16 h-16 rounded-full object-cover">
            <img src="/img/profile4.jpg" alt="Profile 4" class="w-16 h-16 rounded-full object-cover">
            <img src="/img/profile5.jpg" alt="Profile 5" class="w-16 h-16 rounded-full object-cover">
            <img src="/img/profile6.jpg" alt="Profile 6" class="w-16 h-16 rounded-full object-cover">
            <img src="/img/profile7.jpg" alt="Profile 7" class="w-16 h-16 rounded-full object-cover">
        </div>
    </section>
    <!-- Testimoni Section End -->

    <!-- Contact Start -->
    <div class="container mx-auto py-10" id="contact">
        <div class="text-center">
            <h5 class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 font-medium">Kontak
                Kami</h5>
            <h1 class="text-4xl font-bold mb-5">Get In Touch!</h1>
        </div>
        <div class="flex justify-center">
            <div class="w-full lg:w-2/3">
                <p class="text-center mb-4 text-gray-600">
                    Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem
                    et sit, sed stet no labore lorem sit clita duo justo eirmod magna dolore erat amet.
                </p>
                <form>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="relative">
                            <input type="text" id="name" placeholder="Namu Kamu"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                        </div>
                        <div class="relative">
                            <input type="email" id="email" placeholder="Email Kamu"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                        </div>
                        <div class="col-span-2">
                            <input type="text" id="subject" placeholder="Subject"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                        </div>
                        <div class="col-span-2">
                            <textarea id="message" rows="6" placeholder="Pesan"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                        </div>
                        <div class="col-span-2 text-center">
                            <button type="submit"
                                class="bg-gradient-to-r from-blue-500 to-purple-500 text-white py-3 px-6 rounded-full hover:from-purple-500 hover:to-pink-500 transition duration-300">
                                Kirim Pesan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Download Section Start -->
    <div class="bg-[#F4FAFF] py-10">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-semibold mb-5">Download Aplikasi Fishco untuk iOS & Android</h2>
            <div class="flex justify-center space-x-4">
                <!-- App Store Button -->
                <a href="{{'images/landing/appstore.png'}}" target="_blank">
                    <img src="{{'images/landing/appstore.png'}}" alt="Download on the App Store" class="h-14">
                </a>
                <!-- Google Play Button -->
                <a href="{{'images/landing/playstore.png'}}" target="_blank">
                    <img src="{{'images/landing/playstore.png'}}" alt="Get it on Google Play" class="h-14">
                </a>
            </div>
        </div>
    </div>
    <!-- Download Section End -->

    <!-- Mobile Navbar (Hidden by Default) -->
    <div id="mobile-menu" class="hidden absolute top-16 left-0 w-full bg-white z-20 md:hidden">
        <div class="flex flex-col space-y-4 p-4">
            <a href="#" class="text-lg font-semibold text-gray-600 hover:text-blue-500">Fitur</a>
            <a href="#" class="text-lg font-semibold text-gray-600 hover:text-blue-500">Testimoni</a>
            <a href="#" class="text-lg font-semibold text-gray-600 hover:text-blue-500">FAQ</a>
            <a href="#" class="text-lg font-semibold text-gray-600 hover:text-blue-500">Kontak Kami</a>
        </div>
    </div>

    <script>
        // Toggle Mobile Navbar Visibility
        document.getElementById('menu-button').addEventListener('click', function () {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // JavaScript for FAQ Dropdown
        document.querySelectorAll('.faq-question').forEach(button => {
            button.addEventListener('click', () => {
                const answer = button.nextElementSibling;
                const allAnswers = document.querySelectorAll('.faq-answer');
                const allQuestions = document.querySelectorAll('.faq-question');
                const allIcons = document.querySelectorAll('.faq-icon');

                // Close all answers except the one clicked
                allAnswers.forEach(a => {
                    if (a !== answer) {
                        a.classList.add('hidden');
                    }
                });

                // Reset all questions to white background except the one clicked
                allQuestions.forEach(q => {
                    q.classList.remove('bg-gradient-to-r', 'from-[#7DC9FC]', 'to-[#38ABF8]');
                    q.classList.add('bg-white');
                });

                // Reset all icons to "+"
                allIcons.forEach(icon => {
                    icon.textContent = "+";
                    icon.classList.remove('rotate-180');
                });

                // Toggle the current answer visibility
                answer.classList.toggle('hidden');

                // Change background to gradient and icon to "-" when clicked
                const icon = button.querySelector('.faq-icon');
                if (!answer.classList.contains('hidden')) {
                    icon.textContent = "-";
                    icon.classList.add('rotate-180');
                    button.classList.remove('bg-white');
                    button.classList.add('bg-gradient-to-r', 'from-[#7DC9FC]', 'to-[#38ABF8]');
                }
            });
        });

    </script>

</body>

</html>