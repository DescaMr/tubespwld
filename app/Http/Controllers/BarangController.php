<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('jenisBarang')->get();

        $data = [];
        foreach ($barangs as $barang) {
            $data[] = [
                'id' =>  $barang->id,
                'kode_barang' => $barang->kode_barang,
                'nama_barang' => $barang->nama_barang,
                'jenis' => $barang->jenisBarang->nama,
                'harga' => $barang->harga,
                'cover' => $barang->cover,
            ];
        }

        return view('barang.index', compact('data'));
    }
    public function create()
    {
        $JenisBarangs = JenisBarang::all();
        return view('barang.create', compact('JenisBarangs'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
        'kode_barang' => 'required|max:2555',
        'nama_barang' => 'required|max:255',
        'jenis_barang_id' => 'required|max:150',
        'harga' => 'required|numeric',
   
        'cover' => 'nullable|image',
        ]);
        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->storeAs(
            'public/cover_barang',
            'cover_barang_'.time() . '.' . $request->file('cover')->extension()
            );
            $validated['cover'] = basename($path);
        }

        Barang::create($validated);
        $notification = array(
            'message' => 'Data buku berhasil ditambahkan',
            'alert-type' => 'success'
        );
        if($request->save == true) {
            return redirect()->route('barang')->with($notification);
        } else {
        return redirect()->route('barang.create')->with($notification);
        }
    }
   
}
