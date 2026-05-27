<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class DokterController extends Controller
{
    public function dashboard()
    {
        $totalPasien = Patient::count();

        $pasienBaru = Patient::whereDate('created_at', today())->count();

        return view('dokter.dashboard', compact(
            'totalPasien',
            'pasienBaru'
        ));
    }
}