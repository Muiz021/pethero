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
            $table->unsignedBigInteger('id_detail_lokasi')->nullable()->after('id');
            $table->foreign('id_detail_lokasi')->references('id')->on('kirim_hewan')->onDelete('cascade')->onUpdate('cascade');
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
