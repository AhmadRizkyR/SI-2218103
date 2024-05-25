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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_karyawan', 50)->index()->unique();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('telp', 15)->unique();
            $table->string('jabatan');
            $table->text('alamat');
            $table->unsignedBigInteger('penempatan')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->integer('gaji_pokok')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
