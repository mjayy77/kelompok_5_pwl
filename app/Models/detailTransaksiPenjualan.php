<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailTransaksiPenjualan extends Model
{
    use HasFactory;

    protected $fillable = ['transaksi_penjualan_id', 'product_id', 'jumlah_pembelian', 'harga'];

    public function transaksiPenjualan()
    {
        return $this->belongsTo(TransaksiPenjualan::class, 'transaksi_penjualan_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}