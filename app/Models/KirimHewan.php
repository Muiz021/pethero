<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KirimHewan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kirim_hewan';

    public function lokasi()
    {
        return $this->hasOne(Lokasi::class);
    }

    public function jenis_asuransi()
    {
        return $this->hasOne(JenisAsuransi::class);
    }

    public function jenis_kandang()
    {
        return $this->hasOne(JenisKandang::class);
    }

    public function jenis_pengiriman()
    {
        return $this->hasOne(JenisPengiriman::class);
    }
}
