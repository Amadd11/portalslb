@extends('layouts.app')

@section('title', 'Portal Sekolah')


@section('content')
    {{-- Hero Section --}}
    <section class="relative w-full h-full py-20 bg-gradient-to-b from-white via-gray-300 to-gray-100 mb-18">
        <div class="container mx-auto px-15 relative flex flex-col lg:flex-row items-center justify-center gap-3 ">
            {{-- Left Content --}}
            <div class="w-full lg:w-1/2 space-y-6 text-center lg:text-left">
                <h1 class="text-4xl sm:text-4xl md:text-4xl font-extrabold text-gray-900 leading-tight">
                    Selamat Datang di Portal Sekolah
                    <br>
                    <span class="text-blue-800">SLB Negeri 1 Lebong</span>
                </h1>
                <p class="text-gray-600 text-base md:text-lg leading-relaxed max-w-xl mx-auto lg:mx-0">
                    Informasi resmi seputar kegiatan, fasilitas, berita, dan galeri dari sekolah kami.
                </p>
                <div class="flex flex-col sm:flex-row sm:justify-center lg:justify-start gap-4">
                    <a href="#profil"
                        class="bg-blue-800 text-white px-6 py-3 rounded-full hover:bg-blue-900 transition w-full sm:w-auto text-center">
                        Jelajahi Sekolah →
                    </a>
                    <a href="#video"
                        class="flex items-center justify-center gap-2 border border-blue-800 px-6 py-3 rounded-full text-blue-800 hover:bg-blue-50 transition w-full sm:w-auto">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10l4.553-2.276A1 1 0 0 1 21 8.618v6.764a1 1 0 0 1-1.447.894L15 14V10z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 6h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2z" />
                        </svg>
                        Video
                    </a>
                </div>
                <div class="flex items-center justify-center lg:justify-start space-x-4 mt-6">
                    <span class="text-sm text-gray-500">We Are In Socials Media :</span>
                    <div class="flex space-x-2">
                        <a href="#" class="text-gray-600 hover:text-blue-600 transition"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-600 hover:text-blue-600 transition"><i
                                class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-600 hover:text-blue-600 transition"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>

            {{-- Right Swiper --}}
            <div class="w-full lg:w-1/2 relative rounded-xl overflow-hidden shadow-lg">
                <div class="swiper-container h-[250px] sm:h-[300px] md:h-[400px]">
                    <div class="swiper-wrapper">
                        @foreach ($images as $image)
                            <div class="swiper-slide">
                                <img src="{{ asset(Storage::url($image->path)) }}" class="w-full h-full object-cover"
                                    alt="{{ $image->title }}" loading="lazy">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Sambutan + Visi Misi + Pengumuman Section -->
    <section id="profil" class="py-8 px-4 sm:px-6 bg-white scroll-mt-20">
        <div class=" px-4 mx-auto">

            <!-- Grid Utama -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">

                <!-- Kolom Kiri - Foto -->
                <div class="flex justify-center items-start h-full">
                    <img src="{{ asset('assets/images/foto-sambutan.png') }}" alt="Kepala Sekolah"
                        class="w-full max-h-[600px] object-contain rounded-4xl bg-white">

                </div>

                <!-- Kolom Tengah - Sambutan -->
                <div class="flex flex-col justify-center space-y-4">
                    <span class="inline-block bg-blue-100 text-blue-800 text-2xl font-semibold px-4 py-1 rounded-full mb-2">
                        Sambutan Kepala Sekolah
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-bold mb-2">Selamat Datang</h2>
                    <p class="text-gray-700 mb-2">Assalamualaikum Warahmatullah Wabarakatuh</p>
                    <p class="text-gray-700 text-base leading-relaxed text-justify">
                        Alhamdulillah, kami bersyukur kepada Allah SWT karena dengan rahmat dan karunia-Nya, akhirnya kami
                        dapat
                        memperbarui Website SMK Negeri Contoh. Kami dengan tulus menyambut Anda di Website ini yang
                        ditujukan
                        untuk semua unsur pimpinan, guru, karyawan, siswa, dan masyarakat umum.
                    </p>
                    <p class="text-gray-700 text-base leading-relaxed text-justify">
                        Melalui website ini, kami berharap semua pihak dapat mengakses informasi mengenai profil sekolah,
                        kegiatan, dan fasilitas kami. Tentu saja, website sekolah kami masih memiliki kekurangan. Oleh
                        karena
                        itu, kami mengharapkan masukan dan kritik yang membangun untuk kemajuan ke depannya.
                    </p>
                </div>

                <!-- Kolom Kanan - Visi Misi + Pengumuman -->
                <aside class="space-y-4 w-full md:w-100">
                    <!-- Pengumuman -->
                    <div class="bg-blue-50 p-3 rounded-lg shadow-md space-y-3">
                        <h3 class="text-xl font-semibold text-blue-800">📢 Pengumuman</h3>

                        <!-- Slider Container -->
                        <div class="swiper pengumuman-slider relative max-w-[400px] mx-auto">
                            <div class="swiper-wrapper">
                                @foreach ($pengumumans as $pengumuman)
                                    <div class="swiper-slide flex flex-col items-center text-center">
                                        <!-- Gambar Pengumuman -->
                                        <div class="relative w-full">
                                            <img src="{{ asset(Storage::url($pengumuman->gambar_url)) }}"
                                                alt="{{ $pengumuman->judul }}"
                                                class="rounded-lg shadow-md w-full h-[250px] object-cover" loading="lazy">
                                        </div>

                                        <!-- Judul Pengumuman -->
                                        <h3 class="mt-3 text-lg font-semibold text-gray-800">
                                            {{ $pengumuman->judul }}
                                        </h3>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <!-- Visi Misi -->
                    <div class="bg-gray-300/45 p-7 rounded-lg shadow-md">
                        <h2 class="text-2xl font-bold mb-2 text-center">Visi</h2>
                        <p class="text-gray-700 text-sm mb-3 text-justify">Terwujudnya SLB Negeri 1 Lebong yang <span
                                class="font-bold">HEBAT</span>
                            (<span class="font-bold">H</span>umanis, <span class="font-bold">E</span>dukatif, <span
                                class="font-bold">B</span>erkarakter, <span class="font-bold">A</span>khlak Mulia, <span
                                class="font-bold">T</span>erampil).
                        </p>
                        <h2 class="text-2xl font-bold mb-2 text-center">Misi</h2>
                        <ul class="list-disc px-2 text-gray-700 space-y-1 text-sm">
                            <li>Sekolah humanis yang memberi kebebasan berkreativitas sesuai bakat peserta didik
                                berkebutuhan khusus.</li>
                            <li>Pendidikan yang membangun karakter peserta didik berkebutuhan khusus.</li>
                            <li>Lingkungan sekolah yang peduli, bersih, aman, asri, dan sehat.</li>
                            <li>Peserta didik berkebutuhan khusus yang mandiri, terampil, jujur, dan religious.</li>
                        </ul>
                    </div>
                </aside>

            </div>

            <!-- Link Galeri di Bawah Grid -->
            <div class="flex justify-center pr-100 mt-3">
                <a href="{{ route('sekolah.index') }}" class="text-blue-600 font-medium hover:underline">Lihat Profil
                    Sekolah →</a>
            </div>

        </div>
    </section>


    {{-- Fasilitas --}}
    <section id="fasilitas" class="mt-16 px-4 sm:px-6">
        <h2 class="text-2xl sm:text-3xl font-bold mb-8 text-center">Fasilitas Unggulan</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-4">
            @foreach ($fasilitas as $item)
                <div class="bg-white rounded-lg shadow p-4 text-center hover:shadow-lg transition">
                    <img src="{{ asset(Storage::url($item->gambar_url[0])) }}" alt="{{ $item->nama_fasilitas }}"
                        class="w-full h-70 object-cover rounded mb-4">
                    <h4 class="font-semibold mb-2">{{ $item->nama_fasilitas }}</h4>
                    <p class="text-sm text-gray-600">{{ Str::limit($item->deskripsi, 80) }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Berita Terbaru --}}
    <section id="berita" class="mt-16 px-4 sm:px-6">
        <h2 class="text-2xl sm:text-3xl font-bold mb-8 text-center">Artikel Terbaru</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-4">
            @foreach ($berita as $post)
                <div class="bg-white rounded-lg shadow p-4 hover:shadow-lg hover:scale-105 transition ">
                    <img src="{{ asset(Storage::url($post->thumbnail)) }}" alt="{{ $post->judul }}"
                        class="w-full h-70 object-cover rounded mb-4" loading="lazy">
                    <h4 class="font-semibold mb-2">{{ $post->judul }}</h4>
                    <p class="text-sm text-gray-600">{{ Str::limit(strip_tags($post->isi), 150) }} </p>
                    <a href="{{ route('berita.show', $post->slug) }}"
                        class="text-blue-600 font-medium mt-2 inline-block">Baca Selengkapnya →</a>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Galeri --}}
    <section id="galeri" class="mt-16 mb-10 px-4 sm:px-6" x-data="autoScrollGaleri">
        <h2 class="text-2xl sm:text-3xl font-bold mb-8 text-center">Galeri Sekolah</h2>
        <div class="overflow-hidden relative group">
            <!-- Scroll Container -->
            <div class="overflow-x-auto overflow-y-hidden whitespace-nowrap scroll-smooth no-scrollbar"
                x-ref="scrollContainer" @mouseenter="pauseScroll" @mouseleave="resumeScroll">
                <div class="flex gap-4 w-max">

                    <!-- Loop Galeri -->
                    @foreach ($galeri as $foto)
                        <div class="w-[180px] sm:w-[220px] md:w-[250px] flex-shrink-0">
                            <div class="relative w-full aspect-[4/3] overflow-hidden rounded-lg">
                                <img src="{{ asset(Storage::url($foto->gambar_url)) }}" alt="{{ $foto->judul }}"
                                    @click="openImage('{{ asset(Storage::url($foto->gambar_url)) }}')"
                                    class="absolute inset-0 w-full h-full object-cover cursor-pointer hover:scale-90 transition duration-300">
                            </div>
                            <h4 class="font-semibold text-center mt-2 text-sm truncate">{{ $foto->judul }}</h4>
                        </div>
                    @endforeach

                    <!-- Duplikat untuk seamless -->
                    @foreach ($galeri as $foto)
                        <div class="w-[180px] sm:w-[220px] md:w-[250px] flex-shrink-0">
                            <div class="relative w-full aspect-[4/3] overflow-hidden rounded-lg">
                                <img src="{{ asset(Storage::url($foto->gambar_url)) }}" alt="{{ $foto->judul }}"
                                    @click="openModal = true; modalImage = '{{ asset(Storage::url($foto->gambar_url)) }}'"
                                    class="absolute inset-0 w-full h-full object-cover cursor-pointer hover:scale-95 transition duration-300">
                            </div>
                            <h4 class="font-semibold text-center mt-2 text-sm truncate">{{ $foto->judul }}</h4>
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- Tombol Prev -->
            <button @click="scrollPrev"
                class="absolute left-0 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-200 z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                ‹
            </button>
            <!-- Tombol Next -->
            <button @click="scrollNext"
                class="absolute right-0 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-200 z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                ›
            </button>
        </div>

        <!-- Modal -->
        <div x-show="openModal" x-cloak style="display: none;"
            class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50"
            @keydown.window.escape="openModal = false" @click.away="openModal = false">

            <div class="relative">
                <img :src="modalImage" alt="Image" class="max-w-full max-h-[90vh] rounded-lg shadow-lg">
                <button @click="openModal = false"
                    class="absolute top-2 right-2 bg-white rounded-full p-1 hover:bg-gray-200">✕</button>
            </div>
        </div>



        <div class="text-center mt-6">
            <a href="/galeri" class="text-blue-600 font-medium hover:underline">Lihat Semua Galeri →</a>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('js/swiper.js') }}"></script>
    <script src="{{ asset('js/homepage.js') }}"></script>
@endpush
