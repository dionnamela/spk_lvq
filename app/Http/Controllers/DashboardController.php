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

        // Ambil data latih dari database
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

        // Pastikan ada data latih
        $akurasi = null;
        if (!empty($dataLatih)) {
            $jumlahLatih = floor(0.8 * count($dataLatih)); // 80% untuk latih
            $dataLatihSet = array_slice($dataLatih, 0, $jumlahLatih); // Data latih
            $dataUjiSet = array_slice($dataLatih, $jumlahLatih); // Data uji

            if (!empty($dataLatihSet) && !empty($dataUjiSet)) {
                // Latih model LVQ
                $model = $this->lvqService->latihLVQ($dataLatihSet, 2); // 2 adalah jumlah kelas (tipe diabetes)
                // Hitung akurasi
                $akurasi = $this->lvqService->hitungAkurasi($dataUjiSet, $model);
            }
        }

        return view('dashboard', [
            'title' => $title,
            'pasiensCount' => $pasiensCount,
            'datalatihCount' => $datalatihCount,
            'akurasi' => $akurasi, // Tambahkan akurasi ke view
        ]);
    }
}
