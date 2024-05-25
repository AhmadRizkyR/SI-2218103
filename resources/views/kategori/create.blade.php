
<!-- MODAL CREATE -->
<div class="modal fade" id="createKategori" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body g-2">
                <form action="{{ route('kategori.store') }}" method="POST" id="formCreate">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Kategori" name="nama" id="nama" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="keterangan">Keterangan</label>
                        <input type="keterangan" class="form-control" placeholder="Masukkan Keterangan" name="keterangan" id="keterangan">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('formCreate').submit()">Simpan</button>
            </div>
        </div>
    </div>
</div>