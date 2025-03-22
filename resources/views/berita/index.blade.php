@extends('layouts.app')

@section('title', 'Portal Sekolah')

@section('content')
    <section class="container mx-auto px-4 py-12">

        <!-- Header -->
        <h2 class="text-4xl font-bold text-center mb-12">Artikel</h2>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-4">
            <!-- Sidebar -->
            <aside class="md:col-span-1 space-y-6 order-2 md:order-1">
                <!-- Search Box -->
                <form action="{{ route('berita.search') }}" method="GET" class="flex">
                    <input type="text" name="q" placeholder="Cari artikel..." value="{{ request('q') }}"
                        class="w-full border border-gray-400 rounded-l px-4 py-2 focus:outline-none focus:ring focus:border-blue-500">
                    <button type="submit"
                        class="bg-gray-600 text-white px-4 py-2 rounded-r hover:bg-gray-800 flex items-center justify-center transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor"
                            class="size-6 transform transition-transform duration-300 ease-in-out group-hover:scale-110">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </form>

                <!-- Artikel Terbaru -->
                <div class="border border-gray-400 rounded-lg p-4">
                    <h4 class="font-semibold mb-4">Artikel Terbaru</h4>
                    <div class="space-y-4">
                        @foreach ($berita as $post)
                            <a href="{{ route('berita.show', $post->slug) }}" class="flex items-start space-x-3 group">
                                <img src="{{ asset(Storage::url($post->thumbnail)) }}" alt="thumb"
                                    class="w-16 h-16 object-cover rounded group-hover:opacity-80 transition">
                                <div>
                                    <h4 class="font-medium group-hover:text-blue-600">{{ $post->judul }}</h4>
                                    <p class="text-xs text-gray-500">
                                        {{ \Carbon\Carbon::parse($post->tanggal_publish)->format('d M Y') }}
                                    </p>
                                    <p class="text-gray-700 text-sm mb-4">{{ Str::limit(strip_tags($post->isi), 70) }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </aside>

            <!-- Artikel Utama -->
            <div class="md:col-span-2 space-y-8">
                @foreach ($berita as $post)
                    <div class="flex flex-col md:flex-row gap-4 items-start">
                        <a href="{{ route('berita.show', $post->slug) }}" class="block w-full md:w-1/3">
                            <img src="{{ asset(Storage::url($post->thumbnail)) }}" alt="thumbnail"
                                class="w-full h-48 object-cover rounded-lg hover:opacity-90 transition">
                        </a>
                        <div class="flex-1">
                            <a href="{{ route('berita.show', $post->slug) }}">
                                <h3 class="text-xl font-semibold mb-1 hover:text-blue-600 transition">{{ $post->judul }}
                                </h3>
                            </a>
                            <div class="text-sm text-gray-500 mb-2">
                                <span
                                    class="bg-blue-100 text-blue-600 px-2 py-0.5 rounded">{{ $post->category->nama_category }}</span>
                                <span>· {{ \Carbon\Carbon::parse($post->tanggal_publish)->format('d M Y') }}</span>
                            </div>
                            <p class="text-gray-600 text-sm mb-3">{{ Str::limit(strip_tags($post->isi), 120) }}</p>
                            <a href="{{ route('berita.show', $post->slug) }}"
                                class="text-blue-600 text-sm hover:underline">Baca Selengkapnya →</a>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div>{{ $berita->links() }}</div>
            </div>
        </div>

    </section>


@endsection
