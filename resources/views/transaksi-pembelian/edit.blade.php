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
                        <a class="text-primary" href="{{ route('transaksi-pembelian.index') }}">Transaksi Pembelian</a>
                    </li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success" id="btnAddProduk" data-bs-toggle="modal" data-bs-target="#modalProduk">Tambah Produk</button>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('transaksi-pembelian.update', $transaksiPembelian->id) }}" method="POST" id="formCreate">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-12 col-md-4">
                        <label for="supplier">Supplier</label>
                        <select name="supplier_id" id="supplier" class="form-control select2" data-placeholder="Pilih Supplier" required>
                            <option value=""></option>
                            @foreach($supplier as $data)
                            <option value="{{ $data->id }}" {{ $transaksiPembelian->supplier_id == $data->id ? 'selected':'' }}>{{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="outlet">Outlet</label>
                        <select name="outlet_id" id="outlet" class="form-control select2" data-placeholder="Pilih Outlet" required>
                            <option value=""></option>
                            @foreach($outlet as $data)
                            <option value="{{ $data->id }}" {{ $transaksiPembelian->outlet_id == $data->id ? 'selected':'' }}>{{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-select select2" data-placeholder="Pilih Status" required>
                            <option value="" selected disabled hidden></option>
                            <option value="Draft" {{ $transaksiPembelian->status == 'Draft' ? 'selected':'' }}>Draft</option>
                            <option value="Proccess" {{ $transaksiPembelian->status == 'Proccess' ? 'selected':'' }}>Proccess</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive mb-3">
                    <table class="table table-bordered" id="listProduk">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Satuan</th>
                                <th>Harga Beli</th>
                                <th>Jumlah</th>
                                <th>Total Nominal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksiPembelian->detail_transaksi_pembelian as $item)
                                <tr data-id='{{ $item->produk_id  }}'>
                                    <td>
                                        <button type='button' class='btn btn-danger btn-sm btn-remove'><i class='bx bx-minus'></i></button>
                                    </td>
                                    <td>
                                        <input type='hidden' name='produk_id[]' value='{{ $item->produk_id }}'>
                                        {{ $item->produk->kode_produk }}
                                    </td>
                                    <td>
                                        {{ $item->produk->nama }}
                                    </td>
                                    <td>
                                        <input type='hidden' name='satuan_id[]' value='{{ $item->satuan_id }}'>
                                        {{ $item->satuan->nama }}
                                    </td>
                                    <td>
                                        <input type='text' class='form-control count-total input-harga' name='harga[]' value='{{ number_format($item->harga, 0, ",", ".") }}' required>
                                    </td>
                                    <td>
                                        <input type='text' class='form-control count-total input-jumlah' name='jumlah[]' value='{{ number_format($item->qty, 0, ",", ".") }}' min='1' required>
                                    </td>
                                    <td>
                                        <input type='text' class='form-control count-total input-nominal' name='total_nominal[]' value='{{ number_format($item->total_nominal, 0, ",", ".") }}' required readonly>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end mb-4">
                    <div class="col-12 col-md-4 row">
                        <div class="col-sm-4 align-content-center text-end">
                            <label for="total">Total Rp.</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="total" name="total" value="{{ number_format($transaksiPembelian->total_nominal, 0, ',', '.') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group float-end">
                    <a href="{{ route('transaksi-pembelian.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- MODAL SEARCH PRODUK -->
<div class="modal fade" id="modalProduk" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body g-2">
                <div class="mb-4">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" id="search" placeholder="Cari Produk">
                        <button type="button" class="btn btn-primary" id="btnCari">Cari</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="listCariProduk">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Satuan</th>
                                <th>Harga Beli</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>

    $(function() {

        btnFunction();

        function handleSuccess(res){
            if(res.status === "success"){
                res = res.data;
                let row;

                res.forEach((data, i) => {
                    const dataProduk = {id, kode_produk, nama, satuan, harga_beli} = data;

                    row += `
                        <tr>
                            <td>${i+1}</td>
                            <td>${kode_produk} - ${nama}</td>
                            <td>${satuan.nama}</td>
                            <td>${harga_beli}</td>
                            <td><button type='button' class="btn btn-success btn-sm btn-add-produk" data-content='${JSON.stringify(dataProduk)}'><i class="bx bx-plus"></i></td>
                        </tr>
                    `;
                });

                $("#listCariProduk > tbody").html(row);
                btnFunction();
            }
        }

        function handleError(err){
            alert('Terjadi kesalahan');
            console.log(err);
        }
        
        function cari_produk(keyword) {
            $.get(`{{ route("transaksi-pembelian.cari-produk") }}?keyword=${keyword}`).then(res => handleSuccess(res)).catch(err => handleError(err));
        }

        function rearrange(){
            $('#listProduk > tbody tr').each((i, e) => e.children('first'));
        }

        function countTotalNominal(){
            
            let total = 0;
            $('.input-nominal').each(function(i, e){
                total += Number(e.value.split('.').join(''));
            });

            $("#total").val(formatRupiah(String(total)));
        }

        function countTotal(e){
            const el = $(e).closest('tr');
            const harga = Number(el.find('.input-harga').val().split('.').join(''));
            const qty = Number(el.find('.input-jumlah').val().split('.').join(''));
            let subtotal = harga * qty;
            el.find('.input-nominal').val(formatRupiah(String(subtotal)));
            
            countTotalNominal();
        }

        function btnFunction(){
            $(".btn-add-produk").unbind('click').bind('click', function(){
                const data = JSON.parse(this.getAttribute('data-content'));
                let row = `
                        <tr data-id='${data.id}'>
                            <td>
                                <button type='button' class='btn btn-danger btn-sm btn-remove'><i class='bx bx-minus'></i></button>
                            </td>
                            <td>
                                <input type='hidden' name='produk_id[]' value='${data.id}'>
                                ${data.kode_produk}
                            </td>
                            <td>
                                ${data.nama}
                            </td>
                            <td>
                                <input type='hidden' name='satuan_id[]' value='${data.satuan.id}'>
                                ${data.satuan.nama}
                            </td>
                            <td>
                                <input type='text' class='form-control count-total input-harga' name='harga[]' value='${formatRupiah(String(data.harga_beli))}' required>
                            </td>
                            <td>
                                <input type='text' class='form-control count-total input-jumlah' name='jumlah[]' value='1' min='1' required>
                            </td>
                            <td>
                                <input type='text' class='form-control count-total input-nominal' name='total_nominal[]' value='${formatRupiah(String(data.harga_beli * 1))}' required readonly>
                            </td>
                        </tr>
                `;

                $("#listProduk > tbody:last-child").append(row);
                btnFunction();
                countTotalNominal();
            });

            $(".btn-remove").click(function(){
                $(this).closest('tr').remove();
                countTotalNominal();
            })

            $(".count-total").unbind('input').bind('input', function(){
                this.value = formatRupiah(this.value);
                countTotal(this);
            });

            $('.count-total').focus(function(){
                this.select();
            });
        }

        $("#btnCari").click(function(){
            const keyword = $("#search").val();
            cari_produk(keyword)
        });
    });
</script>
@endpush