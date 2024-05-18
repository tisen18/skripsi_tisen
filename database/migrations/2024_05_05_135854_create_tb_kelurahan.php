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
        Schema::create('tb_kelurahan', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama_kelurahan', 100);
            $table->unsignedBigInteger('id_kecamatan'); // Menggunakan tipe data yang sesuai
            $table->foreign('id_kecamatan')->references('id')->on('tb_kecamatan'); // Jika id_kecamatan merupakan foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_kelurahan');
    }
};
