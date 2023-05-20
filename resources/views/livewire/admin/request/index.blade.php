<div>
    <div class="app-card shadow-sm mb-4 p-4">
        <div class="row">
            @if (session('msg'))
            <div class="alert alert-success" role="alert">
                {{ session('msg') }}
            </div>
            @endif
            <div class="col-6">
                <h1 class="app-page-title">&nbsp; Data Request Order</h1>
            </div>
            <div class="col-6">
                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('generate-pdf.ro') }}" class="btn btn-warning"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;PDF</a>
                    <a href="{{ route('request.add') }}" class="btn btn-primary"><i class="fa-regular fa-square-plus"></i>&nbsp;Add Request</a>
                </div>
            </div>
        </div>
        {{-- datatables --}}
        <table class="table table-bordered table-striped text-center align-items-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Link</th>
                    <th>Nama Item</th>
                    <th>Harga</th>
                    <th>Tgl Pesan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($request as $item)
                <tr class="align-middle">
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="">{{ $item->users->name }}</a></td>
                    {{-- <td>{{ $item->status == 'on progress' ? '<button class="btn btn-warning">on Progress</button>':'<button class="btn btn-danger">cancel</button>' }}</td> --}}
                    <td>
                        @if ($item->status == '0')
                        <button type="button" class="w-75 btn btn-danger">Cancel</button>
                        @elseif ($item->status == '1')
                        <button type="button" class="w-75 btn btn-warning">Pending</button>
                        @elseif ($item->status == '2')
                        <button type="button" class="w-75 btn btn-success">Approved</button>
                        @endif
                    </td>
                    <td>{{ $item->link }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->harga }}</td>
                    <td>{{ date_format($item->created_at, 'd-m-Y') }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('request.edit',['reqorder_id'=>$item->id]) }}" class="btn text-primary"><i class="fas fa-fw fa-pen-to-square"></i></a>
                        |
                        <button type="button" class="btn text-primary border-0" onclick="confirmDelete('{{ $item->id }}', '{{ $item->name }}')">
                            <i class="fas fa-fw fa-trash"></i>
                        </button>
                        |
                        <button type="button" class="text-primary border-0" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->id }}"><i class="fas fa-eye"></i></button>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Barang Detail</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <fieldset disabled="disabled">
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">Nama
                                        </label>
                                        <input type="text" id="disabledTextInput" class="form-control" value="{{ $item->users->name }}" placeholder="Disabled input">
                                    </div>
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">Status</label>
                                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="{{ $item->status == 0 ? 'Cancel' : ($item->status == 1 ? 'Pending' : 'Approved') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">Link</label>
                                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="{{ $item->link }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">Nama Item</label><br>
                                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="{{ $item->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">Harga</label>
                                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="{{ $item->harga }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">Tanggal Pesan</label>
                                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="{{ date_format($item->created_at, 'd F Y') }}">
                                    </div>
                                </fieldset>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Modal -->

                @endforeach
            </tbody>
        </table>
        <div class="">
            {{ $request->links() }}
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    function confirmDelete(id, name) {
        Swal.fire({
            title: 'Are You Sure?',
            text: 'Data ' + name + ' will be deleted!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Delete!'
        }).then((result) => {
            if (result.value) {
                Livewire.emit('deleteRequest', id);
                Swal.fire({
                    title: 'Data ' + name + ' deleted successfully!',
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