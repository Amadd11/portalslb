@extends('layouts.app')

@section('content')
    <section class="container py-12 px-4 mx-auto bg-white text-center">
        <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-10 uppercase">Profil Kepegawaian di Sekolah Kami</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 max-w-6xl mx-auto">
            <!-- Guru  -->
            @foreach ($gurus as $guru)
                <div class="space-y-4">
                    <div class="w-40 h-45 mx-auto rounded-full overflow-hidden border-4 border-gray-200">
                        <img src="{{ asset(Storage::url($guru->foto_url)) }}" alt="Ana Aliyatul Himmah"
                            class="w-full h-full object-cover">
                    </div>
                    <p class="text-xs text-gray-500"></p>
                    <h4 class="text-lg font-semibold text-blue-800">{{ $guru->nama_guru }}</h4>
                    <p class="text-gray-600 text-sm italic">{{ $guru->jabatan }}</p>
                    <p class="text-gray-500 text-xs">{{ $guru->pendidikan }}</p>
                </div>
            @endforeach

    </section>
@endsection
