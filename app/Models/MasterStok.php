<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterStok extends Model
{
    use HasFactory;

    protected $table = 'master_stok';

    protected $guarded = [];

    public function produk(){
        return $this->belongsTo(Produk::class);
    }

    public function outlet(){
        return $this->belongsTo(Outlet::class);
    }
}
