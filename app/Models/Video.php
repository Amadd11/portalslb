<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'judul',
        'youtube_id',
        'deskripsi',
    ];

    public function setYoutubeIdAttribute($value)
    {
        // Jika URL penuh, ambil ID-nya
        if (Str::contains($value, 'youtube.com/watch?v=')) {
            $parsed = parse_url($value);
            parse_str($parsed['query'], $query);
            $this->attributes['youtube_id'] = $query['v'] ?? $value;
        } elseif (Str::contains($value, 'youtu.be/')) {
            // Jika url youtu.be
            $this->attributes['youtube_id'] = substr($value, strrpos($value, '/') + 1);
        } else {
            // Kalau input sudah ID saja
            $this->attributes['youtube_id'] = $value;
        }
    }
}
