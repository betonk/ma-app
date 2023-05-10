<div>
    <div class="app-card shadow-sm mb-4 p-4">
        <div class="row">
            @if (session('msg'))
                <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                </div>
            @endif
            <div class="col-6">
                <h1 class="app-page-title">&nbsp; Data Kategori</h1>
            </div>
            <div class="col-6 text-end">
                <a href="#" class="btn btn-primary"><i class="fa-regular fa-square-plus"></i>&nbsp;Tambah
                    Kategori</a>
            </div>
        </div>
        {{-- datatables --}}
        <table class="table table-bordered table-striped text-center justify-content-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>slug</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $item)
                    <tr class="align-middle">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->slug }}</td>
                        <td class="d-flex justify-content-center">

                            <a href="{{ url('barang/' . $item->id . '/edit') }}" class="btn text-primary"><i
                                    class="fas fa-fw fa-pen-to-square"></i></a>
                            {{-- <a href="" class="btn btn-danger">delete</a> --}}
                            |
                            <form action="{{ url('admin/' . $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn text-primary border-0"><i
                                        class="fas fa-fw fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="">
            {{ $kategori->links() }}
        </div>
    </div>
</div>
