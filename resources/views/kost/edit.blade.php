@extends('layouts.app')

@section('content')
<div class="bg-white rounded-xl shadow p-8">
    <a href="{{ url('/kost/'.$property->id) }}" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Kembali ke Detail</a>

    <h1 class="text-2xl font-bold mb-6">Edit Kost</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-md mb-6">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/kost/'.$property->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Nama Kost</label>
            <input type="text" name="name" value="{{ old('name', $property->name) }}" required class="w-full rounded border px-3 py-2" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Alamat</label>
            <input type="text" name="address" value="{{ old('address', $property->address) }}" required class="w-full rounded border px-3 py-2" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Harga</label>
            <input type="number" name="harga" value="{{ old('harga', $property->harga) }}" required class="w-full rounded border px-3 py-2" />
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan Perubahan</button>
            <a href="{{ url('/kost/'.$property->id) }}" class="text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
