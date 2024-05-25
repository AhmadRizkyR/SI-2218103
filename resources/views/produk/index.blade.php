@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-3">
        <div class="card-body pb-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a class="text-primary" href="{{ route('produk.index') }}">Produk</a>
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
                    <a href="{{ route('produk.create') }}" class="btn btn-success">Tambah Data</a>
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
            <div class="table-responsive text-nowrap mb-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Produk</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Satuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produk as $x => $data)
                        <tr>
                            <td>{{ $x+1 }}</td>
                            <td>{{ $data->kode_produk }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->kategori->nama }}</td>
                            <td>{{ $data->satuan->nama }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('produk.show', $data->id) }}" class="btn btn-info btn-sm"><i class="tf-icons bx bxs-show"></i></a>
                                    <a href="{{ route('produk.edit', $data->id) }}" class="btn btn-primary btn-sm"><i class="tf-icons bx bxs-edit"></i></a>
                                    <form action="{{ route('produk.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-delete" onclick="return onDelete()"><i class="tf-icons bx bxs-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $produk->links() }}
        </div>
    </div>
</div>
@endsection