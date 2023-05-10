<div>
    {{-- Do your work, then step back. --}}
    {{-- <h4 class="fw-bolder text-center mt-4">Data Pre-Order Marahobina Store</h4> --}}
    <hr>
    <div class="row align-items-start" id="barang">
        <div class="col-4 offset-8 mb-4">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search . . ." aria-label="Search"
                    wire:model="search">
                {{-- <button class="btn btn-outline-primary" type="submit">Search</button> --}}
            </form>
        </div>
        @foreach ($product as $d)
            <div class="col-3 mb-2">
                <div class="card p-2">
                    <img src="" alt="" height="150" class="card-img-top mb-2">
                    <p class="text-small mb-0">Anime: {{ $d->anime }}</p>
                    <h3 class="fw-bolder">{{ $d->name }}</h3>
                    <p class="text-primary fw-bold">IDR. {{ $d->regular_price }}.000,00</p>
                    {{-- <p class="fw-bold">batas terakhir PO: {{ date('d-m-Y', strtotime($item->estimasi)) }}</p> --}}
                    <div class="d-grid gap-2">
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
                    {{-- </div> --}}
                </div>
            </div>
        @endforeach
        <div class="">
            {{ $product->links() }}
        </div>
    </div>
</div>
