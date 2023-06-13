@extends('layouts.app')

@section('content')
    @livewireScripts

    <body>
        <div class="container py-2">
            @if (session('msg'))
                <div class="alert alert-danger" role="alert">
                    {{ session('msg') }}
                </div>
            @endif
            {{-- main content --}}
            <div class="field p-4">
                <div class="row mt-4">
                    <div class="col-6 align-self-center">
                        <h1><b>The Most Complete Place To Meet Hobbyist Needs</b></h1>
                        <a href="#barang" class="btn btn-dark text-primary rounded-pill">Buy Now!</a>
                    </div>
                    <div class="col-6 align-self-end"><img class="w-100" src="{{ asset('./img/eva-01.svg') }}"
                            alt="eva-01"></div>
                </div>
            </div>

            {{-- section catagories --}}
            <section id="kategori" class="my-5">

                <h1 class="text-center text-primary fw-bold mb-5">Categories</h1>

                <div class="row row-cols-1 row-cols-md-3 g-3 justify-content-between">
                    <div class="col">
                        <a href=""><img src="{{ asset('./img/kt-1.svg') }}" class="card-img-top" alt="nendroid"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="{{ asset('./img/kt-2.svg') }}" class="card-img-top" alt=""></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="{{ asset('./img/kt-3.svg') }}" class="card-img-top" alt=""></a>
                    </div>
                </div>


            </section>

            {{-- section req order --}}
            <section id="req">
                <div class="field p-4">
                    <h1 class="text-center fw-bold">Item For Pre Order</h1>
                </div>
            </section>

            {{-- section barang --}}
            @livewire('index')

            {{-- section footer --}}
            <section id="ftr">
                <div class="field-ftr p-5">
                    <h1 class="fw-bold text-primary">Marahobina. We're Here!</h1>
                    <p class="text-white">Contact Us:</p>
                    <div class="flex my-2">
                        <a href="https://instagram.com/marahobinashop" target="blank" class="text-decoration-none"><i
                                class='ri-instagram-line' style="font-size: 1.5rem"></i></a>
                        <a href="http://wa.me/6282257627192?text=Hai%20Admin%20Marahobina!" target="blank"
                            class="text-decoration-none"><i class='ri-whatsapp-line' style="font-size: 1.5rem"></i></a>
                    </div>
                    <p class="text-white">copyright &copy; {{ date('Y') }} Marahobina</p>

                    <div class="d-flex justify-content-end">
                        {{-- <div class="form-check align-self-center">
                                <input class="form-check-input" type="checkbox" value="" id="loginCheck"
                                    {{ old('remember') ? 'checked' : '' }} />
                    <label class="form-check-label" for="loginCheck"> {{ __('Remember Me') }} </label>
                </div> --}}
                        <div class="m-0">
                            <a href="#" class="me-5 text-decoration-none text-white">terms and service</a>
                            <a href="#" class="text-decoration-none text-white">privacy policy</a>
                        </div>
                    </div>
                </div>
            </section>
            {{-- end container --}}
        </div>
        @livewireScripts
    </body>
@endsection
