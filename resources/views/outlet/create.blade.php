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
                        <a class="text-primary" href="{{ route('outlet.index') }}">Outlet</a>
                    </li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="{{ route('outlet.store') }}" method="POST" id="formCreate">
                @csrf
                <div class="form-group mb-3">
                    <label for="kode_outlet">Kode Outlet</label>
                    <input type="text" class="form-control" placeholder="Masukkan Kode Outlet" value="{{ old('kode_outlet') }}" name="kode_outlet" id="kode_outlet" required>
                </div>
                <div class="form-group mb-3">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama" value="{{ old('nama') }}" name="nama" id="name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="telp">Telp</label>
                    <input type="number" class="form-control" placeholder="Masukkan Telp" value="{{ old('telp') }}" name="telp" id="telp" required>
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat') }}</textarea>
                </div>
                <div class="form-group float-end">
                    <a href="{{ route('outlet.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection