<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'lokasi';

    public function kirim_hewan()
    {
        return $this->belongsTo(KirimHewan::class,'id','id_kirim_hewan');
    }
}
