<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPemesanan extends Model
{
    use HasFactory;

    protected $table = 'status_pemesanan';

    public function details()
    {
        return $this->hasMany(TransaksiPenjualan::class, 'status_pemesanan_id');
    }
}