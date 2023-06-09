<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'lokasi';

    public function users()
    {
        return $this->belongsTo(Lokasi::class,'id','id_user');
    }
}
