<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailLokasi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'detail_lokasi';

    protected $with = ['kirim_hewan'];

    public function kirim_hewan()
    {
        return $this->hasMany(KirimHewan::class,'id_detail_lokasi','id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'id_user','id');
    }
}
