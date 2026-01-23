<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Barang;

class Peminjaman extends Model {
    protected $table = 'peminjaman';
    protected $fillable = [
        'kode_peminjaman', 'nama_peminjam', 'jenis_peminjam', 
        'tanggal_pinjam', 'tanggal_kembali', 'status', 'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function detail() {
        return $this->hasMany(DetailPeminjaman::class);
    }
}

// Model DetailPeminjaman
class DetailPeminjaman extends Model {
    protected $table = 'detail_peminjaman';
    public $timestamps = false; // Karena di diagram tidak ada timestamps
    protected $fillable = ['peminjaman_id', 'barang_id', 'jumlah', 'kondisi_sebelum', 'kondisi_sesudah'];

    public function barang() {
        return $this->belongsTo(Barang::class);
    }
}
