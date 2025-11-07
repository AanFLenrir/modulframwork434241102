<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar User dan Role</title>
</head>
<body>
    <h1>Daftar User dengan Rolenya</h1>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama User</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($roleUser as $item)
                <tr>
                    <td>{{ $item->idrole_user }}</td>
                    <td>{{ $item->user->nama ?? '-' }}</td>
                    <td>{{ $item->user->email ?? '-' }}</td>
                    <td>{{ $item->role->nama_role ?? '-' }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @empty
                <tr><td colspan="5">Tidak ada data</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>