<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::paginate(20);

        return view('supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:supplier',
            'telp' => 'required|unique:supplier',
        ],[
            'nama' => [
                'required' => 'Harap isi nama supplier'
            ],
            'email' => [
                'required' => 'Harap isi email supplier',
                'unique' => 'Email sudah digunakan oleh pengguna lain'
            ],
            'telp' => [
                'required' => 'Harap isi no. telepon supplier',
                'unique' => 'No.Telp sudah digunakan oleh pengguna lain'
            ]
        ]);

        $data = $request->except(['_token']);
        $data['kode_supplier'] = 'SPY-'.date('ymdhis');

        Supplier::create($data);

        toast('Data berhasil disimpan.', 'success');
        return redirect()->route('supplier.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'nama' => 'required',
            'email' => ['required', Rule::unique('supplier')->ignore($supplier->id)]
        ],[
            'nama' => [
                'required' => 'Harap isi nama supplier'
            ],
            'email' => [
                'required' => 'Harap isi email supplier',
                'unique' => 'Email sudah digunakan oleh pengguna lain'
            ]
        ]);

        $data = $request->except(['_token', '_method']);

        $supplier->update($data);

        toast('Data berhasil disimpan.', 'success');
        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        toast('Data berhasil dihapus', 'success');
        return redirect()->route('supplier.index');
    }
}
