@extends('layouts.app')

@section('title', 'Portal Sekolah')

@section('content')
    {{-- Hero Section --}}
    <section class="relative w-full h-full py-20 bg-gradient-to-b from-white via-gray-300 to-gray-100">
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
                                    alt="{{ $image->title }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Swiper Script --}}
        <script>
            const swiper = new Swiper('.swiper-container', {
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                effect: 'fade',
                speed: 1000,
            });
        </script>
    </section>

    {{-- Sambutan Kepala Sekolah --}}
    <section id="profil" class="py-8 px-4 sm:px-6 bg-white">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- Foto Kepala Sekolah -->
            <div class="flex justify-center">
                <img src="{{ asset('assets/images/foto-sambutan.jpg') }}" alt="Kepala Sekolah"
                    class="w-80 h-auto object-cover rounded-lg">
            </div>
            <!-- Sambutan -->
            <div>
                <span
                    class="inline-block bg-blue-100 text-blue-800 text-2xl font-semibold px-4 py-1 rounded-full mb-4">Sambutan
                    Kepala Sekolah</span>
                <h2 class="text-3xl sm:text-4xl font-bold mb-4">Selamat Datang</h2>
                <p class="text-gray-700 mb-4">Assalamualaikum Warahmatullah Wabarakatuh</p>
                <p class="text-gray-700 text-base leading-relaxed">
                    Alhamdulillah, kami bersyukur kepada Allah SWT karena dengan rahmat dan karunia-Nya, akhirnya kami dapat
                    memperbarui Website SMK Negeri Contoh. Kami dengan tulus menyambut Anda di Website ini yang ditujukan
                    untuk semua unsur pimpinan, guru, karyawan, siswa, dan masyarakat umum.
                </p>
                <p class="text-gray-700 text-base leading-relaxed mt-2">
                    Melalui website ini, kami berharap semua pihak dapat mengakses informasi mengenai profil sekolah,
                    kegiatan, dan fasilitas kami. Tentu saja, website sekolah kami masih memiliki kekurangan. Oleh karena
                    itu, kami mengharapkan masukan dan kritik yang membangun untuk kemajuan ke depannya.
                </p>
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
        <h2 class="text-2xl sm:text-3xl font-bold mb-8 text-center">Berita Terbaru</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-4">
            @foreach ($berita as $post)
                <div class="bg-white rounded-lg shadow p-4 hover:shadow-lg hover:scale-105 transition ">
                    <img src="{{ asset(Storage::url($post->thumbnail)) }}" alt="{{ $post->judul }}"
                        class="w-full h-70 object-cover rounded mb-4">
                    <h4 class="font-semibold mb-2">{{ $post->judul }}</h4>
                    <p class="text-sm text-gray-600">{{ Str::limit(strip_tags($post->isi), 150) }} </p>
                    <a href="{{ route('berita.show', $post->slug) }}"
                        class="text-blue-600 font-medium mt-2 inline-block">Baca Selengkapnya →</a>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Galeri --}}
    <section id="galeri" class="mt-16 mb-10 px-4 sm:px-6" x-data="{ openModal: false, modalImage: '' }">
        <h2 class="text-2xl sm:text-3xl font-bold mb-8 text-center">Galeri Sekolah</h2>
        <div x-data="{
            scrollEl: null,
            interval: null,
            init() {
                this.scrollEl = this.$refs.scrollContainer;
                this.startAutoScroll();
            },
            startAutoScroll() {
                this.interval = setInterval(() => {
                    this.scrollEl.scrollLeft += 1;
                    if (this.scrollEl.scrollLeft >= this.scrollEl.scrollWidth / 2) {
                        this.scrollEl.scrollLeft = 0;
                    }
                }, 20);
            },
            pauseScroll() {
                clearInterval(this.interval);
            },
            resumeScroll() {
                this.startAutoScroll();
            },
            scrollPrev() {
                this.scrollEl.scrollLeft -= 250;
            },
            scrollNext() {
                this.scrollEl.scrollLeft += 250;
            }
        }" class="overflow-hidden relative group">
            <!-- Scroll Container -->
            <div class="overflow-x-auto overflow-y-hidden whitespace-nowrap no-scrollbar" x-ref="scrollContainer"
                @mouseenter="pauseScroll" @mouseleave="resumeScroll">
                <div class="flex gap-4 w-max">

                    <!-- Loop Galeri -->
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

        <style>
            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }

            .no-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>

        <!-- Modal -->
        <div x-show="openModal" x-cloak class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50"
            @click.away="openModal = false">
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
