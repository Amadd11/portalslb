@extends('layouts.app')

@section('title', 'Kurikulum 2013')

@section('content')
    <section class="container mx-auto py-12 px-8">
        <h1 class="text-4xl font-bold text-center pr-100 mb-8 uppercase">Kurikulum </h1>
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-4">
                <p class="text-justify ">
                    <span class="font-bold">Kurikulum 2013 (K-13)</span> adalah kurikulum yang diterapkan di Indonesia sejak
                    tahun 2013/2014.
                    Kurikulum ini
                    menggantikan Kurikulum 2006 (KTSP).Kurikulum 2013 (K-13) adalah kurikulum yang berlaku dalam Sistem
                    Pendidikan Indonesia. Kurikulum ini merupakan kurikulum tetap diterapkan oleh pemerintah untuk
                    menggantikan
                    Kurikulum-2006 (yang sering disebut sebagai Kurikulum Tingkat Satuan Pendidikan) yang telah berlaku
                    selama
                    kurang lebih 6 tahun. Kurikulum 2013 masuk dalam masa percobaanya pada tahun 2013 dengan menjadikan
                    beberapa
                    sekolah menjadi sekolah rintisan.

                    Pada tahun ajaran 2013/2014, tepatnya sekitar pertengahan tahun 2013, Kurikulum 2013 diimpelementasikan
                    secara terbatas pada sekolah perintis, yakni pada kelas I dan IV untuk tingkat Sekolah Dasar, kelas VII
                    untuk SMP, dan kelas X untuk jenjang SMA/SMK, sedangkan pada tahun 2014, Kurikulum 2013 sudah diterapkan
                    di
                    Kelas I, II, IV, dan V sedangkan untuk SMP Kelas VII dan VIII dan SMA Kelas X dan XI. Jumlah sekolah
                    yang
                    menjadi sekolah perintis adalah sebanyak 6.326 sekolah tersebar di seluruh provinsi di Indonesia.

                    Kurikulum 2013 memiliki empat aspek penilaian, yaitu aspek pengetahuan, aspek keterampilan, aspek sikap,
                    dan
                    perilaku. Di dalam Kurikulum 2013, terutama di dalam materi pembelajaran terdapat materi yang
                    dirampingkan
                    dan materi yang ditambahkan.
                </p>
                <p>
                    Kurikulum 2013 memiliki beberapa tujuan, yaitu:
                </p>

                <ul class="list-disc list-inside pl-7 space-y-1">
                    <li>Membentuk karakter siswa, seperti moral, etika, dan kepemimpinan.</li>
                    <li>Memanfaatkan pendekatan saintifik dalam pembelajaran.</li>
                    <li>Mengembangkan keterampilan dan pemahaman yang mendalam.</li>
                    <li>Membekali siswa dengan kemampuan hidup sebagai warga negara yang beriman, produktif, kreatif,
                        inovatif,
                        dan afektif.</li>
                    <li>Membekali siswa dengan kemampuan untuk berkontribusi pada kehidupan bermasyarakat, berbangsa,
                        bernegara,
                        dan peradaban dunia.</li>
                </ul>

                <h2 class="mt-6 text-3xl font-bold mb-4">Struktur Kurikulum SDLB</h2>
                @if ($sdlb->count())
                    <div class="mt-8 space-y-2">
                        <ul class="space-y-2">
                            @foreach ($sdlb as $lampiran)
                                <li>
                                    <a href="{{ Storage::url($lampiran->file_path) }}" target="_blank"
                                        class="flex items-center space-x-2 text-blue-600 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-500" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span>{{ $lampiran->judul }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2 class="text-3xl font-bold mb-4">Struktur Kurikulum SMPLB</h2>
                @if ($smplb->count())
                    <div class="mt-8 space-y-2">
                        <ul class="space-y-2">
                            @foreach ($smplb as $lampiran)
                                <li>
                                    <a href="{{ Storage::url($lampiran->file_path) }}" target="_blank"
                                        class="flex items-center space-x-2 text-blue-600 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-500" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span>{{ $lampiran->judul }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h2 class="text-3xl font-bold mb-4">Struktur Kurikulum SMALB</h2>

                @if ($smalb->count())
                    <div class="mt-8 space-y-2">
                        <ul class="space-y-2">
                            @foreach ($smalb as $lampiran)
                                <li>
                                    <a href="{{ Storage::url($lampiran->file_path) }}" target="_blank"
                                        class="flex items-center space-x-2 text-blue-600 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-500" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span>{{ $lampiran->judul }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>

            <!-- Aside -->
            <aside class="space-y-8">
                <!-- Pengumuman -->
                <div class="bg-blue-50 p-3 rounded-lg shadow-md space-y-3">
                    <h3 class="text-xl font-semibold text-blue-800">📢 Pengumuman</h3>

                    <!-- Slider Container -->
                    <div class="swiper pengumuman-slider relative max-w-[400px] mx-auto">
                        <div class="swiper-wrapper">
                            @foreach ($pengumumans as $pengumuman)
                                <div class="swiper-slide flex flex-col items-center text-center">
                                    <!-- Gambar Pengumuman -->
                                    <div class="relative w-full">
                                        <img src="{{ asset(Storage::url($pengumuman->gambar_url)) }}"
                                            alt="{{ $pengumuman->judul }}"
                                            class="rounded-lg shadow-md w-full h-[250px] object-cover" loading="lazy">
                                    </div>

                                    <!-- Judul Pengumuman -->
                                    <h3 class="mt-3 text-lg font-semibold text-gray-800">
                                        {{ $pengumuman->judul }}
                                    </h3>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                <!-- Artikel Terbaru -->
                <div class="border border-gray-400 rounded-lg p-4">
                    <h4 class="font-semibold mb-4">📰 Artikel Terbaru</h4>
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
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('js/swiper.js') }}"></script>
@endpush
