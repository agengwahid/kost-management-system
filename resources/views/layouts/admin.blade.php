<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel Pengelola | Senopati Residence')</title>

    <!-- Google Fonts: Playfair Display + Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .font-serif-title {
            font-family: 'Playfair Display', Georgia, serif;
        }
    </style>
</head>
<body class="bg-[#F7F6F2] text-stone-800 antialiased min-h-screen flex selection:bg-[#1E4D3E] selection:text-white">

    <!-- Desktop Sidebar -->
    <aside class="w-64 bg-[#0B2017] text-stone-300 shrink-0 hidden md:flex flex-col justify-between border-r border-[#16382B]">
        <div>
            <!-- Sidebar Header -->
            <div class="h-20 px-6 flex items-center gap-3 border-b border-[#16382B] bg-[#071711]">
                <div class="w-9 h-9 rounded-xl bg-[#16382B] border border-amber-300/30 flex items-center justify-center text-amber-200 font-bold shadow-xs">
                    <i data-lucide="building" class="w-4 h-4"></i>
                </div>
                <div>
                    <h1 class="font-serif-title font-bold text-white text-base tracking-tight leading-tight">Senopati Residence</h1>
                    <span class="text-[10px] text-amber-200/80 font-medium uppercase tracking-wider">Panel Pengelola</span>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="p-3.5 space-y-1 text-xs font-medium">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-[#16382B] text-amber-200 font-semibold shadow-xs' : 'text-stone-300 hover:text-white hover:bg-[#122D22]' }}">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    <span>Ringkasan Dashboard</span>
                </a>
                <a href="{{ route('admin.rooms.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.rooms.*') ? 'bg-[#16382B] text-amber-200 font-semibold shadow-xs' : 'text-stone-300 hover:text-white hover:bg-[#122D22]' }}">
                    <i data-lucide="bed-double" class="w-4 h-4"></i>
                    <span>Kelola Kamar Kost</span>
                </a>
                <a href="{{ route('admin.surveys.index') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.surveys.*') ? 'bg-[#16382B] text-amber-200 font-semibold shadow-xs' : 'text-stone-300 hover:text-white hover:bg-[#122D22]' }}">
                    <div class="flex items-center gap-3">
                        <i data-lucide="calendar" class="w-4 h-4"></i>
                        <span>Jadwal Survey</span>
                    </div>
                    @php
                        $pendingCount = \App\Models\Survey::where('status', 'pending')->count();
                    @endphp
                    @if($pendingCount > 0)
                    <span class="px-2 py-0.5 text-[10px] font-bold bg-amber-400 text-stone-950 rounded-full">
                        {{ $pendingCount }}
                    </span>
                    @endif
                </a>
                <a href="{{ route('admin.gallery.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.gallery.*') ? 'bg-[#16382B] text-amber-200 font-semibold shadow-xs' : 'text-stone-300 hover:text-white hover:bg-[#122D22]' }}">
                    <i data-lucide="image" class="w-4 h-4"></i>
                    <span>Galeri Foto</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.settings.*') ? 'bg-[#16382B] text-amber-200 font-semibold shadow-xs' : 'text-stone-300 hover:text-white hover:bg-[#122D22]' }}">
                    <i data-lucide="settings" class="w-4 h-4"></i>
                    <span>Pengaturan Kost</span>
                </a>

                <div class="pt-4 mt-4 border-t border-[#16382B]">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-stone-400 hover:text-amber-200 hover:bg-[#122D22] transition text-xs">
                        <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                        <span>Lihat Website Tamu</span>
                    </a>
                </div>
            </nav>
        </div>

        <!-- Sidebar Footer & Admin User -->
        <div class="p-3.5 border-t border-[#16382B] bg-[#071711]">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2.5 min-w-0">
                    <div class="w-8 h-8 rounded-full bg-[#16382B] text-amber-200 font-bold flex items-center justify-center shrink-0 text-xs border border-amber-300/30">
                        {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                    </div>
                    <div class="truncate">
                        <p class="text-xs font-semibold text-white truncate">{{ auth()->user()->name ?? 'Pengelola' }}</p>
                        <p class="text-[10px] text-stone-400 truncate">{{ auth()->user()->email ?? 'admin@kost.com' }}</p>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" title="Keluar" class="p-1.5 text-stone-400 hover:text-rose-300 hover:bg-rose-500/10 rounded-lg transition">
                        <i data-lucide="log-out" class="w-4 h-4"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-w-0">
        <!-- Top Navbar -->
        <header class="h-18 bg-white/95 backdrop-blur-md border-b border-stone-200/90 px-4 sm:px-8 flex items-center justify-between sticky top-0 z-30 shadow-xs">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.dashboard') }}" class="md:hidden flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-[#0B2017] text-amber-200 flex items-center justify-center">
                        <i data-lucide="building" class="w-4 h-4"></i>
                    </div>
                </a>
                <h2 class="font-serif-title text-lg sm:text-xl font-bold text-stone-900 tracking-tight">
                    @yield('page_title', 'Dashboard')
                </h2>
            </div>

            <!-- Header Quick Actions -->
            <div class="flex items-center gap-3">
                <span class="text-xs text-stone-500 hidden sm:flex items-center gap-1.5">
                    <i data-lucide="calendar" class="w-3.5 h-3.5 text-[#1E4D3E]"></i>
                    <span>{{ now()->translatedFormat('l, d F Y') }}</span>
                </span>
                <a href="{{ route('home') }}" target="_blank" class="px-3 py-1.5 rounded-xl border border-stone-300 hover:border-stone-400 text-stone-700 hover:text-stone-900 text-xs font-semibold flex items-center gap-1.5 transition bg-white shadow-xs">
                    <i data-lucide="globe" class="w-3.5 h-3.5 text-[#1E4D3E]"></i>
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

        <!-- Main Body Content -->
        <main class="flex-1 p-4 sm:p-8 max-w-7xl w-full mx-auto">
            @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-white border border-emerald-500/40 text-stone-900 flex items-center gap-3 shadow-xs">
                <div class="w-7 h-7 rounded-full bg-[#1E4D3E] text-white flex items-center justify-center shrink-0">
                    <i data-lucide="check" class="w-4 h-4 text-emerald-300"></i>
                </div>
                <p class="text-xs font-medium text-stone-800">{{ session('success') }}</p>
            </div>
            @endif

            @if(isset($errors) && $errors->any())
            <div class="mb-6 p-4 rounded-xl bg-white border border-rose-400 text-stone-800 shadow-xs">
                <div class="flex items-center gap-2 font-semibold text-xs text-rose-800 mb-1">
                    <i data-lucide="alert-circle" class="w-4 h-4 text-rose-600"></i>
                    <span>Terjadi kesalahan input data:</span>
                </div>
                <ul class="list-disc list-inside text-xs text-rose-700 space-y-0.5">
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

