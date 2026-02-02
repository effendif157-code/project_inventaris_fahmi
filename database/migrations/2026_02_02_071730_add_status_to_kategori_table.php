<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kategori', function (Blueprint $table) {
            // Menambahkan kolom status (1 = Aktif, 0 = Tidak Aktif)
            $table->integer('status')->default(1)->after('deskripsi'); 
        });
    }

    public function down(): void
    {
        Schema::table('kategori', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
