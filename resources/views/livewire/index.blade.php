<div>
    {{-- Do your work, then step back. --}}
    {{-- <h4 class="fw-bolder text-center mt-4">Data Pre-Order Marahobina Store</h4> --}}
    <hr>
    <div class="row align-items-start" id="barang">
        <div class="col-4 offset-8 mb-4">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search . . ." aria-label="Search" wire:model="search">
                {{-- <button class="btn btn-outline-primary" type="submit">Search</button> --}}
            </form>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-3 justify-content-center">
            @foreach ($product as $d)
            <div class="p-3">
                <div class="card p-2 text-truncate">
                    <div class="ratio ratio-1x1">
                        <img src="{{ asset('/checkout/product/'.$d->gambar)}}" alt="image_{{$d->anime}}" class="w-100 mb-2" style="object-fit: cover;">
                    </div>
                    <p class="text-small mb-0">Anime: {{ $d->anime }}</p>
                    <h3 class="fw-bolder">{{ $d->name }}</h3>
                    <p class="text-primary fw-bold">IDR. {{ $d->regular_price }},00</p>
                    {{-- <p class="fw-bold">batas terakhir PO: {{ date('d-m-Y', strtotime($item->estimasi)) }}</p> --}}
                    <div class="d-grid gap-2">
                        @guest
                        @if (Route::has('login'))
                        <a href="{{ route('product.details', ['slug' => $d->slug]) }}" class="btn btn-primary text-white">Pre-Order</a>
                        @endif
                        @else
                        <a href="{{ route('product.details', ['slug' => $d->slug]) }}" class="btn btn-primary text-white">Pre-Order</a>
                        @endguest
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
            @endforeach
        </div>
        <div class="">
            {{ $product->links() }}
        </div>
    </div>
</div>