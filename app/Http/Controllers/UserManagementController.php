<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserManagementController extends Controller
{
    /**
     * TAMPIL HALAMAN USER
     */
    public function index()
    {
        $users = User::latest()->get();

        return view('manajemen-user.index', compact('users'));
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
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // SPATIE ROLE
        $user->assignRole($request->role);

        // SIMPAN AKTIVITAS
        

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
}