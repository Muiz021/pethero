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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('nomor_ponsel')->nullable();
            $table->enum('status', ['diterima', 'proses','tidak diterima'])->nullable();
            $table->string('foto_sim_c')->nullable();
            $table->string('slug')->nullable();
            $table->string('gambar')->nullable();
            $table->string('roles')->default('member');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
