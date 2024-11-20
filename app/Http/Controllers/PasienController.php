<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Pelatihan;
use App\Services\LVQService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PasienController extends Controller
{
    protected $lvqService;

    // Inject LVQService
    public function __construct(LVQService $lvqService)
    {
        $this->lvqService = $lvqService;
    }

    public function index()
    {
        $title = 'Halaman Pasien';
        $pasiens = Pasien::paginate(10);
        $modal_title = "Peringatan!";
        $modal_text = "Apakah anda ingin menghapus data ini?";
        confirmDelete($modal_title, $modal_text);
        return view('pasien', compact('pasiens', 'title'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string',
            'glukosa_darah_sewaktu' => 'required|numeric',
            'glukosa_darah_puasa' => 'required|numeric',
            'glukosa_dua_jam' => 'required|numeric',
            'hba1c' => 'required|numeric',
            'usia' => 'required|numeric',
            'kecepatan_gejala' => 'required|numeric',
            'riwayat_keluarga' => 'required|numeric',
            'berat_badan' => 'required|numeric',
            'jenis_kelamin' => 'required|numeric',
        ]);

        // Menyiapkan data untuk prediksi (ambil fitur dari input)
        $data = [
            'vector' => [
                $validated['glukosa_darah_sewaktu'],
                $validated['glukosa_darah_puasa'],
                $validated['glukosa_dua_jam'],
                $validated['hba1c'],
                $validated['usia'],
                $validated['kecepatan_gejala'],
                $validated['riwayat_keluarga'],
                $validated['berat_badan'],
                $validated['jenis_kelamin'],
            ]
        ];

        // Ambil seluruh data latih dari database
        $dataLatih = Pelatihan::all()->map(function ($pasien) {
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
                'tipe_diabetes' => $pasien->tipe_diabetes,
            ];
        })->toArray();

        // Latih model LVQ menggunakan seluruh data latih
        $model = $this->lvqService->latihLVQ($dataLatih, 2); // 2 adalah jumlah kelas (tipe diabetes)

        // Menjalankan prediksi LVQ untuk tipe diabetes menggunakan model yang sudah dilatih
        $tipe_diabetes = $this->lvqService->prediksi($data['vector'], $model);

        // Menyimpan data pasien termasuk hasil prediksi tipe diabetes
        $pasien = Pasien::create([
            'name' => $validated['name'],
            'glukosa_darah_sewaktu' => $validated['glukosa_darah_sewaktu'],
            'glukosa_darah_puasa' => $validated['glukosa_darah_puasa'],
            'glukosa_dua_jam' => $validated['glukosa_dua_jam'],
            'hba1c' => $validated['hba1c'],
            'usia' => $validated['usia'],
            'kecepatan_gejala' => $validated['kecepatan_gejala'],
            'riwayat_keluarga' => $validated['riwayat_keluarga'],
            'berat_badan' => $validated['berat_badan'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'tipe_diabetes' => $tipe_diabetes, // Hasil prediksi
        ]);

        Alert::success('Sukses', 'Data pelatihan berhasil diperbarui!');
        return redirect('/data-pasien');
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'glukosa_darah_sewaktu' => 'required|numeric',
            'glukosa_darah_puasa' => 'required|numeric',
            'glukosa_dua_jam' => 'required|numeric',
            'hba1c' => 'required|numeric',
            'usia' => 'required|numeric',
            'kecepatan_gejala' => 'required|numeric',
            'riwayat_keluarga' => 'required|numeric',
            'berat_badan' => 'required|numeric',
            'jenis_kelamin' => 'required|numeric',
        ]);

        // Ambil data pasien yang akan diperbarui
        $pasien = Pasien::findOrFail($id);

        // Perbarui data pasien
        $pasien->update($validated);

        // Siapkan data untuk prediksi ulang
        $data = [
            'vector' => [
                $validated['glukosa_darah_sewaktu'],
                $validated['glukosa_darah_puasa'],
                $validated['glukosa_dua_jam'],
                $validated['hba1c'],
                $validated['usia'],
                $validated['kecepatan_gejala'],
                $validated['riwayat_keluarga'],
                $validated['berat_badan'],
                $validated['jenis_kelamin'],
            ],
        ];

        // Ambil seluruh data latih dari database
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

        // Latih model LVQ menggunakan seluruh data latih
        $model = $this->lvqService->latihLVQ($dataLatih, 2); // 2 adalah jumlah kelas (tipe diabetes)

        // Prediksi ulang tipe diabetes menggunakan model yang sudah dilatih
        $tipe_diabetes = $this->lvqService->prediksi($data['vector'], $model);

        // Perbarui tipe diabetes pada pasien
        $pasien->update(['tipe_diabetes' => $tipe_diabetes]);

        Alert::success('Sukses', 'Data pasien berhasil diperbarui dan diprediksi ulang!');
        return redirect('/data-pasien');
    }

    public function destroy($id)
    {
        $pelatihan = Pasien::findOrFail($id);
        $pelatihan->delete();
        Alert::success('Sukses', 'Data pasien berhasil dihapus!');
        return redirect('/data-pasien');
    }
}
