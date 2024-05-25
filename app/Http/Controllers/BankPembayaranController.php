<?php

namespace App\Http\Controllers;

use App\Models\BankPembayaran;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BankPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bank_pembayaran = BankPembayaran::paginate(20);

        return view('bank-pembayaran.index', compact('bank_pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bank-pembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'atas_nama' => 'required',
            'no_rekening' => 'required|unique:bank_pembayaran',
        ],[
            'nama' => [
                'required' => 'Harap isi nama bank'
            ],
            'atas_nama' => [
                'required' => 'Harap isi Atas Nama',
            ],
            'no_rekening' => [
                'required' => 'Harap isi no. rekening bank',
            ]
        ]);

        $data = $request->except(['_token']);

        BankPembayaran::create($data);

        toast('Data berhasil disimpan.', 'success');
        return redirect()->route('bank-pembayaran.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(BankPembayaran $bank_pembayaran)
    {
        return view('bank-pembayaran.detail', compact('bank-pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankPembayaran $bank_pembayaran)
    {
        return view('bank-pembayaran.edit', compact('bank_pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BankPembayaran $bank_pembayaran)
    {
        $request->validate([
            'nama' => 'required',
            'atas_nama' => 'required',
            'no_rekening' => ['required', Rule::unique('bank_pembayaran')->ignore($bank_pembayaran->id)],
        ],[
            'nama' => [
                'required' => 'Harap isi nama bank'
            ],
            'atas_nama' => [
                'required' => 'Harap isi Atas Nama',
            ],
            'no_rekening' => [
                'required' => 'Harap isi no. rekening bank',
            ]
        ]);

        $data = $request->except(['_token', '_method']);

        $bank_pembayaran->update($data);

        toast('Data berhasil disimpan.', 'success');
        return redirect()->route('bank-pembayaran.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankPembayaran $bank_pembayaran)
    {
        $bank_pembayaran->delete();

        toast('Data berhasil dihapus', 'success');
        return redirect()->route('bank-pembayaran.index');
    }
}
