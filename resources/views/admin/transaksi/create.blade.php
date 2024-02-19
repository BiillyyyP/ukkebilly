<div class="row p-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="">Kode Produk</label>
                    </div>
                    <div class="col-md-8">
                        <form method="GET">
                            <div class="d-flex">
                                <select name="produk_id" class="form-control" id="">
                                    <option value="">{{ isset($p_detail) ? $p_detail->name : 'Nama Produk' }}</option>
                                    @foreach ($produk as $item)
                                    <option value="{{ $item->id }}">{{ $item->id.'-'.$item->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary">Pilih</button>
                            </div>
                        </form>
                    </div>
                </div>

                <form action="/admin/transaksi/detail/create" method="POST">
                @csrf
                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="">Nama Produk</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" value="{{ isset($p_detail) ? $p_detail->name : '' }}" class="form-control" disabled name="nama_produk">
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="">Harga Satuan</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" value="{{ isset($p_detail) ? $p_detail->harga : '' }}" class="form-control" disabled name="harga_satuan">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="">QTY</label>
                    </div>
                        <div class="col-md-8">
                            <div class="d-flex">
                                <a href="?produk_id={{request('produk_id') }}&act=min&qty={{$qty}}" class="btn btn-primary"><i class="fas fa-minus"></i></a>
                                <input type="number" value="{{ $qty }}" id="qty" class="form-control" name="qty">
                                <a href="?produk_id={{request('produk_id') }}&act=plus&qty={{$qty}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            </div> 
                        </div>
                    </div>

                    <div class="row mt-1">
                    <div class="col-md-4">
                        <label for=""></label>
                    </div>
                        <div class="col-md-8">
                            <h5>Subtotal : Rp.{{ $subtotal }}</h5> 
                        </div>
                    </div>

                    <div class="row mt-1">
                    <div class="col-md-4">
                        <label for=""></label>
                    </div>
                        <div class="col-md-8">
                            <a href="/admin/transaksi" class="btn btn-info"><i class="fas fa-arrow-left"></i>Kembali</a>
                            <button type="submit" class="btn btn-primary">Tambah<i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>QTY</th>
                        <th>#</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>OPPO</td>
                        <td>5</td>
                        <td>
                            <a href=""><i class="fas fa-times"></i></a>
                        </td>
                    </tr>
                </table>
                <a href="" class="btn btn-success"><i class="fas fa-file "></i> Selesai </a>
            </div>
        </div>
    </div>
</div>

<div class="row p-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label for="">Total Belanja</label>
                    <input type="number" name="total_belanja" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Dibayarkan</label>
                    <input type="number" name="dibayarkan" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Hitung </button>

                <div class="form-group">
                    <label for="">Uang Kembalian</label>
                    <input type="number" disabled name="kembalian" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>