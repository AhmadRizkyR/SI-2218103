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
        Schema::create('transaksi_pembelian', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi_pembelian', 50)->index()->unique();
            $table->unsignedBigInteger('user_input')->index();
            $table->unsignedBigInteger('user_approval')->index()->nullable();
            $table->unsignedBigInteger('supplier_id')->index();
            $table->unsignedBigInteger('outlet_id')->index();
            $table->integer('total_nominal');
            $table->enum('status', ['Draft', 'Proccess', 'Success']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_pembelian');
    }
};
