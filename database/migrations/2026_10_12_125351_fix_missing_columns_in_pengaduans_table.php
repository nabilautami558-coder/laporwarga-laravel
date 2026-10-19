<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            if (!Schema::hasColumn('pengaduans', 'waktu_kejadian')) {
                $table->dateTime('waktu_kejadian')->nullable();
            }

            if (!Schema::hasColumn('pengaduans', 'terlapor')) {
                $table->string('terlapor')->nullable();
            }
        });
    }

    public function down(): void
    {
        // Tidak menghapus kolom agar data tetap aman.
    }
};

