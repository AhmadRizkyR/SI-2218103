@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card mb-3">
        <div class="card-body pb-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a class="text-primary" href="{{ route('transaksi-pembelian.index') }}">Transaksi Pembelian</a>
                    </li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header"></div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-4">
                    <b>Kode Transaksi Pembelian</b>
                    <p>{{ $transaksiPembelian->kode_transaksi_pembelian }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>Supplier</b>
                    <p>{{ $transaksiPembelian->supplier->nama }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>Total Nominal</b>
                    <p>Rp. {{ number_format($transaksiPembelian->total_nominal, 0, ',', '.') }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>User Input</b>
                    <p>{{ $transaksiPembelian->user->name }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>User Approval</b>
                    <p>{{ $transaksiPembelian->approval->name }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>Outlet</b>
                    <p>{{ $transaksiPembelian->outlet->nama }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>Status</b>
                    <p><span class="badge bg-label-{{ $transaksiPembelian->status == 'Success' ? 'success':'warning' }}">{{ $transaksiPembelian->status }}</span></p>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Satuan</th>
                            <th>Harga Beli</th>
                            <th>Jumlah Dikirim</th>
                            <th>Jumlah Diterima</th>
                            <th>Total Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksiPembelian->detail_transaksi_pembelian as $x => $item)
                        <tr>
                            <td>{{ $x+1 }}</td>
                            <td>{{ $item->produk->kode_produk }}</td>
                            <td>{{ $item->produk->nama }}</td>
                            <td>{{ $item->satuan->nama }}</td>
                            <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>{{ number_format($item->qty, 0, ',', '.') }}</td>
                            <td>{{ number_format($item->qty_acc, 0, ',', '.') }}</td>
                            <td>{{ number_format($item->total_nominal, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('transaksi-pembelian.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection