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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_product_id')->nullable()->index();
            $table->foreignId('supplier_id')->nullable()->index();
            $table->string('image');
            $table->string('title');
            $table->text('description');
            $table->decimal('price');
            $table->integer('discount')->default(0);
            $table->integer('stock')->default(0);
            $table->timestamps();
        });

        Schema::create('category_product', function (Blueprint $table) {
            $table->id();
            $table->string('product_category_name');
            $table->text('description');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier');
            $table->string('pic_supplier');
            $table->string('alamat_supplier');
            $table->string('no_hp_pic_supplier');
            $table->timestamps();
        });

        Schema::create('transaksi_penjualans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status_pemesanan_id')->nullable()->index();
            $table->foreignId('metode_pembayaran_id')->nullable()->index()->constrained('metode_pembayarans')->cascadeOnDelete();
            $table->date('tanggal_transaksi'); 
            $table->string('email_pembeli');
            $table->decimal('total')->default(0);
            $table->timestamps(); 
        });

        Schema::create('detail_transaksi_penjualans', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_pembelian')->default(0);
            $table->decimal('harga')->default(0);
            $table->foreignId('transaksi_penjualan_id')->nullable()->index();
            $table->foreignId('product_id')->nullable()->index();
            $table->timestamps();
        });

        Schema::create('status_pemesanan', function (Blueprint $table) {
            $table->id();
            $table->string('status_pemesanan');
            $table->timestamps();
        });

        Schema::create('metode_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        DB::table('status_pemesanan')->insert([
            ['status_pemesanan' => 'On Process'],
            ['status_pemesanan' => 'Delivered'],
            ['status_pemesanan' => 'Arrived'],
            ['status_pemesanan' => 'Canceled'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('detail_transaksi_penjualans');
        Schema::dropIfExists('transaksi_penjualans');
        Schema::dropIfExists('status_pemesanan');
        Schema::dropIfExists('category_product');
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('metode_pembayarans');
    }
};
