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
                    <b>Kode Karyawan</b>
                    <p>{{ $karyawan->kode_karyawan }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>Nama</b>
                    <p>{{ $karyawan->nama }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>Jabatan</b>
                    <p>{{ $karyawan->jabatan }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>Email</b>
                    <p>{{ $karyawan->email }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>Telp</b>
                    <p>{{ $karyawan->telp }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>Penempatan</b>
                    <p>{{ $karyawan->outlet->nama }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>Alamat</b>
                    <p>{{ $karyawan->alamat }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <b>Gaji Pokok</b>
                    <p>Rp. {{ number_format($karyawan->gaji_pokok, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection