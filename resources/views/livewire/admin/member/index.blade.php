    <div class="app-card shadow-sm mb-4 p-4">
        <div class="row">
            @if ($updateMember)
            @include('livewire.admin.member.edit')
            @else
            @include('livewire.admin.member.tambah')
            @endif
            @if (session('msg'))
                <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                </div>
            @endif
            <div class="col-6">
                <h1 class="app-page-title">&nbsp; Data member</h1>
            </div>
            <div class="col-6 text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editmodal"><i
                        class="fa-regular fa-square-plus"></i>&nbsp;Tambah
                    Member</button>
            </div>
        </div>
        {{-- datatables --}}
        <table class="table table-bordered table-striped text-center justify-content-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Registered on date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($member as $item)
                    <tr class="align-middle">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->created_at->format('Y-m-d') }}</td>
                        <td class="d-flex justify-content-center">

                            <button wire:click="edit({{ $item->id }})" class="text-primary border-0"
                                data-bs-toggle="modal" data-bs-target="#editmodal">
                                <i class="fas fa-fw fa-pen-to-square"></i>
                            </button>
                            |
                            <button onclick="deleteMember('{{ $item->id }}')" class="text-primary border-0">
                                <i class="fas fa-fw fa-trash"></i>
                            </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="">
            {{ $member->links() }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        function deleteKate(itemId) {
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Member record will be deleted!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Delete!'
            }).then((result) => {
                if (result.value) {
                    Livewire.emit('deleteKate', itemId);
                    Swal.fire({
                        title: 'Member deleted successfully!',
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
