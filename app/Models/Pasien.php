<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    // protected $table = 'pasiens';
    protected $fillable = ['name', 'glukosa_darah_sewaktu', 'glukosa_darah_puasa', 'glukosa_dua_jam', 'hba1c', 'usia', 'kecepatan_gejala', 'riwayat_keluarga', 'berat_badan', 'jenis_kelamin', 'tipe_diabetes'];
}
