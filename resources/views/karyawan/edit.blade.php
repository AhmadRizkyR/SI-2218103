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
                        <a class="text-primary" href="{{ route('karyawan.index') }}">Karyawan</a>
                    </li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" id="formCreate">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama" value="{{ $karyawan->nama }}" name="nama" id="name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" placeholder="Masukkan Email" value="{{ $karyawan->email }}" name="email" id="email" required>
                </div>
                <div class="form-group mb-3">
                    <label for="telp">Telp</label>
                    <input type="number" class="form-control" placeholder="Masukkan Telp" value="{{ $karyawan->telp }}" name="telp" id="telp" required>
                </div>
                <div class="form-group mb-3">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" placeholder="Masukkan Jabatan" value="{{ $karyawan->jabatan }}" name="jabatan" id="jabatan" required>
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control">{{ $karyawan->alamat }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="penempatan">Penempatan</label>
                    <select name="penempatan" id="penempatan" class="form-control select2" data-placeholder="Pilih Penempatan">
                        <option></option>
                        @foreach($outlet as $data)
                        <option value="{{ $data->id }}" {{ $karyawan->penempatan == $data->id ? 'selected':'' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="gaji_pokok">Gaji Pokok</label>
                    <input type="number" class="form-control" name="gaji_pokok" id="gaji_pokok" value="{{ $karyawan->gaji_pokok }}">
                </div>
                <div class="form-group float-end">
                    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection