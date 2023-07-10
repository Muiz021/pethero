<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KirimHewan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kirim_hewan';

    protected $with = ['jenis_asuransi','jenis_kandang','jenis_pengiriman'];

    public function detail_lokasi()
    {
        return $this->belongsTo(DetailLokasi::class,'id','id_detail_lokasi');
    }

    public function jenis_asuransi()
    {
        return $this->hasOne(JenisAsuransi::class,'id_kirim_hewan','id');
    }

    public function jenis_kandang()
    {
        return $this->hasOne(JenisKandang::class,'id_kirim_hewan','id');
    }

    public function jenis_pengiriman()
    {
        return $this->hasOne(JenisPengiriman::class,'id_kirim_hewan','id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'id','id_user');
    }

    public function kurir()
    {
        return $this->belongsTo(User::class,'id','id_kurir');
    }
}
