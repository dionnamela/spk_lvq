<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\LVQService;
use App\Models\Pelatihan;

class TestLVQ extends Command
{
    protected $signature = 'lvq:test';
    protected $description = 'Test the LVQ model accuracy using training and test data';

    private $lvqService;

    public function __construct(LVQService $lvqService)
    {
        parent::__construct();
        $this->lvqService = $lvqService;
    }

    public function handle()
    {
        // Ambil semua data latih dari database
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
        if (empty($dataLatih)) {
            $this->info('Data latih kosong!');
            return;
        }

        // Pembagian data latih dan data uji (80% latih, 20% uji)
        $jumlahLatih = floor(0.8 * count($dataLatih)); // 80% untuk latih
        $dataLatihSet = array_slice($dataLatih, 0, $jumlahLatih); // Data latih
        $dataUjiSet = array_slice($dataLatih, $jumlahLatih); // Data uji

        if (empty($dataLatihSet) || empty($dataUjiSet)) {
            $this->info('Data latih atau uji kosong!');
            return;
        }

        // Latih model LVQ
        $model = $this->lvqService->latihLVQ($dataLatihSet, 2); // 2 adalah jumlah kelas (tipe diabetes)

        // Hitung akurasi
        $benar = 0;
        $total = count($dataUjiSet);

        foreach ($dataUjiSet as $data) {
            // Prediksi tipe diabetes dari data uji
            $prediksi = $this->lvqService->prediksi($data['vector'], $model);
            if ($prediksi == $data['tipe_diabetes']) {
                $benar++;
            }
        }

        // Hitung dan tampilkan akurasi
        $akurasi = ($benar / $total) * 100;
        $this->info("Akurasi model LVQ: {$akurasi}%");
    }
}
