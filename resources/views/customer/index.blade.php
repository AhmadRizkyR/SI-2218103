@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-3">
        <div class="card-body pb-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a class="text-primary" href="{{ route('customer.index') }}">Customer</a>
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
                    <a href="{{ route('customer.create') }}" class="btn btn-success">Tambah Data</a>
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
                            <th>Nama</th>
                            <th>Telp</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customer as $x => $data)
                        <tr>
                            <td>{{ $x+1 }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->telp }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('customer.edit', $data->id) }}" class="btn btn-primary btn-sm"><i class="tf-icons bx bxs-edit"></i></a>
                                    <form action="{{ route('customer.destroy', $data->id) }}" method="POST">
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
        </div>
    </div>
</div>
@endsection