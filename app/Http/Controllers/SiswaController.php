<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Berita;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function index()
    {
        $siswas = Siswa::with('jenjang')->whereHas('jenjang', function ($query) {
            $query->whereIn('nama_jenjang', ['SDLB', 'SMPLB', 'SMALB']);
        })->get()->groupBy('jenjang.nama_jenjang');

        $berita = Berita::take(5)->get();
        $pengumumans = Pengumuman::latest()->take(5)->get();


        return view('siswa.index', compact('siswas', 'berita', 'pengumumans'));
    }
}
