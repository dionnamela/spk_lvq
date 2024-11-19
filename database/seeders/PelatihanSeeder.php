<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelatihan;

class PelatihanSeeder extends Seeder
{
    public function run()
    {
        // Membuat 500 data dummy menggunakan factory
        // Pelatihan::factory()->count(25)->create();
        Pelatihan::factory()->create(
            [
                'name' => 'Huzaimah',
                'glukosa_darah_sewaktu' => 257,
                'glukosa_darah_puasa' => 266,
                'glukosa_dua_jam' => 261,
                'hba1c' => 7.5,
                'usia' => 62,
                'kecepatan_gejala' => 1,
                'riwayat_keluarga' => 1,
                'berat_badan' => 48,
                'jenis_kelamin' => 1,
                'tipe_diabetes' => 0,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Svetlana Yudith',
                'glukosa_darah_sewaktu' => 343,
                'glukosa_darah_puasa' => 310,
                'glukosa_dua_jam' => 287,
                'hba1c' => 7.4,
                'usia' => 54,
                'kecepatan_gejala' => 0,
                'riwayat_keluarga' => 0,
                'berat_badan' => 57,
                'jenis_kelamin' => 1,
                'tipe_diabetes' => 1,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Hans Kabi',
                'glukosa_darah_sewaktu' => 241,
                'glukosa_darah_puasa' => 229,
                'glukosa_dua_jam' => 238,
                'hba1c' => 7.2,
                'usia' => 67,
                'kecepatan_gejala' => 1,
                'riwayat_keluarga' => 0,
                'berat_badan' => 47,
                'jenis_kelamin' => 0,
                'tipe_diabetes' => 0,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Joycelin',
                'glukosa_darah_sewaktu' => 358,
                'glukosa_darah_puasa' => 322,
                'glukosa_dua_jam' => 305,
                'hba1c' => 7.4,
                'usia' => 71,
                'kecepatan_gejala' => 0,
                'riwayat_keluarga' => 1,
                'berat_badan' => 45,
                'jenis_kelamin' => 1,
                'tipe_diabetes' => 1,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Margaretha',
                'glukosa_darah_sewaktu' => 240,
                'glukosa_darah_puasa' => 213,
                'glukosa_dua_jam' => 231,
                'hba1c' => 7.7,
                'usia' => 68,
                'kecepatan_gejala' => 0,
                'riwayat_keluarga' => 1,
                'berat_badan' => 48,
                'jenis_kelamin' => 1,
                'tipe_diabetes' => 1,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Jerry',
                'glukosa_darah_sewaktu' => 477,
                'glukosa_darah_puasa' => 448,
                'glukosa_dua_jam' => 435,
                'hba1c' => 8.2,
                'usia' => 66,
                'kecepatan_gejala' => 0,
                'riwayat_keluarga' => 1,
                'berat_badan' => 44,
                'jenis_kelamin' => 0,
                'tipe_diabetes' => 1,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Olga Vivian',
                'glukosa_darah_sewaktu' => 251,
                'glukosa_darah_puasa' => 237,
                'glukosa_dua_jam' => 216,
                'hba1c' => 7.4,
                'usia' => 55,
                'kecepatan_gejala' => 1,
                'riwayat_keluarga' => 1,
                'berat_badan' => 52,
                'jenis_kelamin' => 1,
                'tipe_diabetes' => 0,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Rahmat Pradana',
                'glukosa_darah_sewaktu' => 220,
                'glukosa_darah_puasa' => 140,
                'glukosa_dua_jam' => 180,
                'hba1c' => 7.3,
                'usia' => 58,
                'kecepatan_gejala' => 1,
                'riwayat_keluarga' => 1,
                'berat_badan' => 58,
                'jenis_kelamin' => 0,
                'tipe_diabetes' => 0,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Sri Rahmawati ',
                'glukosa_darah_sewaktu' => 210,
                'glukosa_darah_puasa' => 145,
                'glukosa_dua_jam' => 190,
                'hba1c' => 7.4,
                'usia' => 54,
                'kecepatan_gejala' => 1,
                'riwayat_keluarga' => 0,
                'berat_badan' => 48,
                'jenis_kelamin' => 1,
                'tipe_diabetes' => 0,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Alan Pratama',
                'glukosa_darah_sewaktu' => 477,
                'glukosa_darah_puasa' => 421,
                'glukosa_dua_jam' => 388,
                'hba1c' => 8.4,
                'usia' => 46,
                'kecepatan_gejala' => 0,
                'riwayat_keluarga' => 1,
                'berat_badan' => 57,
                'jenis_kelamin' => 0,
                'tipe_diabetes' => 1,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Sulistyawati',
                'glukosa_darah_sewaktu' => 205,
                'glukosa_darah_puasa' => 130,
                'glukosa_dua_jam' => 180,
                'hba1c' => 6.7,
                'usia' => 33,
                'kecepatan_gejala' => 0,
                'riwayat_keluarga' => 0,
                'berat_badan' => 64,
                'jenis_kelamin' => 1,
                'tipe_diabetes' => 1,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Harun Tiasna',
                'glukosa_darah_sewaktu' => 511,
                'glukosa_darah_puasa' => 458,
                'glukosa_dua_jam' => 486,
                'hba1c' => 8.1,
                'usia' => 42,
                'kecepatan_gejala' => 0,
                'riwayat_keluarga' => 1,
                'berat_badan' => 51,
                'jenis_kelamin' => 1,
                'tipe_diabetes' => 1,
            ],

        );

        Pelatihan::factory()->create(
            [
                'name' => 'Rudi Susanto',
                'glukosa_darah_sewaktu' => 235,
                'glukosa_darah_puasa' => 191,
                'glukosa_dua_jam' => 177,
                'hba1c' => 6.6,
                'usia' => 56,
                'kecepatan_gejala' => 1,
                'riwayat_keluarga' => 0,
                'berat_badan' => 46,
                'jenis_kelamin' => 0,
                'tipe_diabetes' => 0,
            ],

        );

        Pelatihan::factory()->create(
            [
                'name' => 'Rifky Daly',
                'glukosa_darah_sewaktu' => 413,
                'glukosa_darah_puasa' => 390,
                'glukosa_dua_jam' => 375,
                'hba1c' => 7.6,
                'usia' => 45,
                'kecepatan_gejala' => 1,
                'riwayat_keluarga' => 0,
                'berat_badan' => 77,
                'jenis_kelamin' => 0,
                'tipe_diabetes' => 0,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Rismayanti',
                'glukosa_darah_sewaktu' => 291,
                'glukosa_darah_puasa' => 283,
                'glukosa_dua_jam' => 302,
                'hba1c' => 7.5,
                'usia' => 48,
                'kecepatan_gejala' => 0,
                'riwayat_keluarga' => 0,
                'berat_badan' => 56,
                'jenis_kelamin' => 1,
                'tipe_diabetes' => 1,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Siti Nutfah',
                'glukosa_darah_sewaktu' => 177,
                'glukosa_darah_puasa' => 147,
                'glukosa_dua_jam' => 155,
                'hba1c' => 6.6,
                'usia' => 45,
                'kecepatan_gejala' => 1,
                'riwayat_keluarga' => 0,
                'berat_badan' => 68,
                'jenis_kelamin' => 1,
                'tipe_diabetes' => 0,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Abdurahman',
                'glukosa_darah_sewaktu' => 214,
                'glukosa_darah_puasa' => 200,
                'glukosa_dua_jam' => 196,
                'hba1c' => 6.8,
                'usia' => 47,
                'kecepatan_gejala' => 1,
                'riwayat_keluarga' => 0,
                'berat_badan' => 64,
                'jenis_kelamin' => 0,
                'tipe_diabetes' => 0,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Josh Saragih',
                'glukosa_darah_sewaktu' => 310,
                'glukosa_darah_puasa' => 292,
                'glukosa_dua_jam' => 261,
                'hba1c' => 7.3,
                'usia' => 27,
                'kecepatan_gejala' => 0,
                'riwayat_keluarga' => 1,
                'berat_badan' => 82,
                'jenis_kelamin' => 0,
                'tipe_diabetes' => 1,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Yudith  Manusama',
                'glukosa_darah_sewaktu' => 417,
                'glukosa_darah_puasa' => 395,
                'glukosa_dua_jam' => 376,
                'hba1c' => 7.7,
                'usia' => 62,
                'kecepatan_gejala' => 1,
                'riwayat_keluarga' => 1,
                'berat_badan' => 51,
                'jenis_kelamin' => 1,
                'tipe_diabetes' => 0,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Irmayani',
                'glukosa_darah_sewaktu' => 170,
                'glukosa_darah_puasa' => 144,
                'glukosa_dua_jam' => 181,
                'hba1c' => 6.5,
                'usia' => 38,
                'kecepatan_gejala' => 0,
                'riwayat_keluarga' => 0,
                'berat_badan' => 41,
                'jenis_kelamin' => 1,
                'tipe_diabetes' => 1,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Adi Agum',
                'glukosa_darah_sewaktu' => 180,
                'glukosa_darah_puasa' => 171,
                'glukosa_dua_jam' => 162,
                'hba1c' => 6.3,
                'usia' => 48,
                'kecepatan_gejala' => 1,
                'riwayat_keluarga' => 1,
                'berat_badan' => 32,
                'jenis_kelamin' => 0,
                'tipe_diabetes' => 0,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Surya Ningsih',
                'glukosa_darah_sewaktu' => 277,
                'glukosa_darah_puasa' => 248,
                'glukosa_dua_jam' => 244,
                'hba1c' => 6.6,
                'usia' => 38,
                'kecepatan_gejala' => 0,
                'riwayat_keluarga' => 0,
                'berat_badan' => 52,
                'jenis_kelamin' => 1,
                'tipe_diabetes' => 1,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Achmad Latif',
                'glukosa_darah_sewaktu' => 339,
                'glukosa_darah_puasa' => 288,
                'glukosa_dua_jam' => 292,
                'hba1c' => 7.2,
                'usia' => 41,
                'kecepatan_gejala' => 1,
                'riwayat_keluarga' => 0,
                'berat_badan' => 55,
                'jenis_kelamin' => 0,
                'tipe_diabetes' => 0,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Samratih',
                'glukosa_darah_sewaktu' => 220,
                'glukosa_darah_puasa' => 273,
                'glukosa_dua_jam' => 258,
                'hba1c' => 6.9,
                'usia' => 52,
                'kecepatan_gejala' => 1,
                'riwayat_keluarga' => 1,
                'berat_badan' => 49,
                'jenis_kelamin' => 1,
                'tipe_diabetes' => 0,
            ],

        );
        Pelatihan::factory()->create(
            [
                'name' => 'Ayu Lestari',
                'glukosa_darah_sewaktu' => 404,
                'glukosa_darah_puasa' => 377,
                'glukosa_dua_jam' => 328,
                'hba1c' => 7.4,
                'usia' => 24,
                'kecepatan_gejala' => 0,
                'riwayat_keluarga' => 1,
                'berat_badan' => 66,
                'jenis_kelamin' => 1,
                'tipe_diabetes' => 1,
            ],

        );
    }
}
