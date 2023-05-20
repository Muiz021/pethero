<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPengiriman extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'jenis_pengiriman';

    public function kirim_hewan()
    {
        return $this->belongsTo(KirimHewan::class);
    }
}
