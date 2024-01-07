<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarangMasukExport;


class BarangMasukController extends Controller
{
    public function index()
    {
        $data ['barang_masuk'] = BarangMasuk::all();
        return view('BarangMasuk.index', $data);
    }

    public function create()
    {
        $data ['barangs'] = Barang::all();
        return view('BarangMasuk.create' , $data);
    }

    public function store(Request $request)
    {
        // Validasi input sebelum disimpan
        $validatedData = $request->validate([
            'kode_barang_masuk' => 'required',
            'jumlah_masuk' => 'required|integer',
            'tgl_masuk' => 'required|date', 
        ]);

        // Membuat instance BarangMasuk
        $barangMasuk = new BarangMasuk();
        $barangMasuk->kode_barang_masuk = $request->kode_barang_masuk;
        $barangMasuk->jumlah_masuk = $request->jumlah_masuk;
        $barangMasuk->tgl_masuk = $request->tgl_masuk;
        $barangMasuk->save();


        return redirect()->route('BarangMasuk')->with('success', 'Data barang masuk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barangMasuk = BarangMasuk::find($id);
        $barangs = Barang::all();

        return view('BarangMasuk.edit', compact('barangMasuk', 'barangs'));
    }


public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_barang_masuk' => 'required',
            'jumlah_masuk' => 'required|integer',
        ]);

        $barangMasuk = BarangMasuk::find($id);
        $barangMasuk->kode_barang_masuk = $request->kode_barang_masuk;
        $barangMasuk->jumlah_masuk = $request->jumlah_masuk;
        $barangMasuk->save();

        return redirect()->route('BarangMasuk')->with('success', 'Data barang keluar berhasil diperbarui');
    }


    public function destroy($id)
    {
        $barangmasuk = BarangMasuk::findOrFail($id);
        $barangmasuk->delete();

        $notification = array(
            'message' => 'Data barang masuk berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('BarangMasuk')->with($notification);
    }

    public function print()
    {
        $barang_masuk = BarangMasuk::all();
        $pdf = FacadePdf::loadView('BarangMasuk.print', ['barang_masuk' => $barang_masuk]);
        return $pdf->download('data_barang_masuk.pdf');
    }
    public function export()
    {
        return Excel::download(new BarangMasukExport, 'data masuk.xlsx');
    }
}
