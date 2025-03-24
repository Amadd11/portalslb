<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Video;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    //
    public function index()
    {

        $galeri = Galeri::latest()->paginate(12);

        return view('galeri.foto', compact('galeri',));
    }
    public function video()
    {
        $videos = Video::latest()->paginate(9);
        
        return view('galeri.video', compact('videos'));
    }
}
