@extends('layouts.app')

@section('title', 'Portal Sekolah')

@section('content')

    <section class="container mx-auto py-12 px-4" x-data="{ openModal: false, modalImage: '' }">
        <h1 class="text-4xl font-bold text-center mb-12">Galeri</h1>
        <div class="bg-white">
            <div class="max-w-7xl mx-auto px-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Looping Images -->
                    @foreach ($galeri as $foto)
                        <div class="relative group cursor-pointer overflow-hidden rounded-lg shadow-md"
                            @click="openModal = true; modalImage = '{{ asset(Storage::url($foto->gambar_url)) }}'">
                            <img src="{{ asset(Storage::url($foto->gambar_url)) }}" alt="{{ $foto->judul }}"
                                class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent p-4 flex flex-col justify-end">
                                <h3 class="text-white font-semibold text-base leading-tight">{{ $foto->judul }}</h3>
                                <span class="text-sm text-gray-200">{{ $foto->kategori ?? 'Galeri' }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Video Section -->
                <div class="mt-12">
                    <h2 class="text-2xl font-semibold mb-4 text-center">Video Kegiatan Sekolah</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($videos as $video)
                            <div class="aspect-video rounded-lg overflow-hidden shadow-md">
                                <iframe src="https://www.youtube.com/embed/{{ $video->youtube_id }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen class="w-full h-full">
                                </iframe>
                                <h4 class="mt-2 text-sm font-semibold">{{ $video->judul }}</h4>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="text-center mt-8">
                <a href="/galeri" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">Lihat
                    Semua Galeri</a>
            </div>

            <!-- Modal -->
            <div x-show="openModal" x-cloak
                class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50"
                @click.away="openModal = false">
                <div class="relative">
                    <img :src="modalImage" alt="Image" class="max-w-full max-h-[90vh] rounded-lg shadow-xl">
                    <button @click="openModal = false"
                        class="absolute top-2 right-2 bg-white rounded-full p-1 hover:bg-gray-200">
                        ✕
                    </button>
                </div>
            </div>
        </div>
    </section>

@endsection
