<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'KostCloud' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto px-4 py-6">
        <header class="flex items-center justify-between mb-8">
            <div>
                <a href="{{ url('/') }}" class="text-2xl font-bold text-gray-900">KostCloud</a>
                <p class="text-sm text-gray-500">Sistem manajemen kost berbasis Laravel</p>
            </div>
            <nav class="flex items-center gap-4">
                @auth
                    <span class="text-sm text-gray-600">Halo, {{ auth()->user()->name }}</span>
                    <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">Dashboard</a>
                    <a href="{{ route('kost.index') }}" class="text-blue-600 hover:underline">Daftar Kost</a>
                    <a href="{{ route('profile') }}" class="text-blue-600 hover:underline">Profil</a>
                    <a href="{{ route('kost.create') }}" class="text-blue-600 hover:underline">Tambah Kost</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-600 hover:underline">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>
                @endauth
            </nav>
        </header>

        @if(session('success'))
            <div class="mb-6 rounded-lg bg-green-50 border border-green-200 p-4 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
