@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-xl shadow p-8">
    <h1 class="text-2xl font-bold mb-6">Register</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/register') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full rounded border px-3 py-2" />
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full rounded border px-3 py-2" />
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" required class="w-full rounded border px-3 py-2" />
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required class="w-full rounded border px-3 py-2" />
        </div>
        <div class="flex items-center justify-between">
            <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">Sudah punya akun?</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Register</button>
        </div>
    </form>
</div>
@endsection
