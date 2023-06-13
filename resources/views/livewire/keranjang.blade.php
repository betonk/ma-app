<div>
    <div class="container">
        @if (Session::has('msg'))
            <div class="alert alert-success">
                <p> {{ Session::get('msg') }}</p>
            </div>
        @endif
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="fw-bold">Checkout Item</h1>
                    </div>
                    <div class="card-item p-2">

                        <table class="table table-responsive table-striped text-center align-self-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Quantity</th>
                                    <th>Jumlah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if (Gloudemans\Shoppingcart\Facades\Cart::count() > 0) --}}
                                @forelse (Gloudemans\Shoppingcart\Facades\Cart::content() as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->model->gambar }}</td>
                                        <td>{{ $item->model->name }}</td>
                                        <td>{{ $item->model->regular_price }}</td>
                                        <td>
                                            <div class="border radius m-auto text-center">
                                                <a href="#" class="btn"
                                                    wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')"><i
                                                        class="ri-subtract-line"></i></a>
                                                <span>{{ $item->qty }}</span>
                                                <a href="#" class="btn"
                                                    wire:click.prevent="increaseQuantity('{{ $item->rowId }}')"><i
                                                        class="ri-add-fill"></i></a>
                                            </div>
                                        </td>
                                        <td>{{ $item->subtotal }}</td>
                                        <td><a href="" class="btn btn-danger"
                                                wire:click.prevent="destroy('{{ $item->rowId }}')">Remove</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <p class="badge text-bg-danger">no item Cart!</p>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="5">Total</td>
                                    <td colspan="2"> <span>{{ Cart::total() }}</span></td>
                                </tr>
                                <tr>
                                    <td colspan="7"><a href="#" wire:click="clearAll()">delete all</a></td>
                                </tr>
                            </tbody>
                        </table>
                        <a class="btn btn-primary text-white" href="{{ route('home.member') }}">back to shopping</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="fw-bold">Payment</h2>

                        {{-- <form action="" method="post" method="POST" enctype="multipart/form-data" role="form"
                            novalidate> --}}
                        <form wire:submit.prevent="order">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginName">Nama Lengkap</label>
                                <input type="text" id="loginName"
                                    class="form-control @error('name')is-invalid @enderror" wire:model="name"
                                    value="{{ old('name') }}" required autocomplete="name" readonly />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginName">Email</label>
                                <input type="text" id="loginName"
                                    class="form-control @error('email')is-invalid @enderror" wire:model="email"
                                    value="{{ old('email') }}" required autocomplete="email" readonly />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginName">Phone</label>
                                <input type="number" id="loginName"
                                    class="form-control @error('phone')is-invalid @enderror" wire:model="phone"
                                    value="{{ old('phone') }}" required autocomplete="phone" readonly />
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginName">Address</label>
                                <input type="text" id="loginName"
                                    class="form-control @error('alamat')is-invalid @enderror" wire:model="alamat"
                                    value="{{ old('alamat') }}" required autocomplete="alamat" readonly />
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="formFileMultiple">upload transfer receipt</label>
                                <input type="file" id="formFileMultiple"
                                    class="form-control @error('gambar')is-invalid @enderror" wire:model="gambar"
                                    value="{{ old('gambar') }}" />
                                <div id="emailHelp" class="form-text">Format (JPEG, PNG)</div>
                                @error('gambar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="d-grid gap-2">
                                @if (Gloudemans\Shoppingcart\Facades\Cart::count() > 0)
                                    <button type="button" wire:click.prevent="order()"
                                        class="btn btn-primary text-white">Order</button>
                                @else
                                    <button type="button" class="btn btn-dark" disabled>No item! order please</button>
                                @endif
                            </div>
                        </form>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
