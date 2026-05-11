<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kendaraans', function (Blueprint $table) {
            if (! Schema::hasColumn('kendaraans', 'area_parkir_id')) {
                $table->foreignId('area_parkir_id')->nullable()->after('pemilik')->constrained('area_parkirs')->nullOnDelete();
            }

            if (! Schema::hasColumn('kendaraans', 'created_at')) {
                $table->timestamps();
            }

            if (! Schema::hasColumn('kendaraans', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    public function down(): void
    {
        Schema::table('kendaraans', function (Blueprint $table) {
            if (Schema::hasColumn('kendaraans', 'area_parkir_id')) {
                $table->dropConstrainedForeignId('area_parkir_id');
            }

            if (Schema::hasColumn('kendaraans', 'deleted_at')) {
                $table->dropSoftDeletes();
            }

            if (Schema::hasColumn('kendaraans', 'created_at')) {
                $table->dropTimestamps();
            }
        });
    }
};

