<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\MenuPatient;

class AhliGiziController extends Controller
{
    public function dashboard()
    {
        // TOTAL PASIEN
        $totalPasien = Patient::count();

        // MENU AKTIF
        $menuAktif = MenuPatient::where(
            'status_menu',
            'Diproses'
        )->count();

        // STATUS MENU
        $statusMenu = MenuPatient::count();

        // LAPORAN HARI INI
        $laporanHariIni = MenuPatient::whereDate(
            'created_at',
            now()
        )->count();

        // MENU TERBARU
        $recentMenus = MenuPatient::latest()
            ->take(2)
            ->get();

        return view('gizi.dashboard', compact(
            'totalPasien',
            'menuAktif',
            'statusMenu',
            'laporanHariIni',
            'recentMenus'
        ));
    }
}