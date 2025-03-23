<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    //
    public function store(Request $request)
    {
        $validated = $request->validate([
            'berita_id' => 'required|exists:berita,id',
            'nama_pengirim' => 'required|string|max:255',
            'email_pengirim' => 'nullable|email|max:255',
            'isi_komentar' => 'required|string',
        ]);

        Komentar::create($validated);

        return redirect()->back()->with('success', 'Komentar berhasil dikirim.');
    }
}
