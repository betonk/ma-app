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
                    <th>tgl order</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($preorder as $item)
                    <tr class="align-middle">
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="">{{ $item->users->name }}</a></td>
                        {{-- <td>{{ $item->status == 'on progress' ? '<button class="btn btn-warning">on Progress</button>':'<button class="btn btn-danger">cancel</button>' }}</td> --}}
                        <td>
                            @if ($item->status = '0')
                                <button type="button" class="btn btn-danger">Cancel</button>
                            @elseif ($item->status = '1')
                                <button type="button" class="btn btn-warning">Pending</button>
                            @elseif ($item->status = '2')
                                <button type="button" class="btn btn-success">Approved</button>
                            @endif
                        </td>
                        <td>{{ date_format($item->created_at, 'd-m-Y') }}</td>
                        <td class="d-flex justify-content-center">
                            {{-- <a href="{{ url('barang/' . $item->id . '/edit') }}" class="text-primary"><i class="fas fa-fw fa-pen-to-square"></i></a> --}}
                            {{-- <a href="" class="btn btn-danger">delete</a> --}}
                            |
                            {{-- <form action="{{ url('admin/' . $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-primary border-0"><i
                                        class="fas fa-fw fa-trash"></i></button>
                            </form> --}}
                            |
                            {{-- <button type="button" class="text-primary border-0" data-bs-toggle="modal"
                                data-bs-target="#exampleModal-{{ $item->id }}"><i class="fas fa-eye"></i></button> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="">
            {{ $preorder->links() }}
        </div>
    </div>
</div>
