<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusLokasi extends Model
{   
    use SoftDeletes;

    protected $fillable = [
        'lokasi_id',
        'status',
        'catatan'
    ];

    public function lokasi(){
        return $this->belongsTo(Lokasi::class);
    }
}
