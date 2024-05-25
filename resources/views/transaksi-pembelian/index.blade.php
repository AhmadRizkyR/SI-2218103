@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-3">
        <div class="card-body pb-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a class="text-primary" href="{{ route('transaksi-pembelian.index') }}">Transaksi Pembelian</a>
                    </li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row g-2">
                <div class="col-12 col-md-4">
                    <a href="{{ route('transaksi-pembelian.create') }}" class="btn btn-success">Tambah Data</a>
                    <a href="{{ route('transaksi-pembelian.export-pdf') }}" class="btn btn-danger">Export PDF</a>
                </div>
                <div class="col-12 col-md-4">
                </div>
                <div class="col-12 col-md-4">
                    {{-- <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap ">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Transaksi Pembelian</th>
                            <th>Supplier</th>
                            <th>Outlet</th>
                            <!-- <th>User Input</th> -->
                            <th>Total Nominal</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($transaksiPembelian) < 1)
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data.</td>
                        </tr>
                        @else
                        @foreach($transaksiPembelian as $x => $data)
                        <tr>
                            <td>{{ $x+1 }}</td>
                            <td>{{ $data->kode_transaksi_pembelian }}</td>
                            <td>{{ $data->supplier->nama }}</td>
                            <td>{{ $data->outlet->nama }}</td>
                            <!-- <td>{{ $data->user->name }}</td> -->
                            <td>Rp. {{ number_format($data->total_nominal, 0, ',', '.') }}</td>
                            <td><span class="badge bg-label-{{ $data->status == 'Success' ? 'success':'warning' }}">{{ $data->status }}</span></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('transaksi-pembelian.show', $data->id) }}" class="btn btn-info btn-sm"><i class="tf-icons bx bxs-show"></i></a>
                                    @if($data->status == 'Draft')
                                    <a href="{{ route('transaksi-pembelian.edit', $data->id) }}" class="btn btn-primary btn-sm"><i class="tf-icons bx bxs-edit"></i></a>
                                    @endif
                                    @if($data->status == 'Proccess')
                                    <a href="{{ route('transaksi-pembelian.approval', $data->id) }}" class="btn btn-warning btn-sm"><i class="bx bx-check-circle"></i></a>
                                    @endif
                                    <form action="{{ route('transaksi-pembelian.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-delete" onclick="return onDelete()"><i class="tf-icons bx bxs-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection