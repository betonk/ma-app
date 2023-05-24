<div>
    <div class="container">
        @if (Session::has('msg'))
        <div class="alert alert-success">
            {{ Session::get('msg') }}
        </div>
        @endif
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="fw-bold">Profile {{ $previousName }}</h2>

                    <form wire:submit.prevent="order">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="loginName">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name')is-invalid @enderror" wire:model="name" value="{{ $name }}" required />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="loginName">Email</label>
                            <input type="text" class="form-control @error('email')is-invalid @enderror" wire:model="email" value="{{ $email }}" required autocomplete="email" readonly />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="loginName">Phone</label>
                            <input type="number" class="form-control @error('phone')is-invalid @enderror" wire:model="phone" value="{{ $phone }}" required autocomplete="phone" />
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="loginName">Address</label>
                            <input type="text" class="form-control @error('alamat')is-invalid @enderror" wire:model="alamat" value="{{ $alamat }}" required autocomplete="alamat" />
                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="d-grid gap-2">
                            <button type="button" wire:click.prevent="update()" class="btn btn-primary text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>