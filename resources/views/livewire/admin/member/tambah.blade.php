<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="tambahmodalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahmodalLabel">Tambah Member</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="loginName">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                        {{-- email --}}
                        <div class="form-outline mb-4">
                            <label class="form-label" for="loginName">email</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email')is-invalid @enderror" wire:model="email"
                                value="{{ old('email') }}" />
        
                            @error('email')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- email --}}
                        <div class="form-outline mb-4">
                            <label class="form-label" for="loginName">phone</label>
                            <input type="number" name="phone" id="phone"
                                class="form-control @error('phone')is-invalid @enderror" wire:model="phone"
                                value="{{ old('phone') }}" />
        
                            @error('phone')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- email --}}
                        <div class="form-outline mb-4">
                            <label class="form-label" for="loginName">Alamat</label>
                            <input type="text" name="alamat" id="alamat"
                                class="form-control @error('alamat')is-invalid @enderror" wire:model="alamat"
                                value="{{ old('alamat') }}" />
        
                            @error('alamat')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button data-bs-dismiss="modal" aria-label="Close" class="btn btn-secondary">Close</button>
                    <button wire:click.prevent="store()" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</div>
