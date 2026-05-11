<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            $table->dateTime('mulai');
            $table->dateTime('selesai')->nullable();
            $table->string('status', 20)->default('aktif'); // aktif|selesai

            $table->timestamps();
            $table->softDeletes();

            $table->index(['user_id', 'mulai']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};

