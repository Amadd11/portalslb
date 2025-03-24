@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
    <section class="container mx-auto px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 ">

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

                <h1 class="text-3xl font-bold mb-2 text-center">{{ $berita->judul }}</h1>
                <div class="text-sm text-gray-500 mb-4 text-left">
                    <span
                        class="bg-blue-100 text-blue-600 px-2 py-0.5 rounded">{{ $berita->category->nama_category }}</span>
                    <span>· {{ \Carbon\Carbon::parse($berita->tanggal_publish)->format('d M Y, H:i') }}</span>
                </div>
                @if ($berita->thumbnail)
                    <div class="relative overflow-hidden rounded-lg shadow-md group">
                        <img src="{{ asset(Storage::url($berita->thumbnail)) }}" alt="{{ $berita->judul }}"
                            class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                @endif

                <div class="rich-content">
                    {!! $berita->isi !!}
                </div>


                @if (!empty($berita->attachments))
                    <div class="mt-6 space-y-2">
                        <h3 class="font-semibold text-lg mb-2">📎 Lampiran PDF:</h3>
                        <ul class="space-y-1">
                            @foreach ($berita->attachments as $pdf)
                                <li>
                                    <a href="{{ Storage::url($pdf) }}" target="_blank"
                                        class="flex items-center space-x-2 text-blue-600 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-500" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span>{{ basename($pdf) }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form & Daftar Komentar -->
                <div class="mt-8 border-t pt-6">

                    <!-- Form Komentar -->
                    <h3 class="text-lg font-semibold mb-4">Tinggalkan Komentar</h3>
                    <form method="POST" action="{{ route('komentar.store') }}" class="space-y-4">
                        @csrf
                        <!-- Hidden ID berita -->
                        <input type="hidden" name="berita_id" value="{{ $berita->id }}">

                        <!-- Nama -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" name="nama_pengirim"
                                class="mt-1 w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300" required>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email_pengirim"
                                class="mt-1 w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                        </div>

                        <!-- Isi Komentar -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Komentar</label>
                            <textarea name="isi_komentar" rows="4" class="mt-1 w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300"
                                required></textarea>
                        </div>

                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Kirim
                            Komentar</button>
                    </form>

                    <!-- Daftar Komentar -->
                    <div class="mt-10 space-y-4">
                        <h4 class="text-lg font-semibold">Komentar ({{ $berita->komentar->count() }})</h4>
                        @forelse ($berita->komentar as $komen)
                            <div class="border p-3 rounded hover:shadow-md transition">
                                <div class="flex justify-between mb-1">
                                    <span class="font-medium">{{ $komen->nama_pengirim }}</span>
                                    <span
                                        class="text-xs text-gray-500">{{ $komen->created_at->format('d M Y, H:i') }}</span>
                                </div>
                                <p class="text-sm">{{ $komen->isi_komentar }}</p>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">Belum ada komentar, jadilah yang pertama!</p>
                        @endforelse
                    </div>
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
