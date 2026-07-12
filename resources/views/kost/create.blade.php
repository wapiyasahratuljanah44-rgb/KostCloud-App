@extends('layouts.app')

@section('content')
<div class="bg-white rounded-xl shadow p-8">
    <h1 class="text-2xl font-bold mb-6">Tambah Kost Baru</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded mb-6">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/kost/store" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700">Nama Kost</label>
            <input type="text" name="name" placeholder="Nama Kost" required class="w-full rounded border px-3 py-2" />
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Alamat</label>
            <input type="text" name="address" placeholder="Alamat" required class="w-full rounded border px-3 py-2" />
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Harga</label>
            <input type="number" name="harga" placeholder="Harga" required class="w-full rounded border px-3 py-2" />
        </div>
        <div class="flex items-center gap-3">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan Properti</button>
            <a href="{{ url('/') }}" class="text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
