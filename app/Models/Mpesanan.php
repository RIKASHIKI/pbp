<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mpesanan extends Model
{
    public function barang_relasi(){
        return $this->belongsTo(Mbarang::class, 'id_barang','id_barang');
    }
    public function pembeli_relasi(){
        return $this->belongsTo(Mpembeli::class, 'id_pembeli','id_pembeli');
    }
}
 