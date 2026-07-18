<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('submersible_data', function (Blueprint $table) {
            $table->id();
            $table->decimal('tegangan', 5, 2);
            $table->decimal('daya', 5, 1);
            $table->decimal('energi_harian', 8, 2);
            $table->decimal('energi_total', 12, 2);

            $table->decimal('debit', 5, 2);
            $table->decimal('volume_harian', 6, 2);
            $table->decimal('volume_total', 12, 2);
            $table->integer('durasi_pemakaian_harian', false, true);
            $table->integer('durasi_pemakaian_total', false, true);

            $table->integer('intensitas_cahaya');
            $table->decimal('suhu', 3, 1);
            $table->decimal('suhu_harian', 3, 1);

            $table->integer('durasi_koneksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submersible_data');
    }
};
