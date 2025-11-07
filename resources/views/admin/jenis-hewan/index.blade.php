
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jenis Hewan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .btn-tambah {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 20px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-tambah:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background: white;
        }
        th {
            background-color: #343a40;
            color: white;
            padding: 12px;
            text-align: left;
            border: 1px solid #dee2e6;
        }
        td {
            padding: 12px;
            border: 1px solid #dee2e6;
        }
        tr:hover {
            background-color: #f8f9fa;
        }
        .btn-edit {
            background-color: #ffc107;
            color: black;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-size: 12px;
            margin-right: 5px;
        }
        .btn-hapus {
            background-color: #dc3545;
            color: white;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-size: 12px;
        }
        .btn-edit:hover {
            background-color: #e0a800;
        }
        .btn-hapus:hover {
            background-color: #c82333;
        }
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #6c757d;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-section">
            <h1>Daftar Jenis Hewan</h1>
            <a href="{{ route('admin.jenis-hewan.create') }}" class="btn-tambah">
                + Tambah Jenis Hewan
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th width="80">ID Jenis Hewan</th>
                    <th>Nama Jenis Hewan</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jenisHewan as $data)
                <tr>
                    <td>{{ $data->idjenis_hewan }}</td>
                    <td>{{ $data->nama_jenis_hewan }}</td>
                    <td>
                        <a href="{{ route('admin.jenis-hewan.edit', $data->idjenis_hewan) }}" class="btn-edit">Edit</a>
                        <button class="btn-hapus" onclick="confirmDelete({{ $data->idjenis_hewan }})">Hapus</button>
                        
                        <form id="delete-form-{{ $data->idjenis_hewan }}" 
                              action="{{ route('admin.jenis-hewan.destroy', $data->idjenis_hewan) }}" 
                              method="POST" 
                              style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="no-data">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
</body>
</html>

 <!-- aku menyelesaikan modul 11 ->
