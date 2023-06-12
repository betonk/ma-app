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
                            @foreach ($PreorderItem as $tra)
                                
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset('checkout/product/' . $tra->pro->gambar) }}" alt="" width="40" height="40" class="img-fluid rounded-circle"></td>
                                <td>{{ $tra->pro->name }}</td>
                                <td>
                                    @if ($tra->po->status == '0')
                                    <a class="badge text-bg-danger text-decoration-none">Cancel</a>
                                    @elseif ($tra->po->status == '1')
                                    <a class="badge text-bg-warning text-decoration-none">Pending</a>
                                    @elseif ($tra->po->status == '2')
                                    <a class="badge text-bg-success text-decoration-none">Approved</a>
                                    @endif</td>
                                <td>{{ $tra->quantity }}</td>
                                <td>Rp. {{ $tra->price }}.000,00</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a href="{{ Route('home.member') }}" class="btn btn-primary mt-2">Back to Shopping</a>
    </div>
</div>
