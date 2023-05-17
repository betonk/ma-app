<div>
    <div class="app-card shadow-sm mb-4 p-4">
        <div class="row">
            @if ($updateKate)
                @include('livewire.admin.kategori.edit')
            @else
                @include('livewire.admin.kategori.tambah')
            @endif
            @if (session('msg'))
                <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                </div>
            @endif
            <div class="col-6">
                <h1 class="app-page-title">&nbsp; Data Kategori</h1>
            </div>
            <div class="col-6 text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahmodal"><i
                        class="fa-regular fa-square-plus"></i>&nbsp;Tambah
                    Kategori</button>
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

                            <button wire:click="edit({{ $item->id }})" class="text-primary border-0"
                                data-bs-toggle="modal" data-bs-target="#editmodal">
                                <i class="fas fa-fw fa-pen-to-square"></i>
                            </button>
                            |
                            <button onclick="deleteKate({{ $item->id }})" class="text-primary border-0">
                                <i class="fas fa-fw fa-trash"></i>
                            </button>
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
<script>
    function deleteKate(id) {
        if (confirm("Are you sure to delete this record?"))
            window.livewire.emit('deleteKate', id);
    }
</script>
