<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankPembayaran extends Model
{
    use HasFactory;

    protected $table = 'bank_pembayaran';

    protected $guarded = [];
}
