<div>
    {{-- Do your work, then step back. --}}
    {{-- <h4 class="fw-bolder text-center mt-4">Data Pre-Order Marahobina Store</h4> --}}
    <hr>
    <div class="row align-items-start" id="barang">
        <div class="col-4 offset-8 mb-0">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search . . ." aria-label="Search"
                    wire:model="search">
                {{-- <button class="btn btn-outline-primary" type="submit">Search</button> --}}
            </form>
        </div>

        <div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
        @foreach ($product as $d)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('/checkout/product/' . $d->gambar) }}" class="card-img-top"
                            alt="image_{{ $d->anime }}">
                        <div class="card-body">
                            <div class="form-text" id="basic-addon4">{{ $d->anime }}</div>
                            <h3 class="card-title fw-bold text-primary">{{ $d->name }}</h3>
                            <p class="card-text">IDR. {{ $d->regular_price }},00</p>
                        </div>
                        <div class="d-grid gap-2 card-footer">
                            @guest
                                @if (Route::has('login'))
                                    <a href="{{ route('product.details', ['slug' => $d->slug]) }}"
                                        class="btn btn-primary text-white">Pre-Order</a>
                                @endif
                            @else
                                <a href="{{ route('product.details', ['slug' => $d->slug]) }}"
                                    class="btn btn-primary text-white">Pre-Order</a>
                            @endguest
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        <div class="">
            {{ $product->links() }}
        </div>
    </div>
</div>
