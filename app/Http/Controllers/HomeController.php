<?php
namespace App\Http\Controllers;

use App\Models\Barang;     // Diganti dari Borrow ke Peminjaman
use App\Models\Peminjaman; // Diganti dari Product ke Barang

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // 1. Mengambil total semua barang
        $totalBarang = Barang::count();

        // 2. Mengambil jumlah barang dengan stok 0
        // Berdasarkan error sebelumnya, kolom di database kamu bernama 'jumlah'
        $stokHabis = Barang::where('jumlah', 0)->count();

        // 3. Mengambil data peminjaman terbaru (limit 5 data terakhir)
        // PERBAIKAN: Relasi di model Peminjaman harus dipanggil 'barang', bukan 'product'
        $peminjamanTerbaru = Peminjaman::with(['user', 'barang'])
            ->latest()
            ->take(5)
            ->get();

        // 4. Menghitung barang yang hampir habis (stok < 5)
        $stokMenipis = Barang::where('jumlah', '>', 0)
            ->where('jumlah', '<', 5)
            ->count();

        return view('home', compact('totalBarang', 'stokHabis', 'peminjamanTerbaru', 'stokMenipis'));
    }
}
