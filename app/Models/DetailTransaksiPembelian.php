<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiPembelian extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi_pembelian';

    protected $guarded = [];

    public function transaksi_pembelian(){
        return $this->belongsTo(TransaksiPembelian::class);
    }

    public function produk(){
        return $this->belongsTo(Produk::class);
    }

    public function satuan(){
        return $this->belongsTo(Satuan::class);
    }
}
