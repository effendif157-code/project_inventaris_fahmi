<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalBarang = Barang::count();
        
        // GANTI 'stok' dengan nama kolom yang ada di database Anda (misal: 'jumlah')
        $stokKosong = Barang::where('jumlah', 0)->count(); 
        
        $stokMenipisCount = Barang::where('jumlah', '>', 0)
                                ->where('jumlah', '<=', 5)
                                ->count();
        
        $peminjamanTerbaru = Peminjaman::with(['user', 'barang'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'totalBarang', 
            'stokKosong', 
            'stokMenipisCount', 
            'peminjamanTerbaru'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
