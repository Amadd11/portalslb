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

        $galeri = Galeri::latest()->get();
        $videos = Video::latest()
            ->get();

        return view('galeri.index', compact('galeri', 'videos'));
    }
}
