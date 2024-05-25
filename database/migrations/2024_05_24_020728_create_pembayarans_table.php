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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_penjualan_id')->index();
            $table->unsignedBigInteger('transaksi_pembelian_id')->index();
            $table->unsignedBigInteger('pengeluaran_id')->index();
            $table->enum('jenis_transaksi', ['Penjualan', 'Pembelian', 'Pengeluaran']);
            $table->bigInteger('nominal');
            $table->string('metode_pembayaran')->nullable();
            $table->unsignedBigInteger('bank_pembayaran_id')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
