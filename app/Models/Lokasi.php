<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lokasi extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'desa_id',
        'relawan_id',
        'nama_lokasi',
        'alamat_lokasi',
        'luas_lokasi',
        'kapasitas_pengungsi',
        'gambar_lokasi',
        'latitude',
        'longitude'
    ];

    public function relawan(){
        return $this->belongsTo(Relawan::class);
    }

    public function desa(){
        return $this->belongsTo(Desa::class);
    }

    public function statusLokasi(){
        return $this->hasMany(StatusLokasi::class);
    }

    public function sphereLokasi(){
        return $this->hasOne(SphereLokasi::class);
    }

    public function riwayatPengungsi(){
        return $this->hasMany(RiwayatPengungsi::class);
    }

}
