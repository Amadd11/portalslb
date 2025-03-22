<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>@yield('title', 'Portal Sekolah')</title>
    @vite('resources/css/app.css') {{-- Tailwind CSS --}}
</head>

<body class="bg-gray-50 text-gray-800 scroll-smooth">
    <header class=" bg-gray-600/40 backdrop-blur-md shadow-md sticky top-0 z-50 rounded-2xl px-4">
        <div class="container mx-auto max-w-7xl px-6 py-2 flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center space-x-2 group">
                <!-- Icon -->
                <img src="{{ asset('assets/images/logo-kemendikbud.png') }}" alt="Logo Sekolah"
                    class="w-14 h-14 object-contain group-hover:scale-110 transition-transform">
                <!-- Text -->
                <div class="flex flex-col leading-tight">
                    <span class="text-xl font-extrabold text-blue-800">SLB NEGERI 1</span>
                    <span class="text-lg font-semibold text-black">Lebong</span>
                </div>
            </a>
            <!-- Desktop Menu -->
            <nav class="hidden md:flex space-x-6 items-center text-lg font-medium">
                <a href="/" class="text-black hover:text-blue-800 transition">Home</a>

                <!-- Dropdown Profil on hover -->
                <div class="relative group">
                    <button class="text-black hover:text-blue-800 transition flex items-center gap-1">
                        Profil
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 transition-transform duration-200 group-hover:rotate-180" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="absolute bg-white shadow rounded mt-2 py-2 w-40 z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200 translate-y-2">
                        <a href="/profil" class="block px-4 py-2 text-black hover:bg-gray-100">Sekolah</a>
                        <a href="{{ route('guru.index') }}"
                            class="block px-4 py-2 text-black hover:bg-gray-100">Guru</a>
                    </div>
                </div>

                <a href="{{ route('berita.index') }}" class="text-black hover:text-blue-800 transition">Artikel</a>
                <a href="{{ route('fasilitas.index') }}" class="text-black hover:text-blue-800 transition">Fasilitas</a>
                <a href="/galeri" class="text-black hover:text-blue-800 transition">Galeri</a>
            </nav>

            <!-- Mobile Hamburger -->
            <div class="md:hidden">
                <button id="menu-btn" class="text-black focus:outline-none focus:text-blue-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden md:hidden px-6 pb-4 space-y-3 max-w-7xl mx-auto" x-data="{ openProfil: false }">
            <a href="/" class="block text-black hover:text-blue-800">Home</a>

            <!-- Dropdown Profil -->
            <div>
                <button @click="openProfil = !openProfil"
                    class="w-full flex justify-between items-center text-black hover:text-blue-800">
                    Profil
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200"
                        :class="{ 'rotate-180': openProfil }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="openProfil" class="mt-2 space-y-2 pl-4">
                    <a href="/profil" class="block text-black hover:text-blue-800">Sekolah</a>
                    <a href="{{ route('guru.index') }}" class="block text-black hover:text-blue-800">Guru</a>
                </div>
            </div>

            <a href="{{ route('berita.index') }}" class="block text-black hover:text-blue-800">Artikel</a>
            <a href="{{ route('fasilitas.index') }}" class="block text-black hover:text-blue-800">Fasilitas</a>
            <a href="/galeri" class="block text-black hover:text-blue-800">Galeri</a>
        </div>

    </header>

    <main class="container mx-auto py-0 ">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white p-4 ">
        <div class="container mx-auto flex flex-col lg:flex-row gap-10">

            <!-- Kiri -->
            <div class="lg:w-1/2 flex flex-col space-y-4 ">
                <!-- Logo dan Judul -->
                <div class="flex items-center px-4 space-x-4">
                    <img src="{{ asset('assets/images/logo-kemendikbud.png') }}" alt="Logo SLB" class="w-20 h-20">
                    <h3 class="text-2xl font-bold text-gray-300">SLB NEGERI 1 LEBONG</h3>
                </div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d509933.8502318125!2d101.6359573890625!3d-3.132149499999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e317a71a59da9c3%3A0xf273836985d4a7e8!2sSLB%20N%20Lebong!5e0!3m2!1sid!2sid!4v1742559839922!5m2!1sid!2sid"
                    width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="rounded shadow"></iframe>
            </div>

            <!-- Kanan -->
            <div class="lg:w-1/2  flex flex-col space-y-4 text-gray-300">
                <div class="flex gap-3 justify-center lg:justify-start">
                    <a href="#" class="w-9 h-9 flex items-center justify-center border rounded-full"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="#" class="w-9 h-9 flex items-center justify-center border rounded-full"><i
                            class="fab fa-instagram"></i></a>
                    <a href="#" class="w-9 h-9 flex items-center justify-center border rounded-full"><i
                            class="fab fa-youtube"></i></a>
                </div>
                <h4 class="font-bold text-xl">Lokasi Sekolah</h4>
                <p><i class="fas fa-map-marker-alt mr-2"></i>Jln. Lintas Curup Muara Aman, Ds. Lemeu Pit, Kec. Lebong
                    Sakti, Kabupaten Lebong, Bengkulu 39264</p>
                <p><i class="fas fa-envelope mr-2"></i> slbn1lebong@gmail.com</p>
                <p><i class="fas fa-phone mr-2"></i> 0842 815131</p>
            </div>
        </div>
        &copy; {{ date('Y') }} Sekolah Kita. All rights reserved.
    </footer>
</body>

<script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>

</html>
