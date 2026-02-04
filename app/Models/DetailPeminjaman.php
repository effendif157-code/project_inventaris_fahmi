<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPeminjaman extends Model
{
    protected $table = 'detail_peminjaman';

    protected $fillable = [
        'peminjaman_id',
        'barang_id',
        'jumlah',
        'kondisi_sebelum',
        'kondisi_sesudah',
    ];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
