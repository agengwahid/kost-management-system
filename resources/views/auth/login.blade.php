<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengelola Kost | Kost Senopati Residence</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex items-center justify-center p-4 selection:bg-emerald-500 selection:text-white relative overflow-hidden">

    <!-- Background glow decor -->
    <div class="absolute -top-40 -left-40 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-teal-500/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-md bg-slate-800/90 border border-slate-700/80 rounded-3xl p-8 shadow-2xl backdrop-blur-xl relative z-10">
        <!-- Brand Logo -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-500 text-white shadow-lg shadow-emerald-500/25 mb-3">
                <i data-lucide="shield-check" class="w-8 h-8"></i>
            </div>
            <h1 class="text-2xl font-black text-white tracking-tight">Portal Pengelola Kost</h1>
            <p class="text-xs text-slate-400 mt-1">Masuk untuk mengelola data kamar, jadwal survey, dan profil kost</p>
        </div>

        @if($errors->any())
        <div class="mb-5 p-3.5 rounded-xl bg-rose-500/15 border border-rose-500/30 text-rose-300 text-xs">
            {{ $errors->first() }}
        </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-xs font-semibold text-slate-300 mb-1.5">Alamat Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 pointer-events-none">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                    </span>
                    <input type="email" id="email" name="email" value="{{ old('email', 'admin@kost.com') }}" required autofocus
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-900/60 border border-slate-700 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
                </div>
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-slate-300 mb-1.5">Kata Sandi (Password)</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 pointer-events-none">
                        <i data-lucide="lock" class="w-4 h-4"></i>
                    </span>
                    <input type="password" id="password" name="password" value="password123" required
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-900/60 border border-slate-700 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
                </div>
            </div>

            <div class="flex items-center justify-between text-xs pt-1">
                <label class="flex items-center gap-2 cursor-pointer text-slate-400 hover:text-slate-300">
                    <input type="checkbox" name="remember" class="rounded border-slate-700 bg-slate-900 text-emerald-500 focus:ring-emerald-500 focus:ring-offset-0">
                    <span>Ingat Saya</span>
                </label>
                <span class="text-emerald-400 text-[11px]">Akun Demo Default Siap Pakai</span>
            </div>

            <button type="submit" class="w-full py-3 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-bold rounded-xl text-sm shadow-lg shadow-emerald-600/30 transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2 mt-4">
                <span>Masuk ke Dashboard</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </button>
        </form>

        <div class="mt-6 pt-6 border-t border-slate-700/60 flex items-center justify-between text-xs">
            <a href="{{ route('home') }}" class="text-slate-400 hover:text-white transition flex items-center gap-1">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i>
                <span>Kembali ke Website</span>
            </a>
            <span class="text-slate-500 text-[11px]">Kost Senopati v1.0</span>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
