<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'judul',
        'file_path',
        'tipe'
    ];

    public static function getTipeOptions()
    {
        return ['profil', 'kurikulum sdlb', 'kurikulum smplb', 'kurikulum smalb'];
    }
}
