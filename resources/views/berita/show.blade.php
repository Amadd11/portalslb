@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
    <section class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 animate-fade-in">

            <!-- Artikel Konten -->
            <article class="md:col-span-2 space-y-6 relative">

                <!-- Back Button -->
                <div class="mb-4">
                    <a href="{{ route('berita.index') }}"
                        class="inline-flex items-center text-blue-600 hover:underline text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali ke Artikel
                    </a>
                </div>

                @if ($berita->thumbnail)
                    <div class="relative overflow-hidden rounded-lg shadow-md group">
                        <img src="{{ asset(Storage::url($berita->thumbnail)) }}" alt="{{ $berita->judul }}"
                            class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                @endif

                <h1 class="text-3xl font-bold mb-2 text-center">{{ $berita->judul }}</h1>
                <div class="text-sm text-gray-500 mb-4 text-center">
                    <span
                        class="bg-blue-100 text-blue-600 px-2 py-0.5 rounded">{{ $berita->category->nama_category }}</span>
                    <span>· {{ \Carbon\Carbon::parse($berita->tanggal_publish)->format('d M Y, H:i') }}</span>
                </div>
                <div class="prose max-w-none dark:prose-invert">
                    {!! $berita->isi !!}
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="space-y-6">

                <!-- Pengumuman -->
                <div class="bg-blue-50 p-4 rounded-lg shadow space-y-3">
                    <h3 class="text-xl font-semibold text-blue-800 mb-2">Pengumuman</h3>
                    <ul class="space-y-2 text-sm text-blue-900">
                        <li>📢 Penerimaan Siswa Baru 2025 telah dibuka!</li>
                        <li>📢 Ujian Akhir Semester dimulai 10 April 2025.</li>
                        <li>📢 Libur Nasional pada 1 Mei 2025.</li>
                        <li>📢 Workshop Guru & Staff tanggal 15 Mei 2025.</li>
                    </ul>
                    <a href="/pengumuman" class="block text-blue-600 hover:underline text-sm mt-2">Lihat Semua →</a>
                </div>

                <!-- Artikel Random -->
                <div class="border border-gray-300 rounded-lg p-4 space-y-4">
                    <h4 class="font-semibold mb-4">Artikel Random</h4>
                    @foreach ($randomPosts as $post)
                        <a href="{{ route('berita.show', $post->slug) }}" class="flex items-start space-x-3 group">
                            <img src="{{ asset(Storage::url($post->thumbnail)) }}" alt="thumb"
                                class="w-16 h-16 object-cover rounded group-hover:opacity-80 transition">
                            <div>
                                <h4 class="font-medium group-hover:text-blue-600">{{ $post->judul }}</h4>
                                <p class="text-xs text-gray-500">
                                    {{ \Carbon\Carbon::parse($post->tanggal_publish)->format('d M Y, H:i') }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </aside>

        </div>
    </section>
@endsection
