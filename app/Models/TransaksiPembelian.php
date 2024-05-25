<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembelian extends Model
{
    use HasFactory;

    protected $table = 'transaksi_pembelian';

    protected $guarded = [];

    public function detail_transaksi_pembelian(){
        return $this->hasMany(DetailTransaksiPembelian::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_input');
    }

    public function approval(){
        return $this->belongsTo(User::class, 'user_approval')->withDefault(['name' => '-']);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function outlet(){
        return $this->belongsTo(Outlet::class);
    }
}
