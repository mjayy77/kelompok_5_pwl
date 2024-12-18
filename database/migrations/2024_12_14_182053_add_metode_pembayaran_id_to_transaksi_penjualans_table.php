<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transaksi_penjualans', function (Blueprint $table) {
            $table->unsignedBigInteger('metode_pembayaran_id')->nullable()->after('status_pemesanan_id');
            $table->foreign('metode_pembayaran_id')->references('id')->on('metode_pembayarans')->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi_penjualans', function (Blueprint $table) {
            $table->dropForeign(['metode_pembayaran_id']);
            $table->dropColumn('metode_pembayaran_id');
        });
        
    }
};
