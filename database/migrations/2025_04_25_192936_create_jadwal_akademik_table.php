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
        Schema::create('jadwal_akademik', function (Blueprint $table) {
            $table->string('hari');
            $table->string('kode_mk')->required();
            $table->foreign('kode_mk')->references('kode_mk')->on('mata_kuliah')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_ruang')->required();
            $table->foreign('id_ruang')->references('id_ruang')->on('ruang')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_gol')->required();
            $table->foreign('id_gol')->references('id_gol')->on('golongan')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_akademik');
    }
};
