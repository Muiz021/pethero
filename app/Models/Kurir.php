<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurir extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kirim_hewan()
    {
        return $this->hasMany(KirimHewan::class,'id_user','id');

    }

}
