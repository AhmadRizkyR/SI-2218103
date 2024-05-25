
<!-- MODAL EDIT -->
<div class="modal fade" id="modalKategori" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body g-2">
                <form id="formEdit" method="POST">
                    @csrf
                    @method('PUT')
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
                <button type="button" class="btn btn-primary" onclick="document.getElementById('formEdit').submit()">Simpan</button>
            </div>
        </div>
    </div>
</div>