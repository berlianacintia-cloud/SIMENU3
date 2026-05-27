<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patient_id')->constrained();
            $table->foreignId('diet_id')->constrained();

            $table->string('kalori');
            $table->string('bentuk_makanan');

            $table->text('sarapan');
            $table->text('makan_siang');
            $table->text('makan_malam');
            $table->text('snack');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};