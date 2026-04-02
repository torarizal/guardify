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
    Schema::create('absensis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('petugas_id')->constrained();
        $table->foreignId('jadwal_id')->constrained();
        $table->date('tanggal');
        $table->string('foto');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
