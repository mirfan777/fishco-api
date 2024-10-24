<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fishco Landing Page</title>
    @vite(['resources/css/style.css', 'resources/css/satoshi.css', 'resources/js/app.js'])
    <!-- owl carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- CDN ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- <link href="{{'lib/animate/animate.min.css'}}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet"> -->
</head>

<body class="bg-white relative">
    <!-- Main Section Start -->
    <section class="relative h-screen bg-[#FAFAFA] p-6 pt-10">
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
                    <a href="#" class="text-sm lg:text-xl font-semibold text-gray-600 hover:text-blue-500">Home</a>
                    <a href="#" class="text-sm lg:text-xl font-semibold text-gray-600 hover:text-blue-500">Tentang Kami</a>
                    <a href="#" class="text-sm lg:text-xl font-semibold text-gray-600 hover:text-blue-500">Fitur</a>
                    <a href="#" class="text-sm lg:text-xl font-semibold text-gray-600 hover:text-blue-500">Review</a>
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

    <!-- About Us Start -->
    <div id="about" class="container mx-auto w-[90%] lg:w-[70%] py-10">
        <div class="text-center">
            <h5 class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 font-medium">Tentang
                Kami</h5>
            <h1 class="mb-8 text-4xl font-bold">Kisah Kami</h1>
            <p class="text-gray-600 w-[80%] mx-auto">Kami melihat diri kami sebagai tim amatir yang penuh semangat, dan
                terus berjuang menghadapi berbagai tantangan dalam pembuatan aplikasi scanner penyakit ikan hias yang
                kami beri nama Fishco.</p> <br><br>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-0 mt-4">
            <!-- Image Section -->
            <div class="flex items-center justify-center">
                <img src="{{'images/landing/cuko-pempek-enjoyer.png'}}" alt="Cuko Pempek Enjoyer"
                    class="rounded-lg shadow-lg max-w-[70%]" />
            </div>

            <!-- Story Section -->
            <div class="flex flex-col justify-center">
                <h2 class="text-3xl font-bold mb-3">Bagaimana Fishco Dibuat</h2>
                <p class="text-gray-600 mb-3">
                    Fishco adalah aplikasi yang dibuat oleh tim Cuko Pempek Enjoyer yang beranggotakan Maulana Irfan,
                    Farhan Hakim, Zolla Perdana Putra Harahap, dan Adrian Fardan Andi. Aplikasi ini dibuat karena kami
                    bertujuan untuk membantu para pemilik ikan hias untuk lebih memahami ikan yang dimiliki.
                </p>
                <p class="text-gray-600">
                    Pada 21 Agustus 2024, kami tergerak untuk mengembangkan ide ini lebih lanjut dan menjadikan ini
                    sebagai aplikasi yang kita kembangkan.
                </p>
            </div>
        </div>
    </div>
    <!-- About Us End -->

    <!-- Features Start -->
    <div id="feature" class="container mx-auto w-[90%] lg:w-[70%] py-10">
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
                    class="flex items-center justify-center bg-gradient-to-r from-[#38ABF8] to-[#0278C7] rounded-full mb-4 w-14 h-14">
                    <i class="fa fa-qrcode text-white text-2xl"></i>
                </div>
                <h5 class="text-xl font-semibold mb-2">Scanner</h5>
                <p class="text-gray-600">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet
                    diam sed stet lorem.</p>
            </div>
            <!-- Feature 2 -->
            <div
                class="feature-item bg-gray-100 rounded-lg p-6 transition-transform transform hover:-translate-y-3 hover:shadow-lg">
                <div
                    class="flex items-center justify-center bg-gradient-to-r from-[#0278C7] to-[#075385] rounded-full mb-4 w-14 h-14">
                    <i class="fa fa-robot text-white text-2xl"></i>
                </div>
                <h5 class="text-xl font-semibold mb-2">Fishbot</h5>
                <p class="text-gray-600">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet
                    diam sed stet lorem.</p>
            </div>
            <!-- Feature 3 -->
            <div
                class="feature-item bg-gray-100 rounded-lg p-6 transition-transform transform hover:-translate-y-3 hover:shadow-lg">
                <div
                    class="flex items-center justify-center bg-gradient-to-r from-[#38ABF8] to-[#0278C7] rounded-full mb-4 w-14 h-14">
                    <i class="fa fa-book text-white text-2xl"></i>
                </div>
                <h5 class="text-xl font-semibold mb-2">Ensiklopedia</h5>
                <p class="text-gray-600">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet
                    diam sed stet lorem.</p>
            </div>
            <!-- Feature 4 -->
            <div
                class="feature-item bg-gray-100 rounded-lg p-6 transition-transform transform hover:-translate-y-3 hover:shadow-lg">
                <div
                    class="flex items-center justify-center bg-gradient-to-r from-[#0278C7] to-[#075385] rounded-full mb-4 w-14 h-14">
                    <i class="fa fa-fish text-white text-2xl"></i>
                </div>
                <h5 class="text-xl font-semibold mb-2">Set Ekosistem</h5>
                <p class="text-gray-600">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet
                    diam sed stet lorem.</p>
            </div>
            <!-- Feature 5 -->
            <div
                class="feature-item bg-gray-100 rounded-lg p-6 transition-transform transform hover:-translate-y-3 hover:shadow-lg">
                <div
                    class="flex items-center justify-center bg-gradient-to-r from-[#38ABF8] to-[#0278C7] rounded-full mb-4 w-14 h-14">
                    <i class="fa fa-file-alt text-white text-2xl"></i>
                </div>
                <h5 class="text-xl font-semibold mb-2">Artikel</h5>
                <p class="text-gray-600">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet
                    diam sed stet lorem.</p>
            </div>
            <!-- Feature 6 -->
            <div
                class="feature-item bg-gray-100 rounded-lg p-6 transition-transform transform hover:-translate-y-3 hover:shadow-lg">
                <div
                    class="flex items-center justify-center bg-gradient-to-r from-[#0278C7] to-[#075385] rounded-full mb-4 w-14 h-14">
                    <i class="fa fa-pills text-white text-2xl"></i>
                </div>
                <h5 class="text-xl font-semibold mb-2">Obat</h5>
                <p class="text-gray-600">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet
                    diam sed stet lorem.</p>
            </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- Screenshot Section Start -->
    <div class="container mx-auto w-[90%] lg:w-[70%] py-10">
        <div class="py-10 px-5 lg:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 items-center">
                <!-- Text Section -->
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 font-medium">
                        Screenshot</h5>
                    <h1 class="text-4xl font-bold mb-4">User Friendly Interface And Very Easy To Use Fishco App</h1>
                    <p class="mb-4 text-gray-600">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                        labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit clita duo justo eirmod
                        magna dolore erat amet.</p>
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
                <div class="flex justify-center lg:justify-end wow fadeInUp relative" data-wow-delay="0.3s">
                    <!-- Image Container with Frame -->
                    <div class="relative w-[280px] h-[550px] p-4 bg-transparent rounded-lg overflow-hidden">
                        <!-- Frame (adjust the size to avoid cropping) -->
                        <div class="absolute inset-0 bg-center bg-no-repeat bg-contain z-20"
                            style="background-image: url('/images/landing/screenshot-frame.png'); background-size: 99%;">
                        </div>
                        <!-- Screenshot Carousel -->
                        <div class="owl-carousel owl-theme" id="screenshot-carousel">
                            <img class="w-full h-full object-cover rounded-2xl"
                                src="{{'images/landing/Screenshot-1.jpg'}}" alt="Screenshot 1">
                            <img class="w-full h-full object-cover rounded-2xl"
                                src="{{'images/landing/Screenshot-2.jpg'}}" alt="Screenshot 2">
                            <img class="w-full h-full object-cover rounded-2xl"
                                src="{{'images/landing/Screenshot-3.jpg'}}" alt="Screenshot 3">
                            <img class="w-full h-full object-cover rounded-2xl"
                                src="{{'images/landing/Screenshot-4.jpg'}}" alt="Screenshot 4">
                            <img class="w-full h-full object-cover rounded-2xl"
                                src="{{'images/landing/Screenshot-5.jpg'}}" alt="Screenshot 5">
                            <img class="w-full h-full object-cover rounded-2xl"
                                src="{{'images/landing/Screenshot-6.jpg'}}" alt="Screenshot 6">
                        </div>
                    </div>

                    <!-- Custom Dots Navigation -->
                    <div id="customDots"
                        class="absolute top-1/2 right-[-40px] transform -translate-y-1/2 flex flex-col space-y-3 z-30">
                        <span
                            class="dot w-4 h-4 bg-gradient-to-r from-[#38ABF8] to-[#0278C7] rounded-full cursor-pointer"
                            data-slide="0"></span>
                        <span
                            class="dot w-4 h-4 bg-gradient-to-r from-[#38ABF8] to-[#0278C7] rounded-full cursor-pointer"
                            data-slide="1"></span>
                        <span
                            class="dot w-4 h-4 bg-gradient-to-r from-[#38ABF8] to-[#0278C7] rounded-full cursor-pointer"
                            data-slide="2"></span>
                        <span
                            class="dot w-4 h-4 bg-gradient-to-r from-[#38ABF8] to-[#0278C7] rounded-full cursor-pointer"
                            data-slide="3"></span>
                        <span
                            class="dot w-4 h-4 bg-gradient-to-r from-[#38ABF8] to-[#0278C7] rounded-full cursor-pointer"
                            data-slide="4"></span>
                        <span
                            class="dot w-4 h-4 bg-gradient-to-r from-[#38ABF8] to-[#0278C7] rounded-full cursor-pointer"
                            data-slide="5"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Screenshot Section End -->

    <!-- Process Start -->
    <div class="container mx-auto w-[90%] lg:w-[70%] py-10">
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
                        class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-[#38ABF8] to-[#0278C7] rounded-full w-24 h-24 flex items-center justify-center shadow-lg transition hover:scale-110 duration-300">
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
                        class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-[#0278C7] to-[#075385] rounded-full w-24 h-24 flex items-center justify-center shadow-lg transition hover:scale-110 duration-300">
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
                        class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-[#38ABF8] to-[#0278C7] rounded-full w-24 h-24 flex items-center justify-center shadow-lg transition hover:scale-110 duration-300">
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
    <section class="py-16 px-4 sm:px-6 lg:px-8 text-center relative">
        <div class="text-center pb-4">
            <h5 class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 font-medium">
                Testimoni</h5>
            <h1 class="text-4xl font-bold mb-5">Apa yang dikatakan mereka</h1>
        </div>

        <blockquote id="testimonial-text"
            class="text-gray-700 text-sm italic md:text-lg lg:text-xl leading-relaxed mt-4 max-w-2xl mx-auto">
            Aplikasi yang luar biasa! Ikan cupang saya sakit dan Fishco langsung mendeteksi penyakitnya dengan
            akurat. Berkat saran dari aplikasinya, sekarang ikan saya sehat kembali!
        </blockquote>

        <p id="testimonial-name" class="mt-4 text-xl font-semibold text-gray-800">
            <span class="font-bold" style="color: #0362A1">Zayn Orlando</span> - <span class="font-normal"
                style="color: #0362A1">Pendiri YouTube</span>
        </p>

        <div class="container mx-auto w-[90%] lg:w-[70%] py-10 relative">
            <button id="prev"
                class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-300 rounded-full p-2 hover:bg-gray-400">
                <i class="fas fa-chevron-left text-lg text-gray-600"></i>
            </button>

            <div class="testimonial-carousel flex justify-center space-x-8 mt-8 relative overflow-visible">
                <img data-index="0" src="{{'images/landing/profile-1.png'}}" alt="Profile 1"
                    class="profile-img w-12 h-12 sm:w-16 sm:h-16 rounded-full object-contain cursor-pointer transition-transform duration-300 ease-out">
                <img data-index="1" src="{{'images/landing/profile-2.png'}}" alt="Profile 2"
                    class="profile-img w-12 h-12 sm:w-16 sm:h-16 rounded-full object-contain cursor-pointer transition-transform duration-300 ease-out">
                <img data-index="2" src="{{'images/landing/profile-3.png'}}" alt="Profile 3"
                    class="profile-img w-12 h-12 sm:w-16 sm:h-16 rounded-full object-contain cursor-pointer transition-transform duration-300 ease-out">
                <img data-index="3" src="{{'images/landing/profile-4.png'}}" alt="Profile 4"
                    class="profile-img w-12 h-12 sm:w-16 sm:h-16 rounded-full object-contain cursor-pointer transition-transform duration-300 ease-out">
                <img data-index="4" src="{{'images/landing/profile-5.png'}}" alt="Profile 5"
                    class="profile-img w-12 h-12 sm:w-16 sm:h-16 rounded-full object-contain cursor-pointer transition-transform duration-300 ease-out">
                <img data-index="5" src="{{'images/landing/profile-6.png'}}" alt="Profile 6"
                    class="profile-img w-12 h-12 sm:w-16 sm:h-16 rounded-full object-contain cursor-pointer transition-transform duration-300 ease-out">
                <img data-index="6" src="{{'images/landing/profile-7.png'}}" alt="Profile 7"
                    class="profile-img w-12 h-12 sm:w-16 sm:h-16 rounded-full object-contain cursor-pointer transition-transform duration-300 ease-out">
            </div>

            <button id="next"
                class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-300 rounded-full p-2 hover:bg-gray-400">
                <i class="fas fa-chevron-right text-lg text-gray-600"></i>
            </button>
        </div>
    </section>
    <!-- Testimoni Section End -->

    <!-- Contact Start -->
    <div class="container mx-auto w-[90%] lg:w-[70%] py-10" id="contact">
        <div class="text-center">
            <h5 class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 font-medium">
                Kontak
                Kami</h5>
            <h1 class="text-4xl font-bold mb-5">Get In Touch!</h1>
        </div>
        <div class="flex justify-center">
            <div class="w-full">
                <p class="text-center mb-4 text-gray-600">
                    Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et
                    lorem
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
                                class="bg-gradient-to-r from-[#38ABF8] to-[#0278C7] text-white py-3 px-6 rounded-full hover:from-purple-500 hover:to-pink-500 transition duration-300">
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

    <footer class="bg-white py-10">
        <div class="container mx-auto w-[90%] lg:w-[70%] py-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center md:text-left">
                <!-- Navigation Section -->
                <div>
                    <h5 class="text-lg font-semibold text-gray-800 mb-3">NAVIGATION</h5>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-blue-500">Home</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-500">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-500">Fitur</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-500">Review</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-500">Kontak Kami</a></li>
                    </ul>
                </div>

                <!-- What We Do Section -->
                <div>
                    <h5 class="text-lg font-semibold text-gray-800 mb-3">WHAT WE DO</h5>
                    <p class="text-gray-600">
                        Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et
                        lorem et sit.
                    </p>
                </div>

                <!-- Talk to Us Section -->
                <div class="text-right"> <!-- Text aligned to the right -->
                    <h5 class="text-lg font-semibold text-gray-800 mb-3">TALK TO US</h5>
                    <ul class="space-y-2">
                        <li><a href="mailto:fishco@gmail.com"
                                class="text-gray-600 hover:text-blue-500">fishco@gmail.com</a></li>
                        <li><a href="tel:+6212345678" class="text-gray-600 hover:text-blue-500">+62 12345678</a>
                        </li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-500">Facebook</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-500">Linkedin</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-500">Twitter</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-500">Instagram</a></li>
                    </ul>
                </div>
            </div>

            <div class="mt-10 border-t pt-5 flex flex-col md:flex-row items-center justify-center">
                <div class="flex items-center space-x-2 mb-4 md:mb-0">
                    <img src="{{'images/landing/logo.png'}}" alt="Fishco Logo" class="h-16 md:h-20">
                </div>

                <div class="flex-grow text-center">
                    <p class="text-gray-500">&copy; 2024 Fishco. All Rights Reserved.</p>
                </div>

                <div class="flex space-x-4">
                    <a href="#" class="text-gray-500 hover:text-gray-800"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-500 hover:text-gray-800"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="text-gray-500 hover:text-gray-800"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-500 hover:text-gray-800"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

        </div>
    </footer>


    <!-- Mobile Navbar (Hidden by Default) -->
    <div id="mobile-menu" class="hidden absolute top-16 left-0 w-full bg-white z-20 md:hidden">
        <div class="flex flex-col space-y-4 p-4">
            <a href="#" class="text-lg font-semibold text-gray-600 hover:text-blue-500">Fitur</a>
            <a href="#" class="text-lg font-semibold text-gray-600 hover:text-blue-500">Testimoni</a>
            <a href="#" class="text-lg font-semibold text-gray-600 hover:text-blue-500">FAQ</a>
            <a href="#" class="text-lg font-semibold text-gray-600 hover:text-blue-500">Kontak Kami</a>
        </div>
    </div>

    <!-- scrtipt owl carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


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

        // skrinsut
        $(document).ready(function () {
            $("#screenshot-carousel").owlCarousel({
                items: 1, // Tampilkan 1 gambar per slide
                loop: true, // Untuk membuat carousel berputar terus-menerus
                margin: 10, // Spasi antar item (jika diperlukan)
                nav: true, // Menampilkan tombol next/prev
                dots: true, // Menampilkan dots navigasi
                autoplay: false, // Mengaktifkan autoplay
                autoplayTimeout: 5000, // Waktu antara slide otomatis (dalam ms)
                autoplayHoverPause: true, // Pause autoplay ketika user hover
                // smartSpeed: 1000, // Kecepatan transisi (dalam ms) saat klik
                // autoplaySpeed: 1000, // Kecepatan transisi saat autoplay (dalam ms)
                dotsContainer: '#customDots', // Custom dot navigation (di luar carousel)
                responsive: {
                    0: {
                        items: 1 // Tampilkan 1 item di layar kecil
                    },
                    600: {
                        items: 1 // Tampilkan 1 item di layar sedang
                    },
                    1000: {
                        items: 1 // Tampilkan 1 item di layar besar
                    }
                }
            });

            // Klik dot untuk berpindah slide
            $('.dot').on('click', function () {
                var slideIndex = $(this).data('slide');
                $('#screenshot-carousel').trigger('to.owl.carousel', [slideIndex, 300]);
            });
        });

        //Testimoni
        const testimonials = [
            {
                text: "Aplikasi yang luar biasa! Ikan cupang saya sakit dan Fishco langsung mendeteksi penyakitnya dengan akurat. Berkat saran dari aplikasinya, sekarang ikan saya sehat kembali!",
                name: "Zayn Orlando",
                role: "Pendiri YouTube",
                profile: "{{'images/landing/profile-1.png'}}"
            },
            {
                text: "Fishco memberikan saya wawasan yang luar biasa tentang cara menjaga ikan saya tetap sehat. Benar-benar aplikasi yang sangat bermanfaat!",
                name: "Sara Lim",
                role: "Ahli Akuakultur",
                profile: "{{'images/landing/profile-2.png'}}"
            },
            {
                text: "Berkat Fishco, saya dapat mengetahui penyakit ikan saya lebih cepat. Aplikasinya mudah digunakan dan sangat membantu!",
                name: "Ken Yamada",
                role: "Peternak Ikan",
                profile: "{{'images/landing/profile-3.png'}}"
            },
            {
                text: "Saya merekomendasikan Fishco untuk semua peternak ikan. Ini membantu saya untuk menjaga kondisi ikan saya tetap optimal.",
                name: "Lina Gomez",
                role: "Penggemar Akuarium",
                profile: "{{'images/landing/profile-4.png'}}"
            },
            {
                text: "Aplikasi ini sangat mempermudah dalam merawat ikan-ikan saya. Deteksi penyakitnya cepat dan tepat!",
                name: "Michael Chen",
                role: "Hobiis Ikan Hias",
                profile: "{{'images/landing/profile-5.png'}}"
            },
            {
                text: "Fishco membantu saya mengidentifikasi masalah ikan saya dengan sangat cepat. Sangat berguna untuk pemula dan ahli!",
                name: "Siti Rahmawati",
                role: "Kolektor Ikan",
                profile: "{{'images/landing/profile-6.png'}}"
            },
            {
                text: "Sangat direkomendasikan untuk pecinta ikan. Fishco memberikan saran yang tepat dan cepat untuk kesehatan ikan.",
                name: "Andreas Nurhadi",
                role: "Pakar Perikanan",
                profile: "{{'images/landing/profile-7.png'}}"
            }
        ];

        // Inisialisasi
        let currentIndex = 0;

        // Pilih elemen HTML
        const testimonialText = document.getElementById('testimonial-text');
        const testimonialName = document.getElementById('testimonial-name');
        const profileImages = document.querySelectorAll('.profile-img');

        // Fungsi untuk memperbarui testimoni
        let isFirstLoad = true;

        function updateTestimonial(index) {
            const testimonial = testimonials[index];
            testimonialText.textContent = testimonial.text;
            testimonialName.innerHTML = `<span class="font-bold" style="color: #0362A1">${testimonial.name}</span> - <span class="font-normal" style="color: #0362A1">${testimonial.role}</span>`;

            // Hapus kelas aktif dari semua gambar profil
            profileImages.forEach(img => {
                img.classList.remove('scale-150', 'ring', 'ring-blue-400');
            });

            // Tambahkan kelas aktif ke gambar yang dipilih
            profileImages[index].classList.add('scale-150', 'ring', 'ring-blue-400');

            // Hanya scroll jika bukan load pertama kali
            if (!isFirstLoad) {
                profileImages[index].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
            }

            isFirstLoad = false; // Setelah load pertama, set ke false
        }

        // Event listener untuk tombol panah
        document.getElementById('prev').addEventListener('click', () => {
            currentIndex = (currentIndex === 0) ? testimonials.length - 1 : currentIndex - 1;
            updateTestimonial(currentIndex);
        });

        document.getElementById('next').addEventListener('click', () => {
            currentIndex = (currentIndex === testimonials.length - 1) ? 0 : currentIndex + 1;
            updateTestimonial(currentIndex);
        });

        // Event listener untuk klik pada gambar profil
        profileImages.forEach((img, index) => {
            img.addEventListener('click', () => {
                currentIndex = index;
                updateTestimonial(index);
            });
        });

        // Inisialisasi testimoni pertama
        updateTestimonial(currentIndex);
    </script>

</body>

</html>