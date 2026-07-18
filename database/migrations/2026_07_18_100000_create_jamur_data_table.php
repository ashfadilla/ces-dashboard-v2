<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jamur_data', function (Blueprint $table) {
            $table->id();

            // Data 2 node sensor jamur
            $table->decimal('suhu_node1', 4, 1)->nullable();
            $table->decimal('suhu_node2', 4, 1)->nullable();
            $table->integer('kelembaban_node1')->nullable();
            $table->integer('kelembaban_node2')->nullable();

            // Status pengabutan & mode
            $table->boolean('status_relay')->default(false); // true = pengabutan nyala
            $table->string('mode')->default('otomatis');     // 'otomatis' / 'manual'

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jamur_data');
    }
};
