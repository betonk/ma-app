@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <h2 class="text-center fw-bold">LOGIN</h2>
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            {{-- email address --}}
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
                            {{-- two colomn --}}
                            <div class="d-flex justify-content-end mb-4">
                                {{-- <div class="form-check align-self-center">
                                <input class="form-check-input" type="checkbox" value="" id="loginCheck"
                                    {{ old('remember') ? 'checked' : '' }} />
                                <label class="form-check-label" for="loginCheck"> {{ __('Remember Me') }} </label>
                            </div> --}}
                                <div class="m-0">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            {{-- btn-login --}}
                            <div class="row mb-0 m-1">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="mt-2">
                                <p class="text-center">Don't Have an Account? <a href="{{ route('register') }}">Register</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
