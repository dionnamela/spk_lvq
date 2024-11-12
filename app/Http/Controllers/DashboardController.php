<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Pelatihan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $title = 'Halaman Dashboard';
        $pasiensCount = Pasien::count();
        $datalatihCount = Pelatihan::count();
        return view('dashboard', ['title' => $title, 'pasiensCount' => $pasiensCount, 'datalatihCount' => $datalatihCount]);
    }
}
