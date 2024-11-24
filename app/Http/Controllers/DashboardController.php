<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Pelatihan;
use App\Services\LVQService; // Pastikan Service LVQ diimport
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $lvqService;

    // Injeksi LVQService
    public function __construct(LVQService $lvqService)
    {
        $this->lvqService = $lvqService;
    }

    public function home()
    {
        $title = 'Halaman Dashboard';
        $pasiensCount = Pasien::count();
        $datalatihCount = Pelatihan::count();

        // Ambil data latih dari tabel pelatihans
        $dataLatih = Pelatihan::all()->map(function ($pelatihan) {
            return [
                'vector' => [
                    $pelatihan->glukosa_darah_sewaktu,
                    $pelatihan->glukosa_darah_puasa,
                    $pelatihan->glukosa_dua_jam,
                    $pelatihan->hba1c,
                    $pelatihan->usia,
                    $pelatihan->kecepatan_gejala,
                    $pelatihan->riwayat_keluarga,
                    $pelatihan->berat_badan,
                    $pelatihan->jenis_kelamin,
                ],
                'tipe_diabetes' => $pelatihan->tipe_diabetes,
            ];
        })->toArray();

        // Ambil data uji dari tabel pasiens
        $dataUji = Pasien::all()->map(function ($pasien) {
            return [
                'vector' => [
                    $pasien->glukosa_darah_sewaktu,
                    $pasien->glukosa_darah_puasa,
                    $pasien->glukosa_dua_jam,
                    $pasien->hba1c,
                    $pasien->usia,
                    $pasien->kecepatan_gejala,
                    $pasien->riwayat_keluarga,
                    $pasien->berat_badan,
                    $pasien->jenis_kelamin,
                ],
                'tipe_diabetes' => $pasien->tipe_diabetes, // Asumsikan tabel pasiens memiliki kolom tipe_diabetes
            ];
        })->toArray();

        // Pastikan ada data latih dan uji
        $akurasi = null;
        if (!empty($dataLatih) && !empty($dataUji)) {
            // Latih model LVQ
            $model = $this->lvqService->latihLVQ($dataLatih, 2); // 2 adalah jumlah kelas (tipe diabetes)
            // Hitung akurasi
            $akurasi = $this->lvqService->hitungAkurasi($dataUji, $model);
        }

        return view('dashboard', [
            'title' => $title,
            'pasiensCount' => $pasiensCount,
            'datalatihCount' => $datalatihCount,
            'akurasi' => $akurasi, // Tambahkan akurasi ke view
        ]);
    }
}
