<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\ActivityLog;
class PatientController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TAMPIL DATA PASIEN
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
{
    $query = Patient::query();

    // SEARCH
    if ($request->search) {

        $query->where(function ($q) use ($request) {

            $q->where('nama', 'like', '%' . $request->search . '%')
              ->orWhere('no_rm', 'like', '%' . $request->search . '%')
              ->orWhere('ruangan', 'like', '%' . $request->search . '%');

        });

    }

    // FILTER JENIS KELAMIN
    if ($request->jenis_kelamin) {

    $query->where('jenis_kelamin', 'like', '%' . $request->jenis_kelamin . '%');

    }

    // FILTER STATUS
    if ($request->status) {

        $query->where('status', 'like', '%' . $request->status . '%');

    }

    $patients = $query->latest()->get();

    // Total pasien
    $totalPasien = Patient::count();

    // Pasien baru hari ini
    $pasienBaruHariIni = Patient::whereDate('created_at', today())->count();

    // Pasien aktif
    $pasienAktif = Patient::where('status', 'Aktif')->count();

    // Pasien nonaktif
    $pasienNonaktif = Patient::where('status', 'Nonaktif')->count();

    return view('patients.index', compact(
        'patients',
        'totalPasien',
        'pasienBaruHariIni',
        'pasienAktif',
        'pasienNonaktif'
    ));
}

    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH PASIEN
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('patients.create');
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN DATA PASIEN
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        Patient::create([

            'no_rm'            => $request->no_rm,
            'nama'             => $request->nama,
            'jenis_kelamin'    => $request->jenis_kelamin,
            'tanggal_lahir'    => $request->tanggal_lahir,
            'ruangan'          => $request->ruangan,
            'kelas'            => $request->kelas,
            'diagnosa'         => $request->diagnosa,
            'jenis_diet'       => $request->jenis_diet,
            'alergi'           => $request->alergi,
            'telepon'          => $request->telepon,
            'kontak_darurat'   => $request->kontak_darurat,
            'catatan'          => $request->catatan,
            'status'           => 'Aktif',

        ]);

        // SIMPAN AKTIVITAS
    ActivityLog::create([
        'aktivitas' => 'Menambahkan pasien: ' . $request->nama
    ]);

    return redirect()
            ->route('patients.index')
            ->with('success', 'Data pasien berhasil ditambahkan');
}

    /*
    |--------------------------------------------------------------------------
    | DETAIL DATA PASIEN
    |--------------------------------------------------------------------------
    */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /*
    |--------------------------------------------------------------------------
    | FORM EDIT PASIEN
    |--------------------------------------------------------------------------
    */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE DATA PASIEN
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Patient $patient)
    {
        $patient->update([

            'no_rm'            => $request->no_rm,
            'nama'             => $request->nama,
            'jenis_kelamin'    => $request->jenis_kelamin,
            'tanggal_lahir'    => $request->tanggal_lahir,
            'ruangan'          => $request->ruangan,
            'kelas'            => $request->kelas,
            'diagnosa'         => $request->diagnosa,
            'jenis_diet'       => $request->jenis_diet,
            'alergi'           => $request->alergi,
            'telepon'          => $request->telepon,
            'kontak_darurat'   => $request->kontak_darurat,
            'catatan'          => $request->catatan,

        ]);

        return redirect()
                ->route('patients.edit', $patient->id)
                ->with('success', 'Data pasien berhasil diperbarui');
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS DATA PASIEN
    |--------------------------------------------------------------------------
    */
    public function destroy(Patient $patient)
    {

    ActivityLog::create([
    'aktivitas' => 'Menghapus pasien: ' . $patient->nama
]);

        $patient->delete();

        return redirect()
                ->route('patients.index')
                ->with('success', 'Data pasien berhasil dihapus');
    }
    
}