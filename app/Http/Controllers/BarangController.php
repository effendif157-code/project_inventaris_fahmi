<?php

namespace App\Http\Controllers;

use App\Models\Barang;   // Pastikan ini ada
use App\Models\Kategori; // Ini yang menyebabkan error tadi
use App\Models\Lokasi;   // Import juga model Lokasi
use Illuminate\Http\Request;


class BarangController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $barangs = Barang::with('lokasi')->get();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        // 1. LOGIKA KODE OTOMATIS
        $lastBarang = \App\Models\Barang::orderBy('id', 'desc')->first();

        if (!$lastBarang) {
            $kodeOtomatis = 'BRG-001';
        } else {
            // Mengambil angka dari kode terakhir, misal 'BRG-001' -> ambil 001
            $noUrut = (int) substr($lastBarang->kode_barang, 4);
            $noUrut++;
            $kodeOtomatis = 'BRG-' . str_pad($noUrut, 3, "0", STR_PAD_LEFT);
        }

        // 2. AMBIL DATA UNTUK DROPDOWN (Agar tidak error undefined variable)
        $kategori = \App\Models\Kategori::all(); 
        $lokasi = \App\Models\Lokasi::all(); // Pastikan Anda punya model Lokasi

        // 3. KIRIM SEMUA VARIABEL KE VIEW
        return view('barang.create', compact('kodeOtomatis', 'kategori', 'lokasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barang',
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'lokasi_id'   => 'required',
            'kondisi'     => 'required',
            'jumlah'      => 'required|numeric',
            'satuan'      => 'required',
            'tanggal_beli'=> 'required|date',
            'harga'       => 'required|numeric',
            'foto'        => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('uploads/barang', 'public');
        }

        Barang::create($data);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();
        $lokasis = Lokasi::all();
        return view('barang.edit', compact('barang', 'kategoris', 'lokasis'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        
        $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required|unique:barang,kode_barang,'.$id,
            'kategori_id' => 'required',
            'lokasi_id'   => 'required',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui');
    }

    public function destroy($id) {
        Barang::destroy($id);
        return redirect()->route('barang.index')->with('success', 'Data dihapus!');
    }

}
