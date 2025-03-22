<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use App\Models\CarouselImage;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    //
    public function index()
    {
        $fasilitas = Fasilitas::take(6)->get();
        $berita = Berita::where('status', 'publish')->latest()->take(3)->get();
        $galeri = Galeri::latest()->take(8)->get();
        $images = CarouselImage::all();

        return view('front.index', compact('fasilitas', 'berita', 'galeri', 'images'));
    }
}
