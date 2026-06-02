<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\MenuPatient;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalPasien = Patient::count();

        $totalMenuAktif = MenuPatient::count();

        $distribusiHariIni = MenuPatient::whereDate('created_at', today())
            ->count();

        return view('admin.dashboard', compact(
            'totalPasien',
            'totalMenuAktif',
            'distribusiHariIni'
        ));
    }
}