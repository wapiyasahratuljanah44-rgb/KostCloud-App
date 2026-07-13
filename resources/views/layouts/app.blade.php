<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KostCloud - Hub Manajemen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800">

<div class="flex min-h-screen">

    <aside class="w-64 bg-slate-900 text-white flex-shrink-0 flex flex-col justify-between">
        <div>
            <div class="p-6 border-b border-slate-800 text-center">
                <h1 class="text-2xl font-bold text-blue-400 tracking-wider">KostCloud</h1>
                <p class="text-xs text-slate-500 mt-1">Sistem Manajemen Kost</p>
            </div>
            
            <nav class="mt-6 px-4 space-y-1.5">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition {{ request()->routeIs('dashboard') || request()->routeIs('properties.*') ? 'bg-slate-800 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    📊 <span>Dashboard Utama</span>
                </a>

                <a href="{{ route('rooms.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition {{ request()->routeIs('rooms.*') ? 'bg-slate-800 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    🔑 <span>Data Kamar</span>
                </a>

                <a href="{{ route('tenants.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition {{ request()->routeIs('tenants.*') ? 'bg-slate-800 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    👥 <span>Daftar Penyewa</span>
                </a>

                <a href="{{ route('bookings.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition {{ request()->routeIs('bookings.*') ? 'bg-slate-800 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    💳 <span>Transaksi Booking</span>
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-slate-800">
            @auth
            <form action="{{ url('/logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-3 text-sm font-medium rounded-xl text-red-400 hover:bg-red-950/30 transition flex items-center gap-3">
                    🚪 <span>Keluar Aplikasi</span>
                </button>
            </form>
            @endauth
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0">
        <header class="bg-white border-b border-slate-200">
            <div class="flex justify-between items-center px-8 py-5">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Panel Manajemen Kost</h2>
                    <p class="text-xs text-slate-400">Kelola operasional bisnis kost Anda</p>
                </div>
                <div class="text-right">
                    @auth
                        <p class="text-sm font-semibold text-slate-800">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-slate-400">{{ Auth::user()->email }}</p>
                    @endauth
                </div>
            </div>
        </header>

        <main class="flex-1 p-8 overflow-y-auto">
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-sm font-medium">
                    ✨ {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

</div>

</body>
</html>