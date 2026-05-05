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
        Schema::create('kendaraans', function (Blueprint $table) {
                       $table->id('id_kendaraan');
            $table->string('plat_nomor', 20);
            $table->enum('jenis_kendaraan', ['Motor', 'Mobil', 'Truk']);
            $table->string('warna', 30)->nullable();
            $table->string('pemilik', 100)->nullable();
            $table->unsignedBigInteger('id_user')->nullable();

            // optional relasi ke users
            $table->foreign('id_user')
                  ->references('id')
                  ->on('users')
                  ->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
