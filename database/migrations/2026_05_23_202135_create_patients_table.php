<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {

            $table->id();

            $table->string('no_rm')->unique();

            $table->string('nama');

            $table->string('jenis_kelamin');

            $table->date('tanggal_lahir');

            $table->string('ruangan');

            $table->string('kelas');

            $table->text('diagnosa')->nullable();

            $table->string('jenis_diet')->nullable();

            $table->string('alergi')->nullable();

            $table->string('telepon')->nullable();

            $table->string('kontak_darurat')->nullable();

            $table->text('catatan')->nullable();

            $table->string('status')
                  ->default('Aktif');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};