<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard KostCloud</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Manajemen Properti Kost</h1>
            
            @auth
                <a href="{{ url('/kost/create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    + Tambah Kost Baru
                </a>
            @else
                <a href="{{ route('login') }}" class="text-blue-600 font-semibold">Login untuk mengelola</a>
            @endauth
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($properties as $prop)
                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-500">
                    <h3 class="text-xl font-bold text-gray-800">{{ $prop->name }}</h3>
                    <p class="text-gray-500 mt-2 text-sm">{{ $prop->address }}</p>
                    <p class="text-blue-600 font-bold mt-4">Rp {{ number_format($prop->harga, 0, ',', '.') }} / bulan</p>
                    
                    <div class="mt-6 flex gap-2">
                        <a href="#" class="text-sm text-blue-500 hover:underline">Edit</a>
                        <form action="#" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-sm text-red-500 hover:underline">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-10 bg-white rounded-xl shadow">
                    <p class="text-gray-500">Belum ada data properti. Silakan tambahkan kost pertama Anda!</p>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>