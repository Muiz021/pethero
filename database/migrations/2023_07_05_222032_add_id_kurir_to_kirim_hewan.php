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
            $table->unsignedBigInteger('id_kurir')->nullable()->after('id');
            $table->foreign('id_kurir')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
