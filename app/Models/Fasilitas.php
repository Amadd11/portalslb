<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fasilitas extends Model
{
    use HasFactory, SoftDeletes;
    //
    protected $fillable = [
        'nama_fasilitas',
        'deskripsi',
        'gambar_url',
    ];

    protected $casts = [
        'gambar_url' => 'array',
    ];
}
