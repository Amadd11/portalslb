@extends('layouts.app')

@section('content')
    <section class="container mx-auto py-12 px-8">
        <h1 class="mb-12 font-bold text-4xl uppercase text-center">Data Siswa</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Kiri: Data Siswa -->
            <div class="lg:col-span-2 space-y-6">
                @foreach ($siswas as $jenjang => $dataSiswa)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="bg-blue-800 text-white px-5 py-2">
                            <h2 class="text-base font-semibold">Data Siswa {{ $jenjang }}</h2>
                        </div>
                        <div class="p-4">
                            <div class="overflow-x-auto">
                                <table class="w-full border-collapse datatable text-sm pt-4">
                                    <thead>
                                        <tr class="bg-gray-100 text-xs">
                                            <th class="px-3 py-1 border whitespace-nowrap">NIS</th>
                                            <th class="px-3 py-1 border whitespace-nowrap">Nama</th>
                                            <th class="px-3 py-1 border whitespace-nowrap">Tempat Lahir</th>
                                            <th class="px-3 py-1 border whitespace-nowrap">Tanggal Lahir</th>
                                            <th class="px-3 py-1 border whitespace-nowrap">L / P</th>
                                            <th class="px-3 py-1 border whitespace-nowrap">Kelas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataSiswa as $siswa)
                                            <tr class="text-center hover:bg-gray-50 text-xs">
                                                <td class="px-3 py-1 border">{{ $siswa->nis }}</td>
                                                <td class="px-3 py-1 border">{{ $siswa->nama_siswa }}</td>
                                                <td class="px-3 py-1 border">{{ $siswa->tempat_lahir }}</td>
                                                <td class="px-3 py-1 border">
                                                    {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d M Y') }}
                                                </td>
                                                <td class="px-3 py-1 border">{{ $siswa->jenis_kelamin }}</td>
                                                <td class="px-3 py-1 border">{{ $siswa->kelas }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <!-- Kanan: Sidebar -->
            <aside class="space-y-8">
                <!-- Pengumuman -->
                <div class="bg-blue-50 p-4 rounded-lg shadow-md space-y-4">
                    <h3 class="text-xl font-semibold text-blue-800 mb-2">📢 Pengumuman</h3>
                    <ul class="space-y-2 text-sm text-blue-900">
                        <li>✅ Penerimaan Siswa Baru 2025 telah dibuka!</li>
                        <li>✅ Ujian Akhir Semester dimulai 10 April 2025.</li>
                        <li>✅ Libur Nasional pada 1 Mei 2025.</li>
                        <li>✅ Workshop Guru & Staff tanggal 15 Mei 2025.</li>
                    </ul>
                    <a href="/pengumuman" class="block text-blue-600 hover:underline text-sm mt-2">Lihat Semua →</a>
                </div>

                <!-- Artikel Terbaru -->
                <div class="border border-gray-300 rounded-lg p-4 shadow-md">
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
                                    <p class="text-gray-700 text-sm">{{ Str::limit(strip_tags($post->isi), 70) }}</p>
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
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthMenu": [10, 25, 50, 100],
                "language": {
                    "search": "🔍 Cari:",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "info": "Menampilkan _START_ - _END_ dari _TOTAL_ siswa",
                    "paginate": {
                        "next": "➡ Berikutnya",
                        "previous": "⬅ Sebelumnya"
                    }
                }
            });
        });
    </script>
@endpush
