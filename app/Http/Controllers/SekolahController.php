<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Lampiran;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    //
    public function index()
    {
        $lampirans = Lampiran::where('tipe', 'profil')->get();
        $berita = Berita::take(5)->get();
        $pengumumans = Pengumuman::latest()->take(5)->get();

        return view('sekolah.index', compact('berita', 'lampirans', 'pengumumans'));
    }
}
