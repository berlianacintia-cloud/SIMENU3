<?php

namespace App\Http\Controllers;

use App\Models\MenuPatient;

class PetugasDapurController extends Controller
{
    public function dashboard()
    {
        // TOTAL MENU
        $totalMenu = MenuPatient::count();

        // MENU DIPROSES
        $menuDiproses = MenuPatient::where(
            'status_menu',
            'Diproses'
        )->count();

        // MENU SELESAI
        $menuSelesai = MenuPatient::where(
            'status_menu',
            'Selesai'
        )->count();

        // LABEL
        $labelDicetak = MenuPatient::where(
            'status_menu',
            'Selesai'
        )->count();

        // MENU TERBARU
        $recentMenus = MenuPatient::with('patient')
    ->latest()
    ->take(5)
    ->get();

        return view('dapur.dashboard', compact(
            'totalMenu',
            'menuDiproses',
            'menuSelesai',
            'labelDicetak',
            'recentMenus'
        ));
    }
}