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
                                        <div class="relative w-full aspect-[4/3]"> {{-- menjaga rasio 4:3 --}}
                                            <a href="{{ asset(Storage::url($pengumuman->gambar_url)) }}"
                                                data-lightbox="pengumuman" data-title="{{ $pengumuman->judul }}">
                                                <img src="{{ asset(Storage::url($pengumuman->gambar_url)) }}"
                                                    alt="{{ $pengumuman->judul }}"
                                                    class="rounded-lg shadow-md w-full h-full object-cover" loading="lazy">
                                            </a>
                                        </div>
                                        <h4 class="mt-3 text-lg font-semibold text-gray-800">
                                            {{ $pengumuman->judul }}
                                        </h4>
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

    {{-- Galeri Terbaru --}}
    <section id="galeri" class="px-4 py-12 bg-white">
        <div class="max-w-screen-xl px-4 mx-auto">
            <div class="mb-8 text-center">
                <h2 class="text-2xl sm:text-3xl font-bold text-black">Galeri Sekolah</h2>
                <div class="w-32 h-1 mx-auto mt-2 bg-primary-dark"></div>
            </div>

            <div class="relative w-full overflow-hidden">
                <!-- Kontainer berjalan otomatis -->
                <div class="inline-flex py-4 space-x-6 animate-scroll-gallery">
                    {{-- Loop Galeri --}}
                    @foreach ($galeri as $foto)
                        <div class="flex-shrink-0 w-64 h-48 overflow-hidden rounded-lg shadow-md gallery-item">
                            <a href="{{ asset(Storage::url($foto->gambar_url)) }}" data-lightbox="gallery"
                                data-title="{{ $foto->judul }}">
                                <img src="{{ asset(Storage::url($foto->gambar_url)) }}" alt="{{ $foto->judul }}"
                                    class="object-cover w-full h-full transition duration-500 ease-in-out hover:scale-105">
                            </a>
                        </div>
                    @endforeach

                    {{-- Duplikasi konten supaya looping mulus --}}
                    @foreach ($galeri as $foto)
                        <div class="flex-shrink-0 w-64 h-48 overflow-hidden rounded-lg shadow-md gallery-item"
                            aria-hidden="true">
                            <a href="{{ asset(Storage::url($foto->gambar_url)) }}" data-lightbox="gallery"
                                data-title="{{ $foto->judul }}">
                                <img src="{{ asset(Storage::url($foto->gambar_url)) }}" alt="{{ $foto->judul }}"
                                    class="object-cover w-full h-full transition duration-500 ease-in-out hover:scale-105">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('galeri.foto') }}"
                    class="inline-flex items-center text-sm font-medium text-blue-800 hover:underline">
                    Lihat Galeri Lengkap
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
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
    <script src="{{ asset('js/swiper.js') }}"></script>
@endpush
