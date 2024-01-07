<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

    class BarangKeluarController extends Controller
{
    public function index()
    {
        $data ['barang_keluar'] = BarangKeluar::all();
        return view('BarangKeluar.index', $data);
    }

    public function create()
    {
        $data ['barang_keluar'] = BarangKeluar::all();
        return view('BarangKeluar.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'kode_barang_keluar' => 'required|max:255',
        'jumlah_keluar' => 'required|max:150',
        'tgl_keluar' => 'required|date',
        'tujuan' => 'required|max:150',

        ]);
     

        BarangKeluar::create($validated);
        $notification = array(
            'message' => 'Data Barang berhasil ditambahkan',
            'alert-type' => 'success'
        );
        if($request->save == true) {
            return redirect()->route('BarangKeluar')->with($notification);
        } else {
        return redirect()->route('BarangKeluar.create')->with($notification);
        } 

    }
        public function edit($id)
        {
            $barangkeluar = BarangKeluar::findOrFail($id);
            $barangs = Barang::all();
    
            return view('BarangKeluar.edit', compact('barangkeluar', 'barangs'));
        }
    
        public function update(Request $request, $id)
        {
            $validatedData = $request->validate([
                'jumlah_keluar' => 'required|integer',
                'tujuan' => 'required',
                'tgl_keluar' => 'required|date',
                // Tambahkan aturan validasi lain jika diperlukan
            ]);
    
            $barangKeluar = BarangKeluar::findOrFail($id);
            $barangKeluar->jumlah_keluar = $request->jumlah_keluar;
            $barangKeluar->tujuan = $request->tujuan;
            $barangKeluar->tgl_keluar = $request->tgl_keluar;
            // Update atribut lain jika diperlukan
    
            $barangKeluar->save();
    
            return redirect()->route('BarangKeluar')->with('success', 'Data barang keluar berhasil diperbarui');
        }
    

    public function destroy($id)
    {
        $barangkeluar = BarangKeluar::findOrFail($id);
        $barangkeluar->delete();

        $notification = array(
            'message' => 'Data barang masuk berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('BarangKeluar')->with($notification);
    }
}
