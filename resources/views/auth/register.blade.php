@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <h2 class="text-center fw-bold">Register</h2>
                            {{-- full name --}}
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginName">Full Name</label>
                                <input type="text" id="loginName" class="form-control @error('name')is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />

                                @error('name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- email --}}
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginName">email</label>
                                <input type="email" id="loginName"
                                    class="form-control @error('email')is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" />

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- phone --}}
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginName">Alamat</label>
                                <input type="text" id="loginName"
                                    class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                    value="{{ old('alamat') }}" required autocomplete="name" autofocus />

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- phone --}}
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginName">No Telpon</label>
                                <input type="number" id="loginName"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" required autocomplete="name" aria-describedby="phoneHelp" autofocus />
                                    <div id="phoneHelp" class="form-text">example: 6281289854649</div>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- password --}}
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginName">Password</label>
                                <input type="password" id="loginName"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password" />

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- confirm password --}}
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginName">Confrim Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="row mb-0 m-1">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <div class="mt-2">
                                <p class="text-center">Have an Account? <a href="{{ route('login') }}">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
