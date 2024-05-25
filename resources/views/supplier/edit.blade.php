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
                        <a class="text-primary" href="{{ route('supplier.index') }}">Supplier</a>
                    </li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="{{ route('supplier.update', $supplier->id) }}" method="POST" id="formCreate">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama" value="{{ $supplier->nama }}" name="nama" id="name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" placeholder="Masukkan Email" value="{{ $supplier->email }}" name="email" id="email" required>
                </div>
                <div class="form-group mb-3">
                    <label for="telp">Telp</label>
                    <input type="number" class="form-control" placeholder="Masukkan Telp" value="{{ $supplier->telp }}" name="telp" id="telp" required>
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control">{{ $supplier->alamat }}</textarea>
                </div>
                <div class="form-group float-end">
                    <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection