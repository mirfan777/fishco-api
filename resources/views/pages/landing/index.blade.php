<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fishco Landing Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white relative">
  <!-- Main Section -->
  <section class="relative h-screen bg-[#F4FAFF] p-6 pt-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center w-[90%] lg:w-[70%] mx-auto">
      <div class="w-full flex justify-between items-center col-span-full md:col-start-1 md:col-end-3 z-10">
        <div class="flex items-center space-x-2">
          <img src="/img/logo.png" alt="Fishco Logo" class="h-16 md:h-20">
        </div>
        <!-- Hamburger Menu Button for Mobile -->
        <div class="md:hidden">
          <button id="menu-button" class="text-gray-600 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
              class="w-8 h-8">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
          </button>
        </div>
        <!-- Navbar Links -->
        <div id="navbar" class="hidden md:flex space-x-8 lg:space-x-12">
          <a href="#" class="text-sm lg:text-xl font-semibold text-gray-600 hover:text-blue-500">Tentang Kami</a>
          <a href="#" class="text-sm lg:text-xl font-semibold text-gray-600 hover:text-blue-500">Fitur</a>
          <a href="#" class="text-sm lg:text-xl font-semibold text-gray-600 hover:text-blue-500">Testimoni</a>
          <a href="#" class="text-sm lg:text-xl font-semibold text-gray-600 hover:text-blue-500">FAQ</a>
          <a href="#" class="text-sm lg:text-xl font-semibold text-gray-600 hover:text-blue-500">Kontak Kami</a>
        </div>
      </div>

      <div class="space-y-6 lg:space-y-8 md:col-start-1 md:row-span-2 z-10">
        <h1 class="text-4xl lg:text-6xl font-bold text-gray-800 leading-tight">Solusi Cerdas Bagi para Pecinta <span
            class="text-blue-600">Ikan Hias</span></h1>
        <p class="text-lg lg:text-3xl text-gray-600 leading-relaxed">Nikmati kemudahan mendeteksi penyakit, mengatur
          ekosistem akuarium, dan mendapatkan tips perawatan terbaik.</p>
        <div class="flex space-x-4">
          <a href="#"><img src="/img/appstore.png" alt="App Store" class="h-10 md:h-12 lg:h-13"></a>
          <a href="#"><img src="/img/playstore.png" alt="Google Play" class="h-10 md:h-12 lg:h-13"></a>
        </div>
      </div>

      <div class="relative md:col-start-2 md:row-span-2 flex justify-center md:justify-end">
        <img src="/img/scanner-header.png" alt="Phone with Fish" class="w-full md:w-[80%] lg:w-full object-cover">
      </div>
    </div>
  </section>

  <!-- Tentang Kami -->
  <section class="bg-white-100 py-16 px-4 sm:px-6 lg:px-8 w-[90%] lg:w-[70%] mx-auto">
    <div class="container mx-auto">
      <!-- Statistic Section -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 text-center">
        <!-- Download -->
        <div>
          <h2 class="text-4xl font-bold text-blue-600">+200M</h2>
          <p class="text-gray-600 mt-2">Download</p>
        </div>
        <!-- Transaction -->
        <div>
          <h2 class="text-4xl font-bold text-blue-600">+480M</h2>
          <p class="text-gray-600 mt-2">Transaction</p>
        </div>
        <!-- Ratings -->
        <div>
          <h2 class="text-4xl font-bold text-blue-600">+180M</h2>
          <p class="text-gray-600 mt-2">Ratings</p>
        </div>
      </div>

      <!-- Kisah Kami Section -->
      <div class="text-center mt-12">
        <h2 class="text-3xl lg:text-5xl font-bold text-gray-800 leading-tight">Kisah Kami</h2>
        <p class="text-lg lg:text-2xl text-gray-600 leading-relaxed">
          Kami melihat diri kami sebagai tim amatir yang penuh semangat, dan terus berjuang menghadapi berbagai
          tantangan
          pembuatan aplikasi scanner penyakit ikan hias yang kami beri nama Fishco.
        </p>
      </div>
      <!-- How Fishco is Built Section -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-12">
        <!-- Placeholder Image -->
        <div class="bg-gray-200 h-64"></div>
        <!-- Text Content -->
        <div>
          <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 leading-tight">Bagaimana Fishco Terbuat</h2>
          <p class="text-lg lg:text-2xl text-gray-600 leading-relaxed">
            Fishco adalah aplikasi yang dibuat oleh tim Cuko Pempek Enjoyer yang beranggotakan Maulana Irfan, Farhan
            Hakim,
            Zolla Perdana Putra Harahap, dan Adrian Fardan Andi. Aplikasi ini dibuat karena kami bertujuan untuk
            membantu
            para pemilik ikan hias untuk lebih memahami ikan yang dimiliki.
          </p>
          <p class="text-lg lg:text-2xl text-gray-600 leading-relaxed">
            Pada 21 Agustus 2024, kami tergerak untuk mengembangkan ide ini lebih lanjut dan menjadikannya sebagai
            aplikasi
            yang kita kembangkan.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Fitur Andalan Section -->
  <section class="relative bg-[#F4FAFF] py-16 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <div class="w-[90%] lg:w-[70%] mx-auto">
      <!-- Title -->
      <div class="text-center mb-12">
        <h2 class="text-3xl lg:text-5xl font-bold text-gray-800 leading-tight">Fitur Andalan</h2>
      </div>

      <!-- Grid Layout for Content -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

        <!-- Image Column 1, Row 1 -->
        <div class="flex justify-center">
          <img src="/img/fitur_andalan1.png" alt="Phone with Fish" class="w-70 md:w-[20rem] lg:w-[30rem] object-cover">
        </div>

        <!-- Text Column 2, Row 1 -->
        <div class="space-y-4">
          <h3 class="text-3xl lg:text-4xl font-bold text-gray-800 leading-tight">Scanner Penyakit Ikan</h3>
          <p class="text-lg lg:text-2xl text-gray-600 leading-relaxed">Dengan sekali klik, scanner ini dapat mendeteksi penyakit yang dimiliki oleh ikan
            hias peliharaanmu secara akurat dan cepat!</p>
        </div>

        <!-- Text Column 1, Row 2 -->
        <div class="space-y-4">
          <h3 class="text-3xl lg:text-4xl font-bold text-gray-800 leading-tight">Fishbot</h3>
          <p class="text-lg lg:text-2xl text-gray-600 leading-relaxed">Tidak puas dengan hasil scan? Fishbot siap menjawab pertanyaanmu dan memberi solusi
            terbaik kapan saja, 24/7!</p>
        </div>

        <!-- Image Column 2, Row 2 -->
        <div class="flex justify-center">
          <img src="/img/fitur_andalan2.png" alt="Fishbot" class="w-70 md:w-[20rem] lg:w-[30rem] object-cover">
        </div>

      </div>
    </div>
  </section>

  <!-- Video Showcase Section -->
  <section class="relative bg-gradient-to-r from-blue-400 to-blue-600 py-16 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <!-- Wavy Background -->
    <div class="absolute inset-0">
      <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#3B82F6" fill-opacity="1" d="M0,96L1440,256L1440,320L0,320Z"></path>
      </svg>
    </div>

    <!-- Content -->
    <div class="relative z-10">
      <!-- Title -->
      <div class="text-center mb-12">
        <h2 class="text-3xl lg:text-5xl font-bold text-white leading-tight">More visuals of our apps</h2>
        <p class="mt-4 text-lg text-white">Vestibulum sit amet tortor sit amet libero lobortis semper at et odio.</p>
      </div>

      <!-- Video Container -->
      <div class="relative flex justify-center">
        <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-4xl">
          <!-- Embedded Video -->
          <div class="aspect-w-16 aspect-h-9">
            <iframe class="rounded-lg w-full h-full" src="https://www.youtube.com/embed/dQw4w9WgXcQ"
              title="Video Showcase" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimoni Section -->
  <section class="bg-[#F4FAFF] py-16 px-4 sm:px-6 lg:px-8 text-center">
    <!-- Title -->
    <h2 class="text-3xl lg:text-5xl font-bold text-gray-800 leading-tight">Testimoni</h2>

    <!-- Testimonial Text -->
    <blockquote class="text-lg italic text-gray-600 mb-6">
      “Aplikasi yang luar biasa! Ikan cupang saya sakit dan Fishco langsung mendeteksi penyakitnya dengan akurat. Berkat
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


  <!-- FAQ Section -->
  <section class="relative bg-white-50 py-16 px-4 sm:px-6 lg:px-8 overflow-hidden w-[90%] lg:w-[70%] mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
      <!-- Left Side (Title and Image) -->
      <div>
        <h2 class="text-3xl lg:text-5xl font-bold text-gray-800 leading-tight">FAQ</h2>
        <p class="text-gray-600 mb-8">Pertanyaan yang sering diajukan mengenai aplikasi FishCo.</p>
        <img src="/img/faq-illustration.png" alt="FAQ Illustration" class="w-full h-auto">
      </div>

      <!-- Right Side (FAQ List) -->
      <div>
        <div class="faq-item">
          <button
            class="faq-question flex justify-between items-center text-left text-lg font-semibold text-gray-800 w-full py-4 px-6 bg-white hover:bg-[#7DC9FC] transition-colors mb-2">
            Apa itu FishCo?
            <span class="faq-icon transform transition-transform duration-300">+</span>
          </button>
          <div class="faq-answer hidden px-6 pb-4">
            Fishco adalah sebuah aplikasi cerdas untuk merawat ikan hias dengan fitur scanner penyakit, chatbot AI, dan
            set ekosistem.
          </div>
        </div>

        <div class="faq-item">
          <button
            class="faq-question flex justify-between items-center text-left text-lg font-semibold text-gray-800 w-full py-4 px-6 bg-white hover:bg-[#7DC9FC] transition-colors mb-2">
            Bagaimana cara kerja scanner penyakit ikan?
            <span class="faq-icon transform transition-transform duration-300">+</span>
          </button>
          <div class="faq-answer hidden px-6 pb-4">
            Scanner bekerja dengan menganalisis gambar ikan yang diunggah dan mendeteksi tanda-tanda penyakit secara
            otomatis.
          </div>
        </div>

        <div class="faq-item">
          <button
            class="faq-question flex justify-between items-center text-left text-lg font-semibold text-gray-800 w-full py-4 px-6 bg-white hover:bg-[#7DC9FC] transition-colors mb-2">
            Apakah semua jenis ikan bisa didiagnosis oleh FishCo?
            <span class="faq-icon transform transition-transform duration-300">+</span>
          </button>
          <div class="faq-answer hidden px-6 pb-4">
            Saat ini, FishCo mendukung diagnosis untuk berbagai jenis ikan hias populer, namun terus diperbarui untuk
            mencakup lebih banyak spesies.
          </div>
        </div>

        <div class="faq-item">
          <button
            class="faq-question flex justify-between items-center text-left text-lg font-semibold text-gray-800 w-full py-4 px-6 bg-white hover:bg-[#7DC9FC] transition-colors mb-2">
            Apakah FishCo bisa digunakan oleh pemula?
            <span class="faq-icon transform transition-transform duration-300">+</span>
          </button>
          <div class="faq-answer hidden px-6 pb-4">
            Ya, FishCo sangat ramah pengguna dan mudah digunakan, bahkan untuk pemula sekalipun.
          </div>
        </div>

        <div class="faq-item">
          <button
            class="faq-question flex justify-between items-center text-left text-lg font-semibold text-gray-800 w-full py-4 px-6 bg-white hover:bg-[#7DC9FC] transition-colors mb-2">
            Apakah FishCo gratis?
            <span class="faq-icon transform transition-transform duration-300">+</span>
          </button>
          <div class="faq-answer hidden px-6 pb-4">
            FishCo menawarkan versi gratis dengan fitur dasar dan paket berlangganan untuk fitur premium.
          </div>
        </div>
      </div>
    </div>
  </section>

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