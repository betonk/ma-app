<div>
    <div class="app-card shadow-sm mb-4 p-4">
        <div class="row">
            @if (session('msg'))
            <div class="alert alert-success" role="alert">
                {{ session('msg') }}
            </div>
            @endif
            <div class="col-6">
                <h1 class="app-page-title">&nbsp; Data Barang</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('product.add') }}" class="btn btn-primary">
                    <i class="fa-regular fa-square-plus"></i> &nbsp;Tambah Barang
                </a>
            </div>
        </div>
        {{-- datatables --}}
        <table class="table table-bordered table-striped text-center align-items-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Series</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
                <tr class="align-middle">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->anime }}</td>
                    <td><img src="{{ asset('checkout/product/' . $item->gambar) }}" alt="" width="40" height="40" class="img-fluid rounded-circle"></td>
                    <td class="d-flex justify-content-center">
                        {{-- url('admin/' . $item->id . '/edit') --}}
                        <a href="{{ route('product.edit',['item_id'=>$item->id]) }}" class="btn text-primary"><i class="fas fa-fw fa-pen-to-square"></i></a>
                        {{-- <a href="" class="btn btn-danger">delete</a> --}}
                        |
                        {{-- <form action="{{ url('admin/' . $item->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn text-primary border-0"><i class="fas fa-fw fa-trash"></i></button>
                        </form> --}}
                        <button type="button" class="btn text-primary border-0" onclick="confirmDelete('{{ $item->id }}')">
                            <i class="fas fa-fw fa-trash"></i>
                        </button>
                        |
                        <a class="btn text-primary border-0" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->id }}"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="">
            {{ $product->links() }}
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    function confirmDelete(itemId) {
        Swal.fire({
            title: 'Are You Sure?',
            text: 'Barang record will be deleted!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Delete!'
        }).then((result) => {
            if (result.value) {
                Livewire.emit('deleteKate', itemId);
                Swal.fire({
                    title: 'Barang deleted successfully!',
                    icon: 'success'
                });
            } else {
                Swal.fire({
                    title: 'Operation Cancelled!',
                    icon: 'warning'
                });
            }
        });
    }
</script>

@foreach ($product as $data)
<!-- Modal -->
<div class="modal fade" id="exampleModal-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Barang Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <fieldset disabled="disabled">
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">nama
                            barang</label>
                        <input type="text" id="disabledTextInput" class="form-control" value="{{ $data->name }}" placeholder="Disabled input">
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">kategori</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="{{ $data->category->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">series</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="{{ $data->anime }}">
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">gambar</label><br>
                        <img src="{{ asset('checkout/product/' . $data->gambar) }}" alt="" width="400" height="400" class="img-fluid mb-2">
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">deskripsi</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="{{ $data->desc }}">
                    </div>
                </fieldset>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach