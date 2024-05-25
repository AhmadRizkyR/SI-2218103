@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-3">
        <div class="card-body pb-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a class="text-primary" href="{{ route('kategori.index') }}">Kategori</a>
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
                    {{-- <a href="{{ route('kategori.create') }}" class="btn btn-success">Tambah Data</a> --}}
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createKategori">Tambah Data</button>
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
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($kategori as $x => $data)
                        <tr>
                            <td>{{ $x+1 }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->keterangan }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button type="button" data-action="{{ route('kategori.update', $data->id) }}" data-content='{{ $data }}' class="btn btn-primary btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#modalKategori"><i class="tf-icons bx bxs-edit"></i></button>
                                    <form action="{{ route('kategori.destroy', $data->id) }}" method="POST">
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
@include('kategori.create')
@include('kategori.edit')
@endsection
@push('script')
<script>
    $(".btn-edit").click(function(){
        const data = JSON.parse(this.getAttribute('data-content'));
        $("#formEdit").attr('action', this.getAttribute('data-action'));
        $("#formEdit #nama").val(data.nama);
        $("#formEdit #keterangan").val(data.keterangan);
        
    });
</script>
@endpush