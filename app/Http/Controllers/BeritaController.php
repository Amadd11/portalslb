<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Category;
use App\Models\Komentar;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::where('status', 'publish');

        // Tambahkan filter kategori jika ada request
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('category_id', $request->kategori);
        }

        $berita = $query->orderBy('tanggal_publish', 'desc')->paginate(5);

        // Sidebar
        $latestPosts = Berita::where('status', 'publish')
            ->orderBy('tanggal_publish', 'desc')
            ->limit(5)
            ->get();

        $categories = Category::orderByDesc('id')->get();
        $pengumumans = Pengumuman::latest()->take(5)->get();


        return view('berita.index', compact('berita', 'latestPosts', 'categories', 'pengumumans'));
    }


    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        $jumlahKomentar = Komentar::where('berita_id', $berita->id)->count();

        $randomPosts = Berita::where('status', 'publish')
            ->inRandomOrder()
            ->limit(5)
            ->get();

        $komentar = Komentar::where('berita_id', $berita->id)
            ->latest()
            ->get();


        return view('berita.show', compact('berita', 'randomPosts', 'jumlahKomentar', 'komentar'));
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

        $categories = Category::orderByDesc('id')->get();

        return view('berita.index', compact('berita', 'latestPosts', 'categories'));
    }
}
