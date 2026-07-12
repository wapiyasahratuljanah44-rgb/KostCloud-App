@extends('layouts.app')

@section('content')
<div class="bg-white rounded-xl shadow p-8">
    <a href="{{ url('/') }}" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Kembali ke Daftar Kost</a>

    <h1 class="text-3xl font-bold text-gray-900">{{ $property->name }}</h1>
    <p class="text-gray-600 mt-3">{{ $property->address }}</p>
    <p class="text-blue-600 font-bold mt-4 text-2xl">Rp {{ number_format($property->harga, 0, ',', '.') }} / bulan</p>

    <div class="mt-8 grid gap-4 md:grid-cols-2">
        <div class="rounded-xl border border-gray-200 p-4 bg-gray-50">
            <h2 class="font-semibold text-gray-800">Pemilik</h2>
            <p class="text-gray-600 mt-2">{{ $property->user?->name ?? 'Belum ada data' }}</p>
        </div>
        <div class="rounded-xl border border-gray-200 p-4 bg-gray-50">
            <h2 class="font-semibold text-gray-800">Tanggal Dibuat</h2>
            <p class="text-gray-600 mt-2">{{ $property->created_at->format('d M Y') }}</p>
        </div>
    </div>

    <div class="mt-8 flex items-center gap-4">
        <a href="{{ url('/kost/'.$property->id.'/edit') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Edit</a>
        <form action="{{ url('/kost/'.$property->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Hapus</button>
        </form>
    </div>
</div>
@endsection
