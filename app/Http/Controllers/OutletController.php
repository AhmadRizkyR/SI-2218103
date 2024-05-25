<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlet = Outlet::paginate(20);

        return view('outlet.index', compact('outlet'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('outlet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_outlet' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required|unique:outlet',
        ],[
            'kode_outlet' => [
                'required' => 'Harap isi kode outlet'
            ],
            'nama' => [
                'required' => 'Harap isi nama outlet'
            ],
            'alamat' => [
                'required' => 'Harap isi alamat outlet',
            ],
            'telp' => [
                'required' => 'Harap isi no. telepon outlet',
                'unique' => 'No.Telp sudah digunakan oleh pengguna lain'
            ]
        ]);

        $data = $request->except(['_token']);

        Outlet::create($data);

        toast('Data berhasil disimpan.', 'success');
        return redirect()->route('outlet.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outlet $outlet)
    {
        return view('outlet.edit', compact('outlet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Outlet $outlet)
    {
        $request->validate([
            'kode_outlet' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => ['required', Rule::unique('outlet')->ignore($outlet->id)],
        ],[
            'kode_outlet' => [
                'required' => 'Harap isi kode outlet'
            ],
            'nama' => [
                'required' => 'Harap isi nama outlet'
            ],
            'alamat' => [
                'required' => 'Harap isi alamat outlet',
            ],
            'telp' => [
                'required' => 'Harap isi no. telepon outlet',
                'unique' => 'No.Telp sudah digunakan oleh outlet lain'
            ]
        ]);

        $data = $request->except(['_token', '_method']);

        $outlet->update($data);

        toast('Data berhasil disimpan.', 'success');
        return redirect()->route('outlet.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outlet $outlet)
    {
        $outlet->delete();

        toast('Data berhasil dihapus', 'success');
        return redirect()->route('outlet.index');
    }
}
