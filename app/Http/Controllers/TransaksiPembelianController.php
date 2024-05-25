<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksiPembelian;
use App\Models\MasterStok;
use App\Models\Outlet;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\TransaksiPembelian;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksiPembelian = TransaksiPembelian::paginate(20);

        return view('transaksi-pembelian.index', compact('transaksiPembelian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supplier = Supplier::all();
        $outlet = Outlet::all();

        return view('transaksi-pembelian.create', compact('supplier', 'outlet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kode_trx = 'TP-'.date('ymdhis');

        $transaksiPembelian = TransaksiPembelian::create([
            'kode_transaksi_pembelian' => $kode_trx,
            'user_input' => Auth::id(),
            'supplier_id' => $request->supplier_id,
            'outlet_id' => $request->outlet_id,
            'total_nominal' => $request->total,
            'status' => $request->status
        ]);

        foreach($request->produk_id as $x => $pid){
            DetailTransaksiPembelian::create([
                'transaksi_pembelian_id' => $transaksiPembelian->id,
                'produk_id' => $pid,
                'satuan_id' => $request->satuan_id[$x],
                'qty' => str_replace('.', '', $request->jumlah[$x]),
                'harga' => str_replace('.', '', $request->harga[$x]),
                'total_nominal' => str_replace('.', '', $request->total_nominal[$x]),
            ]);
        }

        $transaksiPembelian->update([
            'total_nominal' => DetailTransaksiPembelian::where('transaksi_pembelian_id', $transaksiPembelian->id)->sum('total_nominal')
        ]);

        toast('Data berhasil disimpan.', 'success');
        return redirect()->route('transaksi-pembelian.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TransaksiPembelian $transaksiPembelian)
    {
        return view('transaksi-pembelian.detail', compact('transaksiPembelian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiPembelian $transaksiPembelian)
    {
        $supplier = Supplier::all();
        $outlet = Outlet::all();

        return view('transaksi-pembelian.edit', compact('transaksiPembelian', 'supplier', 'outlet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransaksiPembelian $transaksiPembelian)
    {

        $transaksiPembelian->update([
            'supplier_id' => $request->supplier_id,
            'outlet_id' => $request->outlet_id,
            'total_nominal' => $request->total,
            'status' => $request->status
        ]);

        DetailTransaksiPembelian::where('transaksi_pembelian_id', $transaksiPembelian->id)->delete();

        foreach($request->produk_id as $x => $pid){
            DetailTransaksiPembelian::create([
                'transaksi_pembelian_id' => $transaksiPembelian->id,
                'produk_id' => $pid,
                'satuan_id' => $request->satuan_id[$x],
                'qty' => str_replace('.', '', $request->jumlah[$x]),
                'harga' => str_replace('.', '', $request->harga[$x]),
                'total_nominal' => str_replace('.', '', $request->total_nominal[$x]),
            ]);
        }

        $transaksiPembelian->update([
            'total_nominal' => DetailTransaksiPembelian::where('transaksi_pembelian_id', $transaksiPembelian->id)->sum('total_nominal')
        ]);

        toast('Data berhasil disimpan.', 'success');
        return redirect()->route('transaksi-pembelian.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiPembelian $transaksiPembelian)
    {
        $transaksiPembelian->detail_transaksi_pembelian()->delete();
        $transaksiPembelian->delete();
        
        
        toast('Data berhasil dihapus.', 'success');
        return redirect()->route('transaksi-pembelian.index');
    }

    public function approval(TransaksiPembelian $transaksiPembelian)
    {

        return view('transaksi-pembelian.approval', compact('transaksiPembelian'));
    }

    public function approve(TransaksiPembelian $transaksiPembelian, Request $request)
    {
        $transaksiPembelian->update([
            'user_approval' => Auth::id(),
            'total_nominal' => $request->total,
            'status' => 'Success'
        ]);

        foreach($request->dtp_id as $x => $id){
            $dtp = DetailTransaksiPembelian::find($id);
            $dtp->update([
                'qty_acc' => str_replace('.', '', $request->qty_acc[$x]),
                'harga' => str_replace('.', '', $request->harga[$x]),
                'total_nominal' => str_replace('.', '', $request->total_nominal[$x]),
            ]);
            
            MasterStok::updateOrCreate([
                'outlet_id' => $transaksiPembelian->outlet_id,
                'produk_id' => $dtp->produk_id
            ],[
                'stok' => DB::raw('stok + '.$request->qty_acc[$x])
            ]);
        }

        $transaksiPembelian->update([
            'total_nominal' => DetailTransaksiPembelian::where('transaksi_pembelian_id', $transaksiPembelian->id)->sum('total_nominal')
        ]);

        toast('Data berhasil disimpan.', 'success');
        return redirect()->route('transaksi-pembelian.index');
    }

    public function export_pdf(){
        $data = [
            'data' => TransaksiPembelian::all(),
        ];

        $pdf = PDF::loadView('transaksi-pembelian.report', $data)->setPaper('A4', 'landscape');
        $filename = 'Laporan Transaksi Pembelian - '.date('Ymdhis').'.pdf';

        return $pdf->download($filename);
    }

    public function cari_produk(Request $request){
        $keyword = $request->keyword;

        try{

            $produk = Produk::with('satuan')->where(function($query)use($keyword){

                $query->where('nama', 'like', "%$keyword%");
                
            })->get();

        }catch(Exception $e){
            return response()->json(['msg' => 'Terjadi kesalahan.'.$e->getMessage(), 'status' => 'fail']);
        }

        return response()->json(['data' => $produk, 'msg' => 'Data ditemukan', 'status' => 'success']);
    }
}
