<div>
    <div class="app-card shadow-sm mb-4 p-4">
        @if (Session::has('msg'))
        <div class="alert alert-success" role="alert">{{ Session::get('msg') }}</div>
        @endif
        <h3>Tambah Request</h3>
        <hr>
        {{-- form --}}
        <form wire:submit.prevent="storeRequest" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Nama Barang</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus wire:keyup="generateSlug" />
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control @error('slug')is-invalid @enderror" wire:model="slug" value="{{ old('slug') }}" />

                    @error('slug')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Status Barang</label>
                    {{-- <input type="text" name="harga_jual" id="harga_jual" class="form-control @error('harga_jual')is-invalid @enderror" wire:model="harga_jual" value="{{ old('harga_jual') }}" /> --}}
                    <select name="status" id="" class="form-control" wire:model="status">
                        <option value="">-- Select Status --</option>
                        <option value="0">Cancel</option>
                        <option value="1">Pending</option>
                        <option value="2">Success</option>
                    </select>

                    @error('status')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Link Barang</label>
                    <input type="text" name="link" id="link" class="form-control @error('link')is-invalid @enderror" wire:model="link" value="{{ old('link') }}" />

                    @error('link')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Harga Barang</label>
                    <input type="number" name="harga" id="harga" class="form-control @error('harga')is-invalid @enderror" wire:model="harga" value="{{ old('harga') }}" />

                    @error('harga')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Quantity</label>
                    <input type="number" name="qty" id="qty" class="form-control @error('qty')is-invalid @enderror" wire:model="qty" value="{{ old('qty') }}" />

                    @error('qty')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- submit --}}
                <div class="d-flex gap-2 col-12 justify-content-md-end">
                    <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>