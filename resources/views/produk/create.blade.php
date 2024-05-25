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
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="{{ route('produk.store') }}" method="POST" id="formCreate">
                @csrf
                <div class="form-group mb-3">
                    <label for="kode_produk">Kode Produk</label>
                    <input type="text" class="form-control" placeholder="Masukkan Kode Produk" value="{{ old('kode_produk') }}" name="kode_produk" id="kode_produk" required>
                </div>
                <div class="form-group mb-3">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama" value="{{ old('nama') }}" name="nama" id="name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="kategori">Kategori</label>
                    <select name="kategori_id" id="kategori" class="form-control select2" data-placeholder="Pilih Kategori">
                        <option value=""></option>
                        @foreach($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="satuan">Satuan</label>
                    <select name="satuan_id" id="satuan" class="form-control select2" data-placeholder="Pilih Satuan">
                        <option value=""></option>
                        @foreach($satuan as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="principal">Principal</label>
                    <input type="text" class="form-control" placeholder="Masukkan Principal" value="{{ old('principal') }}" name="principal" id="principal" required>
                </div>
                <div class="form-group mb-3">
                    <label for="harga_beli">Harga Beli</label>
                    <input type="number" class="form-control" placeholder="Masukkan Harga Beli" name="harga_beli" id="harga_beli" required>
                </div>
                <div class="form-group mb-3">
                    <label for="harga_jual">Harga Jual</label>
                    <input type="number" class="form-control" placeholder="Masukkan Harga Jual" name="harga_jual" id="harga_jual" required>
                </div>
                <div class="form-group float-end">
                    <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection