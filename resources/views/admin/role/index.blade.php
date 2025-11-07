<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Role</title>
</head>
<body>
    <h1>Daftar Role</h1>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID Role</th>
                <th>Nama Role</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($role as $item)
                <tr>
                    <td>{{ $item->idrole }}</td>
                    <td>{{ $item->nama_role }}</td>
                </tr>
            @empty
                <tr><td colspan="2">Tidak ada data</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>