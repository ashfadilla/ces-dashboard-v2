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
        Schema::create('lab_submersible_logs', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->decimal('energi_harian', 8, 2);
            $table->integer('durasi_pemakaian_harian', false, true);
            $table->decimal('suhu_harian', 3, 1);
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submersible_log');
    }
};
