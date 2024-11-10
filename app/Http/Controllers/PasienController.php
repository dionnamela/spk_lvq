<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $title = 'Halaman Pasien';
        $pasiens = Pasien::all();
        return view('pasien', compact('pasiens', 'title'));
    }
}
