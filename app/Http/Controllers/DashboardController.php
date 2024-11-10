<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $title = 'Halaman Dashboard';
        return view('dashboard', ['title' => $title]);
    }
}
