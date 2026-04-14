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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nis_nip')->unique();
            $table->string('name');
            $table->string('kelas', 10)->nullable(); //khusus siswa
            $table->string('password');
            $table->string('telp', 15)->nullable();
            $table->enum('level', ['admin', 'petugas', 'siswa'])->default('siswa');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
