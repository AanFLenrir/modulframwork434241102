<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar User</title>
</head>
<body>
    <h1>Daftar User</h1>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($user as $item)
                <tr>
                    <td>{{ $item->iduser }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->password }}</td>
                </tr>
            @empty
                <tr><td colspan="4">Tidak ada data</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>