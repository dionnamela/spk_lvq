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
        Schema::create('training_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('glukosa_darah_sewaktu');
            $table->integer('glukosa_darah_puasa');
            $table->integer('glukosa_dua_jam');
            $table->float('hba1c');
            $table->integer('usia');
            $table->integer('kecepatan_gejala');
            $table->integer('riwayat_keluarga');
            $table->integer('berat_badan');
            $table->integer('jenis_kelamin');
            $table->integer('tipe_diabetes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
