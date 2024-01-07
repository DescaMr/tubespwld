<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_barang_masuk',
        'jumlah_masuk',
        'tgl_masuk'

        // Atribut lain yang dapat diisi secara massal (fillable)
    ];
}
