<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use App\Models\CarouselImage;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Pengumuman;

class FrontController extends Controller
{
    //
    public function index()
    {
        $fasilitas = Fasilitas::take(6)->get();
        $berita = Berita::where('status', 'publish')->latest()->take(3)->get();
        $galeri = Galeri::latest()->take(8)->get();
        $images = CarouselImage::all();
        $pengumumans = Pengumuman::latest()->take(5)->get();

        return view('front.index', compact('fasilitas', 'berita', 'galeri', 'images', 'pengumumans'));
    }
}
