    <div class="app-card shadow-sm mb-4 p-4">
        <div class="row">
            @if (session('msg'))
            <div class="alert alert-success" role="alert">
                {{ session('msg') }}
            </div>
            @endif
            <div class="col-6">
                <h1 class="app-page-title">&nbsp; Data member</h1>
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
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="">
            {{ $member->links() }}
        </div>
    </div>