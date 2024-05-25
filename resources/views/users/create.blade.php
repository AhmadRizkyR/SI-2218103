@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-3">
        <div class="card-body pb-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a class="text-primary" href="{{ route('users.index') }}">Users</a>
                    </li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST" id="formCreate">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama" name="name" id="name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" placeholder="Masukkan Email" name="email" id="email" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Masukkan Password" name="password" id="password" required>
                </div>
                <div class="form-group float-end">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<!-- <div class="offcanvas offcanvas-end" tabindex="-1" id="canvasCreate" aria-labelledby="offcanvasEndLabel" aria-modal="true" role="dialog">
    <div class="offcanvas-header">
        <h5 id="offcanvasEndLabel" class="offcanvas-title">Tambah Data</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
        <form action="{{ route('users.store') }}" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Masukkan Nama" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Masukkan Email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Masukkan Password" name="password" id="password" required>
            </div>
            <div class="form-group">

            </div>
        </form>
    </div>
    <div class="offcanvas-footer my-auto mx-0 flex-grow-0 p-2">
        <button type="button" class="btn btn-primary mb-2 d-grid w-100">Continue</button>
        <button type="button" class="btn btn-outline-secondary d-grid w-100" data-bs-dismiss="offcanvas">Cancel</button>
    </div>
</div>

<div class="modal fade" id="modalCreate" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body g-2">
                <form action="{{ route('users.store') }}" method="POST" id="formCreate">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="name" id="name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Masukkan Email" name="email" id="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Masukkan Password" name="password" id="password" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('formCreate').submit()">Simpan</button>
            </div>
        </div>
    </div>
</div> -->