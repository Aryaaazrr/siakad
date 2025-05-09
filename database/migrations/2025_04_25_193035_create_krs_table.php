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
        Schema::create('krs', function (Blueprint $table) {
            $table->string('nim')->required();
            $table->foreign('nim')->references('nim')->on('mahasiswa')->onUpdate('cascade')->onDelete('cascade');
            $table->string('kode_mk')->required();
            $table->foreign('kode_mk')->references('kode_mk')->on('mata_kuliah')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('krs');
    }
};
