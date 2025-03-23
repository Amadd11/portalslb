<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    //
    public function index()
    {

        $berita = Berita::take(5)->get();

        return view('sekolah.index', compact('berita'));
    }
}
