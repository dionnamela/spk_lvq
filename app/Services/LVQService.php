<?php

namespace App\Services;

class LVQService
{
    // Fungsi untuk melatih model LVQ
    public function latihLVQ(array $dataLatih, int $jumlahKelas)
    {
        // Inisialisasi centroid LVQ
        $centroids = $this->inisialisasiCentroid($jumlahKelas, $dataLatih);

        // Melatih LVQ
        $epoch = 1000; // Jumlah epoch pelatihan
        foreach (range(1, $epoch) as $i) {
            foreach ($dataLatih as $data) {
                // Cari pusat centroid terdekat berdasarkan jarak
                $centroid = $this->findNearestCentroid($data['vector'], $centroids);
                // Update centroid berdasarkan jarak
                $centroids = $this->updateCentroid($data['vector'], $centroid, $centroids);
                // dd($centroids);
            }
        }

        return $centroids;
    }

    // Fungsi untuk menemukan centroid terdekat
    private function findNearestCentroid($data, $centroids)
    {
        $distances = [];
        foreach ($centroids as $key => $centroid) {
            $distances[$key] = $this->calculateDistance($data, $centroid['vector']);
        }
        asort($distances);
        // dd($distances);
        return key($distances); // Kembalikan index centroid terdekat
    }

    // Fungsi untuk menghitung jarak antar vektor
    private function calculateDistance($vector1, $vector2)
    {
        $distance = 0;
        foreach ($vector1 as $key => $value) {
            $distance += pow($value - $vector2[$key], 2);
        }
        return sqrt($distance);
    }

    // Fungsi untuk memperbarui centroid berdasarkan data dan learning rate
    private function updateCentroid($data, $centroidIndex, $centroids)
    {
        $learningRate = 0.025; // Learning rate
        foreach ($data as $key => $value) {
            // Update centroid
            $centroids[$centroidIndex]['vector'][$key] += $learningRate * ($value - $centroids[$centroidIndex]['vector'][$key]);
        }
        return $centroids;
    }

    // Fungsi untuk menginisialisasi centroid acak
    private function inisialisasiCentroid($jumlahKelas, $dataLatih)
    {
        // Tetapkan seed untuk random number generator
        mt_srand(1234); // Gunakan angka tetap untuk reproducibility

        $centroids = [];
        foreach (range(0, $jumlahKelas - 1) as $index) {
            $centroids[$index] = [
                'vector' => $dataLatih[array_rand($dataLatih)]['vector'], // Pemilihan acak dengan seed tetap
            ];
        }

        // Reset seed generator ke keadaan default (opsional jika ada operasi acak lain)
        mt_srand();

        return $centroids;
    }


    // Fungsi untuk memprediksi data baru
    public function prediksi($data, $model)
    {
        // Cari centroid terdekat dan kembalikan tipe diabetes berdasarkan centroid tersebut
        $centroidIndex = $this->findNearestCentroid($data, $model);
        return $centroidIndex; // Return index centroid yang bisa di-map ke tipe diabetes
    }

    // Fungsi untuk menghitung akurasi
    public function hitungAkurasi($dataLatih, $model)
    {
        $benar = 0;
        $total = count($dataLatih);

        foreach ($dataLatih as $data) {
            // Prediksi tipe diabetes dari data uji
            $prediksi = $this->prediksi($data['vector'], $model);
            if ($prediksi == $data['tipe_diabetes']) {
                $benar++;
            }
        }

        // dd($benar);
        return ($benar / $total) * 100; // Return akurasi dalam persen
    }
}
