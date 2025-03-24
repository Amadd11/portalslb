@extends('layouts.app')

@section('title', 'Portal Sekolah')

@section('content')
    <section class="container mx-auto py-12 px-4">
        <h1 class="text-4xl font-bold text-center mb-12 uppercase">Fasilitas</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($fasilitas as $item)
                <div
                    class="flex flex-col bg-white rounded-lg shadow justify-between p-2 text-center hover:shadow-md transition">
                    <img src="{{ asset(Storage::url($item->gambar_url[0])) }}" alt="{{ $item->nama_fasilitas }}"
                        class="w-full h-50 object-cover rounded mb-2">
                    <h4 class="font-semibold text-base mb-1">{{ $item->nama_fasilitas }}</h4>
                    <p class="text-xs text-gray-600">{{ $item->deskripsi }}</p>
                </div>
            @endforeach
        </div>

    </section>
@endsection
