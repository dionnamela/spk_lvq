<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pasiens,email',
            'no_hp' => 'required|string|max:15',
        ]);
        Pasien::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ]);

        Alert::success('Sukses', 'Data telah ditambahkan!');
        return redirect('/data-pasien');
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
        Alert::success('Sukses', 'Data pasien berhasil dihapus!');
        return redirect('/data-pasien');
    }
}
