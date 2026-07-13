@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded-2xl shadow-sm border border-slate-200">
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h3 class="text-xl font-bold text-slate-900">Daftar Penyewa Kost</h3>
            <p class="text-sm text-slate-500">Berikut adalah data seluruh penghuni aktif KostCloud.</p>
        </div>
        <a href="{{ route('tenants.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium text-xs rounded-xl shadow-sm transition">
            ➕ Tambah Penyewa
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-200 text-sm font-semibold text-slate-600 bg-slate-50">
                    <th class="p-4">Nama Lengkap</th>
                    <th class="p-4">Nomor WhatsApp</th>
                    <th class="p-4">Alamat Email</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm text-slate-600 divide-y divide-slate-100">
                @forelse($tenants as $tenant)
                <tr class="hover:bg-slate-50 transition">
                    <td class="p-4 font-medium text-slate-900">{{ $tenant->name }}</td>
                    <td class="p-4">{{ $tenant->phone }}</td>
                    <td class="p-4">{{ $tenant->email }}</td>
                    <td class="p-4 text-center">
                        <div class="flex justify-center items-center gap-2">
                            <a href="{{ route('tenants.edit', $tenant->id) }}" class="px-2.5 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-medium hover:bg-blue-100 transition">Edit</a>
                            <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus penyewa ini?')">
                                @csrf @method('DELETE')
                                <button class="px-2.5 py-1 bg-red-50 text-red-600 rounded-lg text-xs font-medium hover:bg-red-100 transition">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-8 text-center text-slate-400 bg-slate-50">
                        Belum ada data penyewa. Klik "Tambah Penyewa" untuk menambahkan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $tenants->links() }}
    </div>
</div>
@endsection
