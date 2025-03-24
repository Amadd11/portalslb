@extends('layouts.app')

@section('title', 'Video Kegiatan Sekolah')

@section('content')

    <section class="container mx-auto py-12 px-4">
        <h1 class="text-4xl font-bold text-center mb-12">Video Kegiatan Sekolah</h1>
        <div class="bg-white">
            <div class="max-w-7xl mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $videos->appends(request()->query())->links('vendor.pagination.tailwind') }}
                </div>

            </div>
        </div>
    </section>

@endsection
