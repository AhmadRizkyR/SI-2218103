<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\MasterStok;
use App\Models\Outlet;
use App\Models\Produk;
use App\Models\Satuan;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::paginate(20);

        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        $satuan = Satuan::all();

        return view('produk.create', compact('kategori', 'satuan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $produk = Produk::create($data);

        $outlet = Outlet::all();

        foreach($outlet as $data){
            MasterStok::create([
                'produk_id' => $produk->id,
                'outlet_id' => $data->id,
                'stok' => 0
            ]);
        }

        toast('Data berhasil disimpan', 'success');
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        return view('produk.detail', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $kategori = Kategori::all();
        $satuan = Satuan::all();

        return view('produk.edit', compact('produk', 'kategori', 'satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $data = $request->except(['_token', '_method']);

        $produk->update($data);

        toast('Data berhasil disimpan', 'success');
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        toast('Data berhasil dihapus.', 'success');
        return redirect()->route('produk.index');
    }
}
