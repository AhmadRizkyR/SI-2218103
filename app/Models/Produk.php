<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $guarded = [];

    public function kategori(){
        
        return $this->belongsTo(Kategori::class);
    }

    public function satuan(){
        return $this->belongsTo(Satuan::class);
    }
}
