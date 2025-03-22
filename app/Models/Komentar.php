<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    // use HasFactory;

    protected $table = 'komentar';

    protected $fillable = [
        'berita_id',
        'nama_pengirim',
        'email_pengirim',
        'isi_komentar'
    ];

    public function berita()
    {
        return $this->belongsTo(Berita::class);
    }
}
