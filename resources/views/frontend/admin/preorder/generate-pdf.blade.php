<html>

<h1>Data Preorder</h1>
<p>Tanggal: {{ $date }}</p>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Status</th>
            <th>Tanggal Order</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($preorder as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->users->name }}</td>
            <td>
                @if ($item->status == '0')
                <button type="button" class="button btn-danger">Cancel</button>
                @elseif ($item->status == '1')
                <button type="button" class="button btn-warning">Pending</button>
                @elseif ($item->status == '2')
                <button type="button" class="button btn-success">Approved</button>
                @endif
            </td>
            <td>{{ date_format($item->created_at, 'd-m-Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<style>
    table {
        border-collapse: collapse;
        border-radius: 1rem;
        width: 100%;
        margin: 0 auto;
        text-align: center;
    }

    table thead tr {
        height: 60px;
        background: #ffed86;
        font-size: 16px;
    }

    table tbody tr {
        height: 48px;
        border-bottom: 1px solid #e3f1d5;
    }

    body {
        padding: .5rem;
    }

    .button {
        width: 5rem;
        border: none;
        border-radius: 1rem;
        color: #000;
        padding: 6px 12px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    .btn-danger {
        background-color: #ff5f54;
    }

    .btn-warning {
        background-color: #ffd966;
    }

    .btn-success {
        background-color: #4CAF50;
    }
</style>

</html>