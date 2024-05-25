<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satuan = Satuan::paginate(20);
        return view('satuan.index', compact('satuan'));
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
        Satuan::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ]);

        toast('Data berhasil disimpan.', 'success');
        return redirect()->route('satuan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Satuan $satuan)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Satuan $satuan)
    {
        $satuan->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ]);

        toast('Data berhasil disimpan.', 'success');
        return redirect()->route('satuan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satuan $satuan)
    {
        $satuan->delete();

        toast('Data berhasil dihapus.', 'success');
        return redirect()->route('satuan.index');
    }
}
