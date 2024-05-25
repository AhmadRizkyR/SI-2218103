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
        Schema::create('detail_pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengeluaran_id')->index();
            $table->string('nama');
            $table->integer('qty');
            $table->integer('harga');
            $table->integer('total_nominal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pengeluaran');
    }
};
