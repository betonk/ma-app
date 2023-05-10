<div>
    <div class="container py-2">
        {{-- main content --}}
        <div class="field p-4">
            <div class="row mt-4">
                <div class="col-md-6">
                    <img src="" alt="" width="100%" height="100%">
                </div>
                <div class="col-md-6 align-self-top">
                    <h1 class="fw-bold text-primary mb-2">{{ $product->name }}</h1>
                    <h3>IDR {{ $product->regular_price }}.000,00</h3>
                    <h2>Spesifikasi</h2>
                    <h6 class="text-break">{{ $product->desc }}</h6>
                    <h2>informasi</h2>
                    <p>Serial : {{ $product->anime }}</p>
                    <p>jumlah : {{ $product->quantity }}</p>
                    @guest
                        @if (Route::has('login'))
                            <a class="btn btn-primary" href="{{ Route('login') }}">Pre-Order</a>
                        @endif
                    @else
                        <div class="d-flex gap-2">
                            <div class="">
                                <a wire:click.prevent="store({{ $product->id }},'{{ $product->name }}','{{ $product->regular_price }}')"
                                    class="btn btn-outline-primary">Pre-Order</a>
                            </div>
                            <div class="">
                                <a wire:click.prevent="store({{ $product->id }},'{{ $product->name }}','{{ $product->regular_price }}')"
                                    class="btn btn-outline-secondary">Add to Cart</a>
                            </div>

                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
