<div class="bg-gray-600/40 backdrop-blur-md shadow-md sticky top-0 z-50 rounded-2xl px-4">
    <div class="container mx-auto max-w-7xl px-2 sm:px-6 py-2 flex justify-between items-center">
        <a href="{{ url('/') }}" class="flex items-center space-x-1 sm:space-x-2 group">
            <img src="{{ asset('assets/images/logo-slb.png') }}" alt="Logo SLB"
                class="w-12 h-12 sm:w-14 sm:h-14 object-cover group-hover:scale-110 transition-transform rounded-full">

            <img src="{{ asset('assets/images/logo-dinas.png') }}" alt="Logo Dinas"
                class="w-12 h-12 sm:w-14 sm:h-14 object-contain group-hover:scale-110 transition-transform">

            <img src="{{ asset('assets/images/logo-kemendikbud.png') }}" alt="Logo Kemendikbud"
                class="hidden sm:block w-14 h-14 object-contain group-hover:scale-110 transition-transform">

            <div class="flex flex-col leading-tight">
                <span class="text-lg sm:text-xl font-extrabold text-blue-800">SLB NEGERI 1</span>
                <span class="text-base sm:text-lg font-semibold text-black">Lebong</span>
            </div>
        </a>

        <nav class="hidden md:flex space-x-5 items-center text-lg font-medium">
            <a href="/" class="text-black hover:text-blue-800 transition">Home</a>

            <div class="relative group">
                <button class="text-black hover:text-blue-800 transition flex items-center">
                    Profil
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div
                    class="absolute left-1/2 -translate-x-1/2 bg-white shadow-lg rounded-md mt-2 py-2 w-40 z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200 translate-y-2">
                    <a href="{{ route('sekolah.index') }}"
                        class="block px-4 py-2 text-black hover:bg-gray-100">Sekolah</a>
                    <a href="{{ route('guru.index') }}"
                        class="block px-4 py-2 text-black hover:bg-gray-100">Kepegawaian</a>
                    <a href="{{ route('siswa.index') }}" class="block px-4 py-2 text-black hover:bg-gray-100">Siswa</a>
                </div>
            </div>

            <a href="{{ route('berita.index') }}" class="text-black hover:text-blue-800 transition">Artikel</a>
            <a href="{{ route('fasilitas.index') }}" class="text-black hover:text-blue-800 transition">Fasilitas</a>

            <div class="relative group">
                <button class="text-black hover:text-blue-800 transition flex items-center">
                    Galeri
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div
                    class="absolute left-1/2 -translate-x-1/2 bg-white shadow-lg rounded-md mt-2 py-2 w-40 z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200 translate-y-2">
                    <a href="{{ route('galeri.foto') }}" class="block px-4 py-2 text-black hover:bg-gray-100">Foto</a>
                    <a href="{{ route('galeri.video') }}"
                        class="block px-4 py-2 text-black hover:bg-gray-100">Video</a>
                </div>
            </div>
            <a href="{{ route('kurikulum.index') }}" class="text-black hover:text-blue-800 transition">Kurikulum</a>
        </nav>

        <div class="md:hidden">
            <button id="menu-btn" class="text-black focus:outline-none focus:text-blue-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden px-6 pb-4 space-y-3 max-w-7xl mx-auto" x-data="{ openProfil: false, openGaleri: false }">
        <a href="/" class="block py-2 text-black hover:text-blue-800">Home</a>

        <div>
            <button @click="openProfil = !openProfil; openGaleri = false"
                class="w-full flex justify-between items-center py-2 text-black hover:text-blue-800">
                Profil
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200"
                    :class="{ 'rotate-180': openProfil }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="openProfil" x-transition class="mt-2 space-y-2 pl-4 border-l-2 border-gray-200">
                <a href="{{ route('sekolah.index') }}" class="block text-black hover:text-blue-800">Sekolah</a>
                <a href="{{ route('guru.index') }}" class="block text-black hover:text-blue-800">Kepegawaian</a>
                <a href="{{ route('siswa.index') }}" class="block text-black hover:text-blue-800">Siswa</a>
            </div>
        </div>

        <a href="{{ route('berita.index') }}" class="block py-2 text-black hover:text-blue-800">Artikel</a>
        <a href="{{ route('fasilitas.index') }}" class="block py-2 text-black hover:text-blue-800">Fasilitas</a>

        <div>
            <button @click="openGaleri = !openGaleri; openProfil = false"
                class="w-full flex justify-between items-center py-2 text-black hover:text-blue-800">
                Galeri
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200"
                    :class="{ 'rotate-180': openGaleri }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="openGaleri" x-transition class="mt-2 space-y-2 pl-4 border-l-2 border-gray-200">
                <a href="{{ route('galeri.foto') }}" class="block text-black hover:text-blue-800">Foto</a>
                <a href="{{ route('galeri.video') }}" class="block text-black hover:text-blue-800">Video</a>
            </div>
        </div>
        <a href="{{ route('kurikulum.index') }}"
            class="block py-2 text-black hover:text-blue-800 transition">Kurikulum</a>
    </div>
</div>

@push('scripts')
    {{-- Pastikan file toggle.js ada di public/js/toggle.js --}}
    <script src="{{ asset('js/toggle.js') }}"></script>
@endpush
