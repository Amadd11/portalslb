@extends('layouts.app')

@section('content')

    <section class="container mx-auto py-12 px-4">
        <h1 class="text-4xl font-bold text-center mb-12 uppercase">Video Kegiatan Sekolah</h1>
        <div class="bg-white">
            <div class="max-w-7xl mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($videos as $video)
                        <div class="bg-gray-50 p-4 rounded-lg shadow hover:shadow-lg transition duration-300">
                            <!-- Judul -->
                            <h4 class="text-lg text-center font-semibold text-gray-800 mb-2">{{ $video->judul }}</h4>

                            <!-- Video -->
                            <div class="aspect-video rounded-md overflow-hidden mb-3">
                                <iframe src="https://www.youtube.com/embed/{{ $video->youtube_id }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen class="w-full h-full">
                                </iframe>
                            </div>

                            <!-- Deskripsi -->
                            <p class="text-sm text-center text-gray-600">
                                {{ $video->deskripsi }}
                            </p>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-10">
                    {{ $videos->appends(request()->query())->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </section>

@endsection
