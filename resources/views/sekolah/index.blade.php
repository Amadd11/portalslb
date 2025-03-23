@extends('layouts.app')

@section('title', 'Portal Sekolah')

@section('content')

    <!-- Profil Sekolah Section -->
    <section id="profil" class="py-12 px-4 sm:px-6 bg-white">
        <h1 class="text-3xl font-bold text-center mb-12">Profil <br>
            SLB Negeri 1 Lebong</h1>
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-12">
                <!-- Visi & Misi -->
                <div>
                    <h2 class="text-3xl font-bold mb-4">Visi</h2>
                    <p class="text-gray-700 mb-6">Terwujudnya SLB Negeri 1 Lebong yang <span class="font-bold">HEBAT</span>
                        (<span class="font-bold">
                            H</span>umanis, <span class="font-bold">E</span>dukatif, <span
                            class="font-bold">B</span>erkarakter, <span class="font-bold">A</span>khlak
                        Mulia, <span class="font-bold">T</span>erampil).</p>
                    <h2 class="text-3xl font-bold mb-4">Misi</h2>
                    <ul class="list-disc list-inside text-gray-700 space-y-2">
                        <li>Menyelenggarakan sekolah yang humanis, sekolah yang mencintai, dan memberi kebebasan dalam
                            berkreativitas sesuai dengan minat dan bakat peserta didik berkebutuhan khusus.</li>
                        <li>Menyelenggarakan Pendidikan yang mengedepankan nilai-nilai Pendidikan dan pembangunan
                            karakter peserta didik berkebutuhan khusus</li>
                        <li>Menyelenggarakan sekolah peduli dan berbudaya terhadap lingkungan hidup yang menyenangkan,
                            bersih, tertib, aman, asri dan sehat bagi peserta didik berkebutuhan khusus</li>
                        <li>Membentuk karakter peserta didik berkebutuhan khusus yang mandiri, terampil, berperilaku jujur
                            dan religious.</li>
                    </ul>
                </div>

                <!-- Tujuan Sekolah -->
                <div>
                    <h2 class="text-3xl font-bold mb-4">Tujuan Sekolah</h2>
                    <ul class="list-decimal list-inside text-gray-700 space-y-2 text-justify">
                        <li>Mewujudkan Peserta didik berkebutuhan khusus yang dinamis, integritas, dan otonomi sikap
                            kepribadian yang kreatif, mandiri, aman, tertib dan sehat dengan lingkungan.</li>
                        <li>Membangun Peserta didik berkebutuhan khusus yang beriman dan bertakwa kepada Tuhan yang Maha
                            Esa, tangguh, berakhlak mulia, bermoral, bertoleransi dan bergotong royong.</li>
                        <li>Mengembangkan potensi diri perserta didik berkebutuhan khusus yang ada pada dirinya.</li>
                        <li>Membangun potensi dan bakat peserta didik berkebutuhan khusus untuk dapat mengaktualisasikan
                            segenap potensinya, mengekspresikan dan menyatakan dirinya sepenuhnya-seutuhnya dengan cara
                            menjadi diri sendiri.</li>
                    </ul>
                </div>

                <!-- Kondisi Lapangan -->
                <div>
                    <h2 class="text-3xl font-bold mb-4">Kondisi Lapangan</h2>
                    <ul class="list-decimal text-gray-700 space-y-2 ml-5 text-justify">
                        <li>Status Tanah: <span class="font-medium">Milik Sendiri</span></li>
                        <li>Surat Izin Bangunan :
                            <span class="font-medium">No. 527/Dispora/VIII/2008</span><br>
                            Tanggal: <span class="font-medium">01 Juli 2008</span>
                        </li>
                        <li>SK Pendirian:
                            <span class="font-medium">Nomor 484 Tahun 2007</span><br>
                            Tanggal: <span class="font-medium">21 Agustus 2007</span>
                        </li>
                        <li>NPSN: <span class="font-medium">10703434</span></li>
                        <li>Luas Tanah: <span class="font-medium">8.100 m<sup>2</sup></span></li>
                    </ul>
                </div>

                <!-- Kondisi Guru SLB -->
                <div>
                    <h2 class="text-3xl font-bold mb-4">Kondisi Guru SLB Negeri 1 Tahun Pelajaran 2024/2025</h2>
                    <table class="w-full table-auto border border-collapse border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-2 text-left">No</th>
                                <th class="border p-2 text-left">Kondisi</th>
                                <th class="border p-2 text-left">Jumlah</th>
                                <th class="border p-2 text-left">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border p-2">1</td>
                                <td class="border p-2">PNS</td>
                                <td class="border p-2">8</td>
                                <td class="border p-2"></td>
                            </tr>
                            <tr>
                                <td class="border p-2">2</td>
                                <td class="border p-2">NON PNS</td>
                                <td class="border p-2">4</td>
                                <td class="border p-2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Data Peserta Didik -->
                <div>
                    <h2 class="text-3xl font-bold mb-4">Data Peserta Didik</h2>
                    <table class="w-full table-auto border border-collapse border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-2 text-left">Jenjang</th>
                                <th class="border p-2 text-left">Jumlah Siswa</th>
                                <th class="border p-2 text-left">Rombel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border p-2">SDLB</td>
                                <td class="border p-2">45</td>
                                <td class="border p-2">5</td>
                            </tr>
                            <tr>
                                <td class="border p-2">SMPLB</td>
                                <td class="border p-2">30</td>
                                <td class="border p-2">3</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Sarana dan Prasarana -->
                <div>
                    <h2 class="text-3xl font-bold mb-4">Sarana dan Prasarana</h2>
                    <table class="w-full table-auto border border-collapse border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-2 text-left">Jenis Ruangan</th>
                                <th class="border p-2 text-left">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border p-2">Ruang Kelas</td>
                                <td class="border p-2">8</td>
                            </tr>
                            <tr>
                                <td class="border p-2">Ruang Guru</td>
                                <td class="border p-2">1</td>
                            </tr>
                            <tr>
                                <td class="border p-2">Ruang UKS</td>
                                <td class="border p-2">1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Aside -->
            <aside class="space-y-8">
                <!-- Pengumuman -->
                <div class="bg-blue-50 p-4 rounded-lg shadow-md space-y-4">
                    <h3 class="text-xl font-semibold text-blue-800 mb-2">Pengumuman</h3>
                    <ul class="space-y-2 text-sm text-blue-900">
                        <li>📢 Penerimaan Siswa Baru 2025 telah dibuka!</li>
                        <li>📢 Ujian Akhir Semester dimulai 10 April 2025.</li>
                        <li>📢 Libur Nasional pada 1 Mei 2025.</li>
                        <li>📢 Workshop Guru & Staff tanggal 15 Mei 2025.</li>
                    </ul>
                    <a href="/pengumuman" class="block text-blue-600 hover:underline text-sm mt-2">Lihat Semua →</a>
                </div>

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

        </div>
    </section>
@endsection
