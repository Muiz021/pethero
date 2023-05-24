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
        Schema::table('jenis_asuransi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kirim_hewan')->nullable()->after('id');
            $table->foreign('id_kirim_hewan')->references('id')->on('kirim_hewan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jenis_asuransi', function (Blueprint $table) {
            //
        });
    }
};
