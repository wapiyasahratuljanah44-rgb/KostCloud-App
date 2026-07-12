@extends('layouts.app')

@section('content')
<div class="grid gap-6 mb-8 md:grid-cols-2 lg:grid-cols-4">
    <div class="rounded-3xl bg-white p-6 shadow-sm border border-gray-200">
        <p class="text-sm font-medium text-gray-500">Total Kost</p>
        <p class="mt-4 text-3xl font-semibold text-gray-900">{{ $statistics['total'] }}</p>
    </div>
    <div class="rounded-3xl bg-white p-6 shadow-sm border border-gray-200">
        <p class="text-sm font-medium text-gray-500">Harga Rata-rata</p>
        <p class="mt-4 text-3xl font-semibold text-gray-900">Rp {{ number_format($statistics['average'], 0, ',', '.') }}</p>
    </div>
    <div class="rounded-3xl bg-white p-6 shadow-sm border border-gray-200">
        <p class="text-sm font-medium text-gray-500">Harga Terendah</p>
        <p class="mt-4 text-3xl font-semibold text-gray-900">Rp {{ number_format($statistics['minimum'], 0, ',', '.') }}</p>
    </div>
    <div class="rounded-3xl bg-white p-6 shadow-sm border border-gray-200">
        <p class="text-sm font-medium text-gray-500">Harga Tertinggi</p>
        <p class="mt-4 text-3xl font-semibold text-gray-900">Rp {{ number_format($statistics['maximum'], 0, ',', '.') }}</p>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($properties as $prop)
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-500">
            <h3 class="text-xl font-bold text-gray-800">{{ $prop->name }}</h3>
            <p class="text-gray-500 mt-2 text-sm">{{ $prop->address }}</p>
            <p class="text-blue-600 font-bold mt-4">Rp {{ number_format($prop->harga, 0, ',', '.') }} / bulan</p>
            
            <div class="mt-6 flex gap-2 flex-wrap">
                <a href="{{ url('/kost/'.$prop->id) }}" class="text-sm text-blue-500 hover:underline">Lihat Detail</a>
                <a href="{{ url('/kost/'.$prop->id.'/edit') }}" class="text-sm text-green-500 hover:underline">Edit</a>
                <form action="{{ url('/kost/'.$prop->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
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
@endsection
