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
                        <a class="text-primary" href="{{ route('bank-pembayaran.index') }}">Bank Pembayaran</a>
                    </li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="{{ route('bank-pembayaran.store') }}" method="POST" id="formCreate">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Nama Bank</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama Bank" value="{{ old('nama') }}" name="nama" id="name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="atas_nama">Atas Nama</label>
                    <input type="text" class="form-control" placeholder="Masukkan Atas Nama" value="{{ old('atas_nama') }}" name="atas_nama" id="atas_nama" required>
                </div>
                <div class="form-group mb-3">
                    <label for="no_rekening">No. Rekening</label>
                    <input type="number" name="no_rekening" class="form-control" placeholder="Masukkan Nomor Rekening" value="{{ old('no_rekening') }}" required>
                </div>
                <div class="form-group float-end">
                    <a href="{{ route('bank-pembayaran.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection