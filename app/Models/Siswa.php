<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nis',
        'nama_siswa',
        'jenjang_id',
        'slug',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'kelas',
    ];

    protected $dates = ['tanggal_lahir', 'deleted_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setNamaSiswaAttribute($value)
    {
        $this->attributes['nama_siswa'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Contoh Relasi ke Model Lain (Jika Ada)
    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }
}
