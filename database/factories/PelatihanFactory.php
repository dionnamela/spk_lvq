<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

class PelatihanFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => fake()->name(), // Nama pasien acak
            'glukosa_darah_sewaktu' => fake()->numberBetween(350, 400), // Glukosa darah sewaktu
            'glukosa_darah_puasa' => fake()->numberBetween(350, 400), // Glukosa darah puasa
            'glukosa_dua_jam' => fake()->numberBetween(350, 400), // Glukosa darah 2 jam
            'hba1c' => fake()->randomFloat(1, 5, 10), // HbA1c antara 5 dan 10
            'usia' => fake()->numberBetween(20, 80), // Usia acak antara 20 dan 80
            'kecepatan_gejala' => fake()->numberBetween(0, 1), // Kecepatan gejala (1-5)
            'riwayat_keluarga' => fake()->numberBetween(0, 1), // Riwayat keluarga acak (0 atau 1)
            'berat_badan' => fake()->numberBetween(50, 70), // Berat badan acak antara 40 dan 100 kg
            'jenis_kelamin' => fake()->numberBetween(0, 1), // Jenis kelamin acak (0 atau 1)
            'tipe_diabetes' => fake()->numberBetween(0, 1), // Tipe diabetes acak (0 atau 1)
        ];
    }
}
