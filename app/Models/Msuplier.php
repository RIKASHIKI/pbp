<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Msuplier extends Model
{
    use HasFactory;
    protected $table = 'suplier';
    protected $primaryKey = 'id_suplier';
    protected $fillable = ['nama','alamat','kode_pos','kota'];
}
