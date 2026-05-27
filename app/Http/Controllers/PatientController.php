<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TAMPIL DATA PASIEN
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $patients = Patient::latest()->get();

        return view('patients.index', compact('patients'));
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
        $patient->delete();

        return redirect()
                ->route('patients.index')
                ->with('success', 'Data pasien berhasil dihapus');
    }
}