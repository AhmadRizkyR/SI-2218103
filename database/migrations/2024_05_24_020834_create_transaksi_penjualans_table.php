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
        Schema::create('transaksi_penjualan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi_penjualan', 50)->index()->unique();
            $table->unsignedBigInteger('user_input')->index();
            $table->unsignedBigInteger('outlet_id')->index();
            $table->unsignedBigInteger('customer_id')->index()->nullable();
            $table->integer('total_nominal');
            $table->string('metode_pembayaran', 50);
            $table->date('tgl_transaksi');
            $table->enum('status', ['Draft', 'Pending', 'Payment', 'Checkout']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_penjualan');
    }
};
