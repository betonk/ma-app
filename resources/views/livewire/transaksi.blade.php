<div>
    <div class="container">
        @if (Session::has('msg'))
            <div class="alert alert-success">
                <p> {{ Session::get('msg') }}</p>
            </div>
        @endif
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <h1 class="fw-bold">Transaksi Item</h1>
                </div>
                <div class="card-item p-2">
                    <table class="table table-responsive table-striped text-center align-self-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Status</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td><img src="" alt="" width="40" height="40" class="img-fluid rounded-circle"></td>
                                <td>Eva - 01</td>
                                <td><p class="badge text-bg-warning">Pending</p></td>
                                <td>10</td>
                                <td>Rp. 150.000,00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a href="{{ Route('home.member') }}" class="btn btn-primary mt-2">Back to Shopping</a>
    </div>
</div>
