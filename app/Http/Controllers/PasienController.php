<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $title = 'Halaman Pasien';
        $pasiens = Pasien::paginate(10);
        return view('pasien', compact('pasiens', 'title'));
    }
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pasiens,email',
            'no_hp' => 'required|string|max:15',
        ]);

        // Simpan data ke dalam database
        Pasien::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ]);

        // Menyimpan pesan sukses ke session dengan tipe 'success'
        return redirect()->back()->with(['message' => 'Data pasien berhasil ditambahkan!', 'type' => 'success']);
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        // Menyimpan pesan sukses ke session dengan tipe 'danger'
        return redirect()->route('pasien.index')->with(['message' => 'Data pasien berhasil dihapus!', 'type' => 'danger']);
    }
}
