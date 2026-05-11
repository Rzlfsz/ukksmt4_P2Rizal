<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('invoice', 30)->unique();

            $table->unsignedBigInteger('kendaraan_id');
            $table->foreign('kendaraan_id')->references('id_kendaraan')->on('kendaraans')->cascadeOnDelete();

            $table->foreignId('petugas_id')->nullable()->constrained('users')->nullOnDelete();

            $table->dateTime('waktu_masuk');
            $table->dateTime('waktu_keluar')->nullable();

            $table->unsignedInteger('durasi_menit')->nullable();
            $table->unsignedInteger('total_bayar')->default(0);
            $table->string('status_pembayaran', 20)->default('unpaid'); // unpaid|paid|void

            $table->timestamps();
            $table->softDeletes();

            $table->index(['waktu_masuk', 'waktu_keluar']);
            $table->index(['status_pembayaran']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};

