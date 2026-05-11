<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tarif_parkirs', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_kendaraan', 30);
            $table->unsignedInteger('harga_per_jam');
            $table->unsignedInteger('denda')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->unique('jenis_kendaraan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tarif_parkirs');
    }
};

