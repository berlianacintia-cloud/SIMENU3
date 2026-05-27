<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [

        'no_rm',
        'nama',
        'umur',
        'jenis_kelamin',
        'tanggal_lahir',
        'ruangan',
        'kelas',
        'diagnosa',
        'jenis_diet',
        'alergi',
        'telepon',
        'kontak_darurat',
        'catatan',
        'status'

    ];
    public function menus()
{
    return $this->hasMany(MenuPatient::class);
}
}
