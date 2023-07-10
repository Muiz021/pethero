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
            $table->string('status_pembayaran')->nullable()->default('false')->after('deskripsi_hewan');
            $table->string('status_pengiriman')->nullable()->default('false')->after('status_pembayaran');
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
