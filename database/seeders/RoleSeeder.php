<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'dokter']);
        Role::create(['name' => 'ahli_gizi']);
        Role::create(['name' => 'petugas_dapur']);
    }
}