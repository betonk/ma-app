<div>
    <div class="app-card shadow-sm mb-4 p-4">
        <div class="row">
            @if (session('msg'))
            <div class="alert alert-success" role="alert">
                {{ session('msg') }}
            </div>
            @endif
            <div class="col-6">
                <h1 class="app-page-title">&nbsp; Data Pre Order</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('generate-pdf.po') }}" class="btn btn-warning"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;PDF</a>
            </div>
        </div>
        {{-- datatables --}}
        <table class="table table-bordered table-striped text-center align-items-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Tanggal Order</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($preorder as $item)
                <tr class="align-middle">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->users->name }}</td>
                    {{-- <td>{{ $item->status == 'on progress' ? '<button class="btn btn-warning">on Progress</button>':'<button class="btn btn-danger">cancel</button>' }}</td> --}}
                    <td>
                        @if ($item->status == '0')
                        <a class="badge text-bg-danger">Cancel</a>
                        @elseif ($item->status == '1')
                        <a class="badge text-bg-warning">Pending</a>
                        @elseif ($item->status == '2')
                        <a class="badge text-bg-success">Approved</a>
                        @endif
                    </td>
                    <td>{{ date_format($item->created_at, 'd-m-Y') }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('preorder.edit', ['po_id' => $item->id]) }}" class="btn text-primary"><i class="fas fa-fw fa-pen-to-square"></i></a>

                        |
                        <button type="button" class="btn text-primary border-0" onclick="confirmDelete('{{ $item->id }}', '{{ $item->kode }}')">
                            <i class="fas fa-fw fa-trash"></i>
                        </button>
                        |
                        <a class="btn text-primary border-0" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->id }}"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Preorder Detail {{ $item->kode }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <fieldset disabled="disabled">
                                    <div class="mb-3">
                                        <label class="form-label">Kode</label>
                                        <input class="form-control" value="{{ $item->kode }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input class="form-control" value="{{ $item->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" value="{{ $item->email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input class="form-control" value="{{ $item->phone }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input class="form-control" value="{{ $item->alamat }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <input class="form-control" value="{{ $item->status == 0 ? 'Cancel' : ($item->status == 1 ? 'Pending' : 'Approved') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Order</label>
                                        <input class="form-control" value="{{ $item->created_at->format('d-F-Y') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Bukti Transfer</label>
                                        <img src="{{ asset('checkout/product/' . $item->gambar) }}" alt="" width="400" height="400" class="img-fluid mb-2">
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
            {{ $preorder->links() }}
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    function confirmDelete(id, kode) {
        Swal.fire({
            title: 'Are You Sure?',
            text: 'Data ' + kode + ' will be deleted!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Delete!'
        }).then((result) => {
            if (result.value) {
                Livewire.emit('deletePreorder', id);
                Swal.fire({
                    title: 'Data ' + kode + ' deleted successfully!',
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