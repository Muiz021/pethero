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
        Schema::create('detail_lokasi', function (Blueprint $table) {
            $table->id();
            $table->string('label_alamat', 100);
            $table->longText('alamat');
            $table->string('catatan_driver');
            $table->string('nama_penerimaan');
            $table->string('nomor_ponsel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_lokasi');
    }
};
