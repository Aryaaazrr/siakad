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
        Schema::create('pengampu', function (Blueprint $table) {
            $table->string('kode_mk')->required();
            $table->foreign('kode_mk')->references('kode_mk')->on('mata_kuliah')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nip')->required();
            $table->foreign('nip')->references('nip')->on('dosen')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengampu');
    }
};