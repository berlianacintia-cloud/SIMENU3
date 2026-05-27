<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;

class MenuPatient extends Model
{
    protected $table = 'menu_patients';

    protected $fillable = [

        'patient_id',
        'jenis_diet',
        'kalori',
        'bentuk_makanan',
        'jadwal_makan',
        'catatan',
        'status_menu',

    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}