<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ActivityLog;


class UserManagementController extends Controller
{
    /**
     * TAMPIL HALAMAN USER
     */
    public function index()
{
    $users = User::latest()->get();

    // Hitung role realtime
    $superAdmin = User::where('role', 'admin')->count();

    $dokter = User::where('role', 'dokter')->count();

    $ahliGizi = User::where('role', 'ahli_gizi')->count();

    $petugasDapur = User::where('role', 'petugas_dapur')->count();

    return view('manajemen-user.index', compact(
        'users',
        'superAdmin',
        'dokter',
        'ahliGizi',
        'petugasDapur'
    ));
}

    /**
     * SIMPAN USER
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        // SIMPAN USER
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
            'role' => $request->role,
             'unit_kerja' => $request->unit_kerja,
    ]);

        // SPATIE ROLE
        $user->assignRole($request->role);

        // SIMPAN AKTIVITAS
        ActivityLog::create([
    'aktivitas' => 'Menambahkan user: ' . $request->name
]);

        return redirect()
            ->back()
            ->with('success', 'User berhasil ditambahkan');
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS USER
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()
            ->back()
            ->with('delete', 'User berhasil dihapus');
    }

    public function show($id)
{
    $user = User::findOrFail($id);

    return view('manajemen-user.show', compact('user'));
}

public function edit($id)
{
    $user = User::findOrFail($id);

    return view('manajemen-user.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'unit_kerja' => $request->unit_kerja,
    ]);

    return redirect()
        ->route('manajemen-user.index')
        ->with('success', 'User berhasil diupdate');
}
}
