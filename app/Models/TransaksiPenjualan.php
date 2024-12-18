<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    use HasFactory;

    protected $table = 'transaksi_penjualans';


    protected $fillable = [
        'tanggal_transaksi',
        'total',
        'email_pembeli',
        'status_pemesanan_id'
    ];



    public function details()
    {
        return $this->hasMany(DetailTransaksiPenjualan::class, 'transaksi_penjualan_id');
    }

    public function statusPemesanan()
    {
        return $this->belongsTo(StatusPemesanan::class, 'status_pemesanan_id');
    }
}
