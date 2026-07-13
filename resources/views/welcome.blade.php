<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>KostCloud</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 py-16">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <div class="p-10 lg:p-16">
                        <span class="inline-flex items-center rounded-full bg-blue-100 px-4 py-1 text-sm font-semibold text-blue-700">Aplikasi Kost Management</span>
                        <h1 class="mt-8 text-4xl font-bold text-gray-900">KostCloud</h1>
                        <p class="mt-6 text-gray-600 leading-8">Kelola daftar kost-mu dengan mudah: tambah, lihat detail, edit, dan hapus properti langsung dari dashboard. Siap pakai untuk deploy di Railway + database Supabase.</p>

                        <div class="mt-10 flex flex-col sm:flex-row sm:items-center sm:gap-4 gap-3">
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center rounded-full bg-green-600 px-6 py-3 text-white font-semibold shadow hover:bg-green-700">Lihat Daftar Kost</a>
                            <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-full bg-blue-600 px-6 py-3 text-white font-semibold shadow hover:bg-blue-700">Login</a>
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-full border border-blue-600 px-6 py-3 text-blue-600 font-semibold hover:bg-blue-50">Register</a>
                        </div>

                        <div class="mt-14 grid gap-4 sm:grid-cols-2">
                            <div class="rounded-2xl border border-gray-200 p-6 bg-gray-50">
                                <h2 class="font-semibold text-gray-900">CRUD Properti</h2>
                                <p class="mt-2 text-gray-600 text-sm">Tambah, edit, hapus, dan lihat detail kost dengan cepat.</p>
                            </div>
                            <div class="rounded-2xl border border-gray-200 p-6 bg-gray-50">
                                <h2 class="font-semibold text-gray-900">Autentikasi</h2>
                                <p class="mt-2 text-gray-600 text-sm">Hanya pengguna terdaftar yang bisa mengelola properti.</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-blue-600 text-white p-10 lg:p-16">
                        <div class="rounded-[2rem] bg-white/10 p-6">
                            <h2 class="text-3xl font-semibold">Dashboard Kost</h2>
                            <p class="mt-4 text-blue-100 leading-7">Mulai dengan membuat akun, lalu masuk untuk mengelola properti kost dan melihat ringkasan real time.</p>
                        </div>
                        <div class="mt-10 grid gap-4">
                            <div class="rounded-3xl bg-white/10 p-6">
                                <p class="text-sm uppercase tracking-[0.3em] text-blue-100">Cepat & Mudah</p>
                                <p class="mt-3 text-white text-xl font-semibold">Manajemen kost dalam satu tempat.</p>
                            </div>
                            <div class="rounded-3xl bg-white/10 p-6">
                                <p class="text-sm uppercase tracking-[0.3em] text-blue-100">Deployment</p>
                                <p class="mt-3 text-white text-xl font-semibold">Siap deploy via Railway dan Supabase.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
