<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    public function index()
    {
        // Ambil hanya berita yang publish
        $berita = Berita::where('status', 'publish')
            ->orderBy('tanggal_publish', 'desc')
            ->paginate(10);

        return view('berita.index', compact('berita'));
    }

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        return view('berita.show', compact('berita'));
    }
    public function search(Request $request)
    {
        $query = $request->input('q');

        $berita = Berita::where('judul', 'like', '%' . $query . '%')
            ->where('status', 'publish')
            ->orderBy('tanggal_publish', 'desc')
            ->paginate(10);

        $latestPosts = Berita::where('status', 'publish')
            ->orderBy('tanggal_publish', 'desc')
            ->limit(5)
            ->get();

        return view('berita.index', compact('berita', 'latestPosts'));
    }
}
