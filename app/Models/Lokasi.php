<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class Lokasi extends Model
{
    protected $table    = 'lokasi';
    protected $fillable = ['nama', 'deskripsi'];
}

