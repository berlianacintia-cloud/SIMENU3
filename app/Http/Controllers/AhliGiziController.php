<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\MenuPatient;

class AhliGiziController extends Controller
{
    public function dashboard()
    {
        /*
        |--------------------------------------------------------------------------
        | TOTAL PASIEN
        |--------------------------------------------------------------------------
        */
        $totalPasien = Patient::count();


        /*
        |--------------------------------------------------------------------------
        | MENU AKTIF
        |--------------------------------------------------------------------------
        */
        $menuAktif = MenuPatient::where(
            'status_menu',
            'Diproses'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | STATUS MENU
        |--------------------------------------------------------------------------
        */
        $statusMenu = MenuPatient::count();


        /*
        |--------------------------------------------------------------------------
        | LAPORAN HARI INI
        |--------------------------------------------------------------------------
        */
        $laporanHariIni = MenuPatient::whereDate(
            'created_at',
            now()
        )->count();


        /*
        |--------------------------------------------------------------------------
        | GRAFIK DISTRIBUSI MENU
        |--------------------------------------------------------------------------
        */
        $menuPagi = MenuPatient::where(
            'jadwal_makan',
            'Pagi'
        )->count();

        $menuSiang = MenuPatient::where(
            'jadwal_makan',
            'Siang'
        )->count();

        $menuMalam = MenuPatient::where(
            'jadwal_makan',
            'Malam'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | PASIEN BELUM PUNYA MENU
        |--------------------------------------------------------------------------
        */
        $pasienBaru = Patient::whereDoesntHave(
            'menus'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | MENU SEDANG DIMASAK
        |--------------------------------------------------------------------------
        */
        $menuDiproses = MenuPatient::where(
            'status_menu',
            'Dimasak'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | MENU SIAP DISTRIBUSI
        |--------------------------------------------------------------------------
        */
        $distribusiMenu = MenuPatient::where(
            'status_menu',
            'Siap'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | MENU TERBARU
        |--------------------------------------------------------------------------
        */
        $recentMenus = MenuPatient::with('patient')
            ->latest()
            ->take(3)
            ->get();


        return view('gizi.dashboard', compact(

            'totalPasien',
            'menuAktif',
            'statusMenu',
            'laporanHariIni',

            'menuPagi',
            'menuSiang',
            'menuMalam',

            'pasienBaru',
            'menuDiproses',
            'distribusiMenu',

            'recentMenus'

        ));
    }
}