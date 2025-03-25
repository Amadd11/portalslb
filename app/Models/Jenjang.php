<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jenjang extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_jenjang',
        'slug',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setNamaJenjangAttribute($value)
    {
        $this->attributes['nama_jenjang'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }
}
