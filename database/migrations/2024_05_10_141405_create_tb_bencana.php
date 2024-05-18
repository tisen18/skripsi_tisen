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
        Schema::create('tb_bencana', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kelurahan');
            $table->integer('tahun');
            $table->unsignedBigInteger('id_kategori');
            $table->integer('nilai_1');
            $table->integer('nilai_2');
            $table->integer('nilai_3');
            $table->integer('nilai_4');
            
            // Add foreign key constraints if needed
            $table->foreign('id_kelurahan')->references('id')->on('tb_kelurahan');
            $table->foreign('id_kategori')->references('id')->on('tb_kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_bencana');
    }
};
