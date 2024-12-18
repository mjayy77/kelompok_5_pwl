<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metodePembayaran extends Model
{
    use HasFactory;

    protected $table = 'metode_pembayarans'; 

    protected $fillable = [
        'name',
    ];

    public function transaksiPenjualans()
    {
    return $this->hasMany(TransaksiPenjualan::class, 'metode_pembayaran_id');
    }

}
