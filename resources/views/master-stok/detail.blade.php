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
                        <a class="text-primary" href="{{ route('produk.index') }}">Produk</a>
                    </li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-4">
                    <b>Kode Produk</b>
                    <p>{{ $produk->kode_produk }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>Nama</b>
                    <p>{{ $produk->nama }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>Kategori</b>
                    <p>{{ $produk->kategori->nama }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>Satuan</b>
                    <p>{{ $produk->satuan->nama }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>Principal</b>
                    <p>{{ $produk->principal }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>Harga Beli</b>
                    <p>Rp. {{ number_format($produk->harga_beli, 0, ',', '.') }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>Harga Jual</b>
                    <p>Rp. {{ number_format($produk->harga_jual, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection