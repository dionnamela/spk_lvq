<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataPelatihanController extends Controller
{
    public function index()
    {
        $title = 'Halaman Data Pelatihan';
        $trainings = Pelatihan::paginate(10);
        $modal_title = "Peringatan!";
        $modal_text = "Apakah anda ingin menghapus data ini?";
        confirmDelete($modal_title, $modal_text);
        return view('data-pelatihan', compact('trainings', 'title'));
    }
    public function store(Request $request)
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
            'tipe_diabetes' => 'required|numeric',
        ]);

        Pelatihan::create([

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
            'tipe_diabetes' => $request->tipe_diabetes,

        ]);

        Alert::success('Sukses', 'Data telah ditambahkan!');
        return redirect('/data-pelatihan');
    }
    public function edit($id)
    {

        $pasien = Pelatihan::findOrFail($id);
        return view('edit-pasien', compact('pasien'));
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
            'tipe_diabetes' => 'required|numeric',
        ]);

        $pelatihan = Pelatihan::findOrFail($id);

        $pelatihan->update([
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
            'tipe_diabetes' => $request->tipe_diabetes,
        ]);

        Alert::success('Sukses', 'Data pelatihan berhasil diperbarui!');
        return redirect('/data-pelatihan');
    }
    public function destroy($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);
        $pelatihan->delete();
        Alert::success('Sukses', 'Data pelatihan berhasil dihapus!');
        return redirect('/data-pelatihan');
    }
}
