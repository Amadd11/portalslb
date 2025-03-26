<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Lampiran;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    //
    public function index()
    {

        $sdlb = Lampiran::where('tipe', 'kurikulum sdlb')->get();
        $smplb = Lampiran::where('tipe', 'kurikulum smplb')->get();
        $smalb = Lampiran::where('tipe', 'kurikulum smalb')->get();

        $berita = Berita::take(5)->get();
        $pengumumans = Pengumuman::latest()->take(5)->get();



        return view('kurikulum.index', compact('sdlb', 'smplb', 'smalb', 'berita', 'pengumumans'));
    }
}
