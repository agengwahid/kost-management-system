<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel Pengelola Kost')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-100 text-slate-800 antialiased min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900 text-slate-300 shrink-0 hidden md:flex flex-col justify-between border-r border-slate-800">
        <div>
            <!-- Sidebar Header -->
            <div class="h-20 px-6 flex items-center gap-3 border-b border-slate-800/80 bg-slate-950/40">
                <div class="w-10 h-10 rounded-xl bg-emerald-600 flex items-center justify-center text-white font-bold shadow-md shadow-emerald-500/20">
                    <i data-lucide="shield" class="w-5 h-5"></i>
                </div>
                <div>
                    <h1 class="font-bold text-white text-sm tracking-tight">Admin Panel</h1>
                    <span class="text-xs text-emerald-400 font-medium">Kost Senopati</span>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="p-4 space-y-1.5 text-sm font-medium">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-600 text-white font-semibold shadow-md shadow-emerald-600/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.rooms.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.rooms.*') ? 'bg-emerald-600 text-white font-semibold shadow-md shadow-emerald-600/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
                    <i data-lucide="bed-double" class="w-4 h-4"></i>
                    <span>Kelola Kamar</span>
                </a>
                <a href="{{ route('admin.surveys.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.surveys.*') ? 'bg-emerald-600 text-white font-semibold shadow-md shadow-emerald-600/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
                    <div class="flex items-center gap-3">
                        <i data-lucide="calendar-clock" class="w-4 h-4"></i>
                        <span>Jadwal Survey</span>
                    </div>
                    @php
                        $pendingCount = \App\Models\Survey::where('status', 'pending')->count();
                    @endphp
                    @if($pendingCount > 0)
                    <span class="px-2 py-0.5 text-xs font-bold bg-amber-500 text-slate-950 rounded-full">
                        {{ $pendingCount }}
                    </span>
                    @endif
                <a href="{{ route('admin.gallery.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.gallery.*') ? 'bg-emerald-600 text-white font-semibold shadow-md shadow-emerald-600/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
                    <i data-lucide="image" class="w-4 h-4"></i>
                    <span>Galeri Foto Kost</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.settings.*') ? 'bg-emerald-600 text-white font-semibold shadow-md shadow-emerald-600/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
                    <i data-lucide="settings" class="w-4 h-4"></i>
                    <span>Pengaturan Kost</span>
                </a>

                <div class="pt-4 mt-4 border-t border-slate-800/80">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-400 hover:text-emerald-400 hover:bg-slate-800/40 transition text-xs font-semibold">
                        <i data-lucide="external-link" class="w-4 h-4"></i>
                        <span>Lihat Website Profil</span>
                    </a>
                </div>
            </nav>
        </div>

        <!-- Sidebar Footer & Admin User -->
        <div class="p-4 border-t border-slate-800/80 bg-slate-950/30">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3 min-w-0">
                    <div class="w-9 h-9 rounded-full bg-emerald-700/60 text-emerald-300 font-bold flex items-center justify-center shrink-0 text-sm">
                        {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                    </div>
                    <div class="truncate">
                        <p class="text-xs font-semibold text-white truncate">{{ auth()->user()->name ?? 'Pengelola Kost' }}</p>
                        <p class="text-[11px] text-slate-400 truncate">{{ auth()->user()->email ?? 'admin@kost.com' }}</p>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" title="Keluar" class="p-2 text-slate-400 hover:text-rose-400 hover:bg-rose-500/10 rounded-lg transition">
                        <i data-lucide="log-out" class="w-4 h-4"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Container -->
    <div class="flex-1 flex flex-col min-w-0">
        <!-- Top Navbar -->
        <header class="h-20 bg-white border-b border-slate-200 px-4 sm:px-8 flex items-center justify-between sticky top-0 z-30 shadow-xs">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.dashboard') }}" class="md:hidden flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-emerald-600 text-white flex items-center justify-center">
                        <i data-lucide="shield" class="w-4 h-4"></i>
                    </div>
                </a>
                <h2 class="text-base sm:text-lg font-bold text-slate-800">
                    @yield('page_title', 'Dashboard')
                </h2>
            </div>

            <!-- Header Quick Actions -->
            <div class="flex items-center gap-3">
                <span class="text-xs text-slate-500 hidden sm:inline">
                    {{ now()->translatedFormat('l, d F Y') }}
                </span>
                <a href="{{ route('home') }}" target="_blank" class="px-3.5 py-1.5 rounded-lg border border-slate-300 hover:border-emerald-600 text-slate-700 hover:text-emerald-700 text-xs font-semibold flex items-center gap-1.5 transition">
                    <i data-lucide="globe" class="w-3.5 h-3.5"></i>
                    <span>Pratinjau Web</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="inline md:hidden">
                    @csrf
                    <button type="submit" class="p-2 text-rose-600 hover:bg-rose-50 rounded-lg transition">
                        <i data-lucide="log-out" class="w-4 h-4"></i>
                    </button>
                </form>
            </div>
        </header>

        <!-- Main Body -->
        <main class="flex-1 p-4 sm:p-8 max-w-7xl w-full mx-auto">
            @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center gap-3 shadow-xs">
                <i data-lucide="check-circle" class="w-5 h-5 text-emerald-600 shrink-0"></i>
                <p class="text-sm font-medium">{{ session('success') }}</p>
            </div>
            @endif

            @if($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 shadow-xs">
                <div class="flex items-center gap-2 font-semibold text-sm mb-1">
                    <i data-lucide="alert-circle" class="w-4 h-4 text-rose-600"></i>
                    <span>Terjadi kesalahan input:</span>
                </div>
                <ul class="list-disc list-inside text-xs space-y-1">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Initialize Lucide Icons -->
    <script>
        lucide.createIcons();
    </script>
    @stack('scripts')
</body>
</html>
