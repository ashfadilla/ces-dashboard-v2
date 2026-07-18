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
        Schema::create('environment', function (Blueprint $table) {
            $table->id();
            $table->integer('intensitas_cahaya')->nullable();
            $table->decimal('suhu', 3, 1)->nullable();
            $table->decimal('suhu_harian', 3, 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('environment');
    }
};
