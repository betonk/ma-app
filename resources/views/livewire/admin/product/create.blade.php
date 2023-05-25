<div>
    <div class="app-card shadow-sm mb-4 p-4">
        @if (Session::has('msg'))
            <div class="alert alert-success" role="alert">{{ Session::get('msg') }}</div>
        @endif
        <h3>Tambah Barang</h3>
        <hr>
        {{-- form --}}
        <form wire:submit.prevent="storeProduct" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Nama Barang</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                        wire:keyup="generateSlug" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- slug --}}
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Slug</label>
                    <input type="text" name="slug" id="slug"
                        class="form-control @error('slug')is-invalid @enderror" wire:model="slug"
                        value="{{ old('slug') }}" />

                    @error('slug')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- anime --}}
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Anime Series</label>
                    <input type="text" name="anime" id="anime"
                        class="form-control @error('anime')is-invalid @enderror" wire:model="anime"
                        value="{{ old('anime') }}" />

                    @error('anime')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Kode --}}
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Kode Barang</label>
                    <input type="text" name="kode" id="kode"
                        class="form-control @error('kode')is-invalid @enderror" wire:model="kode"
                        value="{{ old('kode') }}" aria-describedby="emailHelp" />
                    <div id="emailHelp" class="form-text">Example: KD400.</div>

                    @error('kode')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Deskripsi Barang</label>
                    <input type="text" name="desc" id="desc"
                        class="form-control @error('desc')is-invalid @enderror" wire:model="desc"
                        value="{{ old('desc') }}" />

                    @error('desc')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Regular price --}}
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Harga Barang</label>
                    <input type="number" name="regular_price" id="regular_price"
                        class="form-control @error('regular_price')is-invalid @enderror" wire:model="regular_price"
                        value="{{ old('regular_price') }}" />

                    @error('regular_price')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- sale price --}}
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Harga Jual</label>
                    <input type="number" name="harga_jual" id="harga_jual"
                        class="form-control @error('harga_jual')is-invalid @enderror" wire:model="harga_jual"
                        value="{{ old('harga_jual') }}" />

                    @error('harga_jual')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- quantity --}}
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Jumlah Barang</label>
                    <input type="number" name="quantity" id="quantity"
                        class="form-control @error('quantity')is-invalid @enderror" wire:model="quantity"
                        value="{{ old('quantity') }}" />

                    @error('quantity')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- deadline --}}
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Deadline PO</label>
                    <input type="date" name="deadline" id="deadline"
                        class="form-control @error('deadline')is-invalid @enderror" wire:model="deadline"
                        value="{{ old('deadline') }}" />

                    @error('deadline')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- image --}}
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Gambar Barang</label>
                    <input type="file" name="gambar" id="" class="form-control" wire:model="gambar" />

                    @error('quantity')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Stock Status --}}
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Status Barang</label>
                    {{-- <input type="text" name="harga_jual" id="harga_jual" class="form-control @error('harga_jual')is-invalid @enderror" wire:model="harga_jual" value="{{ old('harga_jual') }}" /> --}}
                    <select name="stock_status" id="" class="form-control" wire:model="stock_status">
                        <option value="">-- Select Status --</option>
                        <option value="visible">Visible</option>
                        <option value="hidden">Hidden</option>
                    </select>

                    @error('stock_status')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Featured --}}
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Featured</label>
                    {{-- <input type="text" name="harga_jual" id="harga_jual" class="form-control @error('harga_jual')is-invalid @enderror" wire:model="harga_jual" value="{{ old('harga_jual') }}" /> --}}
                    <select name="featured" id="featured" class="form-control" wire:model="featured">
                        <option value="">-- Select Featured --</option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>

                    @error('harga_jual')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Kategori Barang</label>
                    {{-- <input type="text" name="harga_jual" id="harga_jual" class="form-control @error('harga_jual')is-invalid @enderror" wire:model="harga_jual" value="{{ old('harga_jual') }}" /> --}}
                    <select name="kategori_id" id="kategori_id" class="form-control" wire:model="kategori_id">
                        <option value="">-- Select Kategori --</option>
                        @foreach ($kategori as $x)
                            <option value="{{ $x->id }}">{{ $x->name }}</option>
                        @endforeach
                    </select>

                    @error('harga_jual')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- submit --}}
                <div class="d-flex gap-2 col-12 justify-content-md-end">
                    <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </div>
        </form>

    </div>
</div>
