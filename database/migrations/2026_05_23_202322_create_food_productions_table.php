<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('food_productions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('menu_id')->constrained();

            $table->enum('status', [
                'belum_diproses',
                'sedang_diproses',
                'siap_diantar',
                'sudah_diterima'
            ]);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('food_productions');
    }
};