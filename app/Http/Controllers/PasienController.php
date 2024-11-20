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
            'glukosa_darah_puasa' => 'required',
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




        // Ambil data latih dari database
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

        // Tentukan jumlah data latih dan data uji
        $jumlahLatih = floor(0.8 * count($dataLatih));  // 80% untuk latih
        $dataLatihSet = array_slice($dataLatih, 0, $jumlahLatih); // Data latih
        $dataUjiSet = array_slice($dataLatih, $jumlahLatih); // Data uji

        // Latih model LVQ dengan data pelatihan yang diambil dari database
        $model = $this->lvqService->latihLVQ($dataLatihSet, 2); // 2 adalah jumlah kelas (tipe diabetes)

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

    public function hitungAkurasi()
    {
        $title = 'Akurasi';
        // Ambil data uji dari database atau sumber lain
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
                'tipe_diabetes' => $pasien->tipe_diabetes,
            ];
        })->toArray();

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

        // Tentukan jumlah data latih dan data uji
        $jumlahLatih = floor(0.8 * count($dataLatih)); // 80% untuk latih
        // dd($jumlahLatih);
        $dataLatihSet = array_slice($dataLatih, 0, $jumlahLatih); // Data latih
        // dd($dataLatihSet);
        $dataUjiSet = array_slice($dataLatih, $jumlahLatih); // Data uji
        // dd($dataUjiSet);
        // Model LVQ sudah dilatih sebelumnya
        $model = $this->lvqService->latihLVQ($dataLatihSet, 2); // 2 adalah jumlah kelas (tipe diabetes)

        // Hitung akurasi
        $akurasi = $this->lvqService->hitungAkurasi($dataUjiSet, $model);
        // dd($model);

        return view('/akurasi', ['akurasi' => $akurasi, 'title' => $title]);
    }
    public function update(Request $request, $id)
    {

        $request->validate([
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

        $pasien = Pasien::findOrFail($id);

        $pasien->update([
            'name' => $request->name,
            'glukosa_darah_sewaktu' => $request->glukosa_darah_sewaktu,
            'glukosa_darah_puasa' => $request->glukosa_darah_puasa,
            'glukosa_dua_jam' => $request->glukosa_dua_jam,
            'hba1c' => $request->hba1c,
            'usia' => $request->usia,
            'kecepatan_gejala' => $request->kecepatan_gejala,
            'riwayat_keluarga' => $request->riwayat_keluarga,
            'berat_badan' => $request->berat_badan,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        Alert::success('Sukses', 'Data pasien berhasil diperbarui!');
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
