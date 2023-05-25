<div>
    <div>
        <div class="app-card shadow-sm mb-4 p-4">
            @if (Session::has('msg'))
            <div class="alert alert-success" role="alert">{{ Session::get('msg') }}</div>
            @endif
            <h3>Edit Preorder</h3>
            <hr>
            {{-- form --}}
            <form wire:submit.prevent="updatePreorder" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-outline mb-4">
                        <label class="form-label">Kode PO</label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" wire:model="kode" name="kode" value="{{ old('kode') }}" required autofocus disabled />
                        @error('kode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" name="name" value="{{ old('name') }}" required autofocus disabled />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" wire:model="email" name="email" value="{{ old('email') }}" required autofocus disabled />
                        @error('kode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label">Phone</label>
                        <input class="form-control @error('phone') is-invalid @enderror" wire:model="phone" name="phone" value="{{ old('phone') }}" required autofocus disabled />
                        @error('kode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" wire:model="alamat" name="alamat" value="{{ old('alamat') }}" required autofocus disabled />
                        @error('kode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label">Status</label>
                        {{-- <input type="text" name="status" id="status" class="form-control @error('status')is-invalid @enderror" wire:model="status" value="{{ old('status') }}" /> --}}
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

                    {{-- submit --}}
                    <div class="d-flex gap-2 col-12 justify-content-md-end">
                        <a class="btn btn-secondary" href="{{ url()->previous() }}">Close</a>
                        <button type="submit" class="btn btn-primary">Update!</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>