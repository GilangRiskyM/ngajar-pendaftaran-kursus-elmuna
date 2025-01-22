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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->nullable(false);
            $table->string('nisn')->nullable();
            $table->string('nama')->nullable(false);
            $table->string('jenis_kelamin')->nullable(false);
            $table->string('pekerjaan')->nullable(false);
            $table->string('foto')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
