<?php

namespace App\Http\Controllers;

use App\Models\MenuPatient;
use App\Models\Patient;
use Illuminate\Http\Request;

class MenuPatientController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TAMPIL HALAMAN MENU PASIEN
    |--------------------------------------------------------------------------
    */
public function index(Request $request)
{
    $patients = Patient::all();

    $query = MenuPatient::with('patient');

    // SEARCH PASIEN
    if ($request->search) {

        $query->whereHas('patient', function ($q) use ($request) {

            $q->where('nama', 'like', '%' . $request->search . '%');

        });

    }

    // FILTER BENTUK MAKANAN
    if ($request->bentuk) {

        $query->where('bentuk_makanan', $request->bentuk);

    }

    // FILTER JADWAL MAKAN
    if ($request->jadwal) {

        $query->where('jadwal_makan', $request->jadwal);

    }

    $menus = $query->latest()->get();

    return view('menu-pasien.index', compact('menus', 'patients'));
}
    /*
    |--------------------------------------------------------------------------
    | SIMPAN MENU PASIEN
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'jenis_diet' => 'required',
            'kalori' => 'required',
            'bentuk_makanan' => 'required',
            'jadwal_makan' => 'required',
        ]);

        MenuPatient::create([
            'patient_id' => $request->patient_id,
            'jenis_diet' => $request->jenis_diet,
            'kalori' => $request->kalori,
            'bentuk_makanan' => $request->bentuk_makanan,
            'jadwal_makan' => $request->jadwal_makan,
            'catatan' => $request->catatan,
        ]);

        return redirect()->back()
            ->with('success', 'Data menu pasien berhasil disimpan');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT MENU PASIEN
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $menu = MenuPatient::findOrFail($id);

        $patients = Patient::all();

        return view('menu-pasien.edit', compact('menu', 'patients'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE MENU PASIEN
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $menu = MenuPatient::findOrFail($id);

        $menu->update([
            'patient_id' => $request->patient_id,
            'jenis_diet' => $request->jenis_diet,
            'kalori' => $request->kalori,
            'bentuk_makanan' => $request->bentuk_makanan,
            'jadwal_makan' => $request->jadwal_makan,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('menu-pasien.index')
            ->with('success', 'Data menu pasien berhasil diupdate');
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS MENU PASIEN
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $menu = MenuPatient::findOrFail($id);

        $menu->delete();

        return redirect()->back()
            ->with('success', 'Data berhasil dihapus');
    }

    /*
    |--------------------------------------------------------------------------
    | HALAMAN STATUS MENU
    |--------------------------------------------------------------------------
    */

    public function statusMenu(Request $request)
    {
        $query = MenuPatient::with('patient');

        // FILTER TANGGAL
        if ($request->tanggal) {

            $query->whereDate('created_at', $request->tanggal);

        }

        $menus = $query->latest()->get();

        return view('status-menu.index', compact('menus'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS MENU
    |--------------------------------------------------------------------------
    */

    public function updateStatus(Request $request, $id)
    {
        $menu = MenuPatient::findOrFail($id);

        $menu->status_menu = $request->status_menu;

        $menu->save();

        return redirect()->back();
    }

    /*
    |--------------------------------------------------------------------------
    | HALAMAN LAPORAN
    |--------------------------------------------------------------------------
    */

    public function laporan(Request $request)
{
        $query = MenuPatient::with('patient')
        ->whereIn('status_menu', ['Siap', 'Selesai']);

    // SEARCH
    if ($request->search) {

        $query->whereHas('patient', function ($q) use ($request) {

            $q->where('nama', 'like', '%' . $request->search . '%')
              ->orWhere('no_rm', 'like', '%' . $request->search . '%');

        });

    }

    // FILTER BANGSAL
    if ($request->kelas) {

        $query->whereHas('patient', function ($q) use ($request) {

            $q->where('kelas', $request->kelas);

        });

    }

    // FILTER TANGGAL
    if ($request->tanggal) {

        $query->whereDate('created_at', $request->tanggal);

    }

    $menus = $query->latest()->get();

    // AMBIL SEMUA BANGSAL UNIK
    $bangsals = Patient::select('kelas')
        ->distinct()
        ->pluck('kelas');

    return view('laporan.index', compact('menus', 'bangsals'));
}
}