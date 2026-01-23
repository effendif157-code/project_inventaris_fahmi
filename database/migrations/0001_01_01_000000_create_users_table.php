<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tabel Users (Sudah diperbaiki dari duplikasi)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'petugas'])->default('petugas');
            $table->rememberToken();
            $table->timestamps();
        });

        // 2. Tabel Kategori
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        // 3. Tabel Lokasi
        Schema::create('lokasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        // 4. Tabel Barang
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
            $table->foreignId('lokasi_id')->constrained('lokasi')->onDelete('cascade');
            $table->enum('kondisi', ['baik', 'rusak_ringan', 'rusak_berat', 'hilang']);
            $table->integer('jumlah');
            $table->string('satuan');
            $table->date('tanggal_beli');
            $table->decimal('harga', 15, 2);
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });

        // 5. Tabel Peminjaman
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('kode_peminjaman')->unique();
            $table->string('nama_peminjam');
            $table->enum('jenis_peminjam', ['siswa', 'guru', 'staf', 'luar']);
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali')->nullable();
            $table->enum('status', ['dipinjam', 'dikembalikan', 'terlambat']);
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });

        // 6. Tabel Detail Peminjaman
        Schema::create('detail_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peminjaman_id')->constrained('peminjaman')->onDelete('cascade');
            $table->foreignId('barang_id')->constrained('barang')->onDelete('cascade');
            $table->integer('jumlah');
            $table->string('kondisi_sebelum');
            $table->string('kondisi_sesudah')->nullable();
        });

        // Tabel Pendukung Laravel (Auth & Session)
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_peminjaman');
        Schema::dropIfExists('peminjaman');
        Schema::dropIfExists('barang');
        Schema::dropIfExists('lokasi');
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
