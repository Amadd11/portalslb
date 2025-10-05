@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="relative w-full py-20 bg-gradient-to-b from-white via-gray-300 to-gray-100 mb-18">
        <div
            class="container mx-auto px-4 sm:px-6 lg:px-8 relative flex flex-col lg:flex-row items-center justify-center gap-8 lg:gap-12">

            {{-- Right Swiper (Carousel) - Diletakkan pertama di HTML agar muncul di atas pada mobile --}}
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

            {{-- Left Content (Teks) - Diletakkan kedua, tapi diberi 'order-first' di layar besar (lg) --}}
            <div class="w-full lg:w-1/2 space-y-6 text-center lg:text-left lg:order-first">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 leading-tight">
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
                    {{-- <a href="#video"
                        class="flex items-center justify-center gap-2 border border-blue-800 px-6 py-3 rounded-full text-blue-800 hover:bg-blue-50 transition w-full sm:w-auto">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10l4.553-2.276A1 1 0 0 1 21 8.618v6.764a1 1 0 0 1-1.447.894L15 14V10z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 6h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2z" />
                        </svg>
                        Video
                    </a> --}}
                </div>
                <div class="flex items-center justify-center lg:justify-start space-x-4 pt-4">
                    <span class="text-sm text-gray-500">We Are In Socials Media :</span>
                    <div class="flex space-x-2">
                        <a href="https://www.facebook.com/slb.lebong?locale=id_ID"
                            class="text-gray-600 hover:text-blue-600 transition"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-600 hover:text-blue-600 transition"><i
                                class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-600 hover:text-blue-600 transition"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- Sambutan + Visi Misi + Pengumuman Section --}}
    <section id="profil" class="py-12 bg-white scroll-mt-20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                {{-- Kolom Kiri - Foto --}}
                <div class="flex justify-center items-start lg:col-span-1">
                    <img src="{{ asset('assets/images/foto-sambutan.png') }}" alt="Kepala Sekolah"
                        class="w-full max-w-sm lg:max-w-full object-contain rounded-lg">
                </div>

                {{-- Kolom Tengah - Sambutan --}}
                <div class="flex flex-col justify-center space-y-4 lg:col-span-1">
                    <span
                        class="inline-block bg-blue-100 text-blue-800 text-lg font-semibold px-4 py-1 rounded-full mb-2 w-fit">
                        Sambutan Kepala Sekolah
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-bold mb-2">Selamat Datang</h2>
                    <p class="text-gray-700 mb-2">Assalamualaikum Warahmatullah Wabarakatuh</p>
                    <p class="text-gray-700 text-base leading-relaxed text-justify">
                        Alhamdulillah, kami bersyukur kepada Allah SWT karena dengan rahmat dan karunia-Nya, akhirnya kami
                        dapat memperbarui Website SLB Negeri 1 Lebong. Kami dengan tulus menyambut Anda di Website ini yang
                        ditujukan untuk semua unsur pimpinan, guru, karyawan, siswa, dan masyarakat umum.
                    </p>
                    <p class="text-gray-700 text-base leading-relaxed text-justify">
                        Melalui website ini, kami berharap semua pihak dapat mengakses informasi mengenai profil sekolah,
                        kegiatan, dan fasilitas kami. Tentu saja, website sekolah kami masih memiliki kekurangan. Oleh
                        karena itu, kami mengharapkan masukan dan kritik yang membangun untuk kemajuan ke depannya.
                    </p>
                </div>

                {{-- Kolom Kanan - Visi Misi + Pengumuman --}}
                <aside class="space-y-6 w-full lg:col-span-1">
                    <div class="bg-blue-50 p-4 rounded-lg shadow-md space-y-3">
                        <h3 class="text-xl font-semibold text-blue-800">📢 Pengumuman</h3>
                        <div class="swiper pengumuman-slider relative max-w-full mx-auto">
                            <div class="swiper-wrapper">
                                @foreach ($pengumumans as $pengumuman)
                                    <div class="swiper-slide flex flex-col items-center text-center">
                                        <div class="relative w-full">
                                            <img src="{{ asset(Storage::url($pengumuman->gambar_url)) }}"
                                                alt="{{ $pengumuman->judul }}"
                                                class="rounded-lg shadow-md w-full h-[250px] object-cover" loading="lazy">
                                        </div>
                                        <h4 class="mt-3 text-lg font-semibold text-gray-800">{{ $pengumuman->judul }}</h4>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                        <h3 class="text-2xl font-bold mb-2 text-center">Visi</h3>
                        <p class="text-gray-700 text-sm mb-4 text-center">Terwujudnya SLB Negeri 1 Lebong yang <span
                                class="font-bold">HEBAT</span> (<span class="font-bold">H</span>umanis, <span
                                class="font-bold">E</span>dukatif, <span class="font-bold">B</span>erkarakter, <span
                                class="font-bold">A</span>khlak Mulia, <span class="font-bold">T</span>erampil).</p>
                        <h3 class="text-2xl font-bold mb-2 text-center">Misi</h3>
                        <ul class="list-disc list-inside text-gray-700 space-y-1 text-sm">
                            <li>Sekolah humanis yang memberi kebebasan berkreativitas sesuai bakat peserta didik
                                berkebutuhan khusus.</li>
                            <li>Pendidikan yang membangun karakter peserta didik berkebutuhan khusus.</li>
                            <li>Lingkungan sekolah yang peduli, bersih, aman, asri, dan sehat.</li>
                            <li>Peserta didik berkebutuhan khusus yang mandiri, terampil, jujur, dan religious.</li>
                        </ul>
                    </div>
                </aside>
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('sekolah.index') }}" class="text-blue-600 font-medium hover:underline">Lihat Profil
                    Sekolah →</a>
            </div>
        </div>
    </section>

    {{-- Fasilitas --}}
    <section id="fasilitas" class="py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl sm:text-3xl font-bold mb-8 text-center">Fasilitas Unggulan</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($fasilitas as $item)
                    <div class="bg-white rounded-lg shadow p-4 text-center hover:shadow-lg transition">
                        <img src="{{ asset(Storage::url($item->gambar_url[0])) }}" alt="{{ $item->nama_fasilitas }}"
                            class="w-full h-56 object-cover rounded mb-4">
                        <h4 class="font-semibold mb-2">{{ $item->nama_fasilitas }}</h4>
                        <p class="text-sm text-gray-600">{{ Str::limit($item->deskripsi, 80) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Berita Terbaru --}}
    <section id="berita" class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl sm:text-3xl font-bold mb-8 text-center">Artikel Terbaru</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($berita as $post)
                    <div class="bg-white rounded-lg shadow p-4 hover:shadow-lg hover:scale-105 transition flex flex-col">
                        <img src="{{ asset(Storage::url($post->thumbnail)) }}" alt="{{ $post->judul }}"
                            class="w-full h-56 object-cover rounded mb-4" loading="lazy">
                        <div class="flex flex-col flex-grow">
                            <h4 class="font-semibold mb-2">{{ $post->judul }}</h4>
                            <p class="text-sm text-gray-600 flex-grow">{{ Str::limit(strip_tags($post->isi), 150) }}</p>
                            <a href="{{ route('berita.show', $post->slug) }}"
                                class="text-blue-600 font-medium mt-4 inline-block self-start">Baca Selengkapnya →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Galeri --}}
    <section id="galeri" class="py-12" x-data="autoScrollGaleri()">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl sm:text-3xl font-bold mb-8 text-center">Galeri Sekolah</h2>
            <div class="overflow-hidden relative group">
                <div class="overflow-x-auto overflow-y-hidden whitespace-nowrap scroll-smooth no-scrollbar"
                    x-ref="scrollContainer" @mouseenter="pauseScroll" @mouseleave="resumeScroll">
                    <div class="flex gap-4 w-max">
                        {{-- Loop Galeri (Original) --}}
                        @foreach ($galeri as $foto)
                            <div class="w-[180px] sm:w-[220px] md:w-[250px] flex-shrink-0">
                                <div class="relative w-full aspect-[4/3] overflow-hidden rounded-lg">
                                    <img src="{{ asset(Storage::url($foto->gambar_url)) }}" alt="{{ $foto->judul }}"
                                        @click="openImage('{{ asset(Storage::url($foto->gambar_url)) }}')"
                                        class="absolute inset-0 w-full h-full object-cover cursor-pointer hover:scale-105 transition duration-300">
                                </div>
                                <h4 class="font-semibold text-center mt-2 text-sm truncate">{{ $foto->judul }}</h4>
                            </div>
                        @endforeach
                        {{-- Loop Galeri (Duplikat untuk efek seamless scroll) --}}
                        @foreach ($galeri as $foto)
                            <div class="w-[180px] sm:w-[220px] md:w-[250px] flex-shrink-0">
                                <div class="relative w-full aspect-[4/3] overflow-hidden rounded-lg">
                                    <img src="{{ asset(Storage::url($foto->gambar_url)) }}" alt="{{ $foto->judul }}"
                                        @click="openImage('{{ asset(Storage::url($foto->gambar_url)) }}')"
                                        class="absolute inset-0 w-full h-full object-cover cursor-pointer hover:scale-105 transition duration-300">
                                </div>
                                <h4 class="font-semibold text-center mt-2 text-sm truncate">{{ $foto->judul }}</h4>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- Tombol Navigasi Galeri --}}
                <button @click="scrollPrev"
                    class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/80 p-2 rounded-full shadow-md hover:bg-white z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button @click="scrollNext"
                    class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/80 p-2 rounded-full shadow-md hover:bg-white z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('galeri.foto') }}" class="text-blue-600 font-medium hover:underline">Lihat Semua Galeri
                    →</a>
            </div>
        </div>

        {{-- Modal untuk menampilkan gambar galeri --}}
        <div x-show="openModal" x-cloak style="display: none;" @keydown.window.escape="openModal = false"
            class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4">
            <div class="relative" @click.away="openModal = false">
                <img :src="modalImage" alt="Image" class="max-w-[90vw] max-h-[90vh] rounded-lg shadow-lg">
                <button @click="openModal = false"
                    class="absolute -top-2 -right-2 bg-white rounded-full p-1.5 text-gray-800 hover:bg-gray-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex justify-center">

            {{-- Tempel (Paste) kode counter Anda di sini --}}
            <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 text-center w-auto sm:w-48">
                <div class="bg-green-100 text-green-600 rounded-full p-3 inline-block">
                    <i class="fas fa-users text-2xl"></i>
                </div>
                <p class="text-3xl font-bold text-gray-800 mt-4">{{ number_format($totalVisits) }}</p>
                <p class="text-sm text-gray-500 font-medium">Total Kunjungan</p>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Hero Swiper
            new Swiper('.swiper-container', {
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
            });

            // Inisialisasi Pengumuman Swiper
            new Swiper('.pengumuman-slider', {
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false
                },
                effect: 'slide',
            });
        });

        // Inisialisasi Komponen AlpineJS untuk Galeri
        document.addEventListener('alpine:init', () => {
            Alpine.data('autoScrollGaleri', () => ({
                openModal: false,
                modalImage: '',
                scrollInterval: null,

                init() {
                    this.startScroll();
                },
                startScroll() {
                    this.scrollInterval = setInterval(() => {
                        const container = this.$refs.scrollContainer;
                        if (container.scrollLeft + container.clientWidth >= container
                            .scrollWidth / 2) {
                            container.scrollLeft = 0;
                        } else {
                            container.scrollLeft += 1; // Kecepatan scroll
                        }
                    }, 25);
                },
                pauseScroll() {
                    clearInterval(this.scrollInterval);
                },
                resumeScroll() {
                    this.startScroll();
                },
                scrollNext() {
                    this.$refs.scrollContainer.scrollBy({
                        left: 300,
                        behavior: 'smooth'
                    });
                },
                scrollPrev() {
                    this.$refs.scrollContainer.scrollBy({
                        left: -300,
                        behavior: 'smooth'
                    });
                },
                openImage(url) {
                    this.modalImage = url;
                    this.openModal = true;
                    this.pauseScroll(); // Jeda scroll saat modal terbuka
                }
            }));
        });
    </script>
@endpush
