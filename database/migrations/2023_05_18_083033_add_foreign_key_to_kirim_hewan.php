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
        Schema::table('kirim_hewan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_jenis_pengiriman')->nullable()->after('deskripsi_hewan');
            $table->unsignedBigInteger('id_jenis_asuransi')->nullable()->after('id_jenis_pengiriman');
            $table->unsignedBigInteger('id_jenis_kandang')->nullable()->after('id_jenis_asuransi');
            $table->unsignedBigInteger('id_lokasi')->nullable()->after('id_jenis_kandang');

            $table->foreign('id_jenis_pengiriman')->references('id')->on('jenis_pengiriman')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_jenis_asuransi')->references('id')->on('jenis_asuransi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_jenis_kandang')->references('id')->on('jenis_kandang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_lokasi')->references('id')->on('lokasi')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kirim_hewan', function (Blueprint $table) {
            //
        });
    }
};
