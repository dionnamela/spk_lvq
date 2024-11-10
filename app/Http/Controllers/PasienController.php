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

        // Menyimpan pesan sukses ke session dengan tipe 'danger'
        return redirect()->route('pasien.index')->with(['message' => 'Data pasien berhasil dihapus!', 'type' => 'danger']);
    }
}
