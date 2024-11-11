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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('glukosa_darah_sewaktu');
            $table->float('glukosa_darah_puasa');
            $table->float('glukosa_dua_jam');
            $table->float('hba1c');
            $table->float('usia');
            $table->string('kecepatan_gejala');
            $table->string('riwayat_keluarga');
            $table->float('berat_badan');
            $table->string('jenis_kelamin');
            $table->string('tipe_diabetes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
