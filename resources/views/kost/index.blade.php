<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Properti KostCloud</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; }
        .card {
            background-color: #ffffff;
            margin: 15px 0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #3498db;
            max-width: 500px;
        }
        .nama-kost { font-size: 1.2em; font-weight: bold; color: #2980b9; }
        .alamat-kost { color: #7f8c8d; margin-top: 5px; }
    </style>
</head>
<body>

    <h1>Data Properti Kost</h1>
    
    <div id="properti-list">
        {{-- Kita tambah pengecekan agar tidak error kalau data kosong --}}
        @forelse($properties as $prop)
            <div class="card">
                <div class="nama-kost">{{ $prop->name ?? 'Tanpa Nama' }}</div>
                <div class="alamat-kost">{{ $prop->address ?? 'Tanpa Alamat' }}</div>
            </div>
        @empty
            <p>Belum ada data properti di database.</p>
        @endforelse
    </div>

</body>
</html>