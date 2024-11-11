<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mpesanan extends Model
{

    use HasFactory;
    protected $table = 'pesanan';
    protected $fillable = ['id_pesanan','id_pembeli','id_barang','qty','tgl_pesan'];



    public function barang_relasi(){
        return $this->belongsTo(Mbarang::class, 'id_barang','id_barang');
    }
    public function pembeli_relasi(){
        return $this->belongsTo(Mpembeli::class, 'id_pembeli','id_pembeli');
    }
}
 