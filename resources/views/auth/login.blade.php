<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Pengelola Kost | Senopati Residence</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif-title { font-family: 'Playfair Display', Georgia, serif; }
    </style>
</head>
<body class="bg-[#0B2017] text-stone-100 min-h-screen flex items-center justify-center p-4 selection:bg-[#1E4D3E] selection:text-white relative overflow-hidden">

    <div class="w-full max-w-md bg-white text-stone-800 rounded-3xl p-8 sm:p-9 shadow-2xl border border-stone-200/90 relative z-10">
        <!-- Brand Logo -->
        <div class="text-center mb-7">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-[#0B2017] text-amber-200 shadow-sm mb-3 border border-[#1B4031]">
                <i data-lucide="building" class="w-5 h-5"></i>
            </div>
            <h1 class="font-serif-title text-2xl font-bold text-stone-900 tracking-tight">Portal Pengelola Kost</h1>
            <p class="text-xs text-stone-500 mt-1">Masuk dengan kredensial pengelola untuk mengakses dashboard</p>
        </div>

        @if($errors->any())
        <div class="mb-5 p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs flex items-center gap-2">
            <i data-lucide="alert-circle" class="w-4 h-4 text-rose-600 shrink-0"></i>
            <span>{{ $errors->first() }}</span>
        </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-xs font-semibold text-stone-700 mb-1.5 uppercase tracking-wider">Alamat Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-stone-400 pointer-events-none">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                    </span>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus
                        class="w-full pl-10 pr-4 py-2.5 bg-stone-50 border border-stone-300 rounded-xl text-stone-900 placeholder-stone-400 text-sm focus:outline-none focus:ring-1 focus:ring-[#0B2017] focus:border-[#0B2017] transition">
                </div>
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-stone-700 mb-1.5 uppercase tracking-wider">Kata Sandi</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-stone-400 pointer-events-none">
                        <i data-lucide="lock" class="w-4 h-4"></i>
                    </span>
                    <input type="password" id="password" name="password" value="" placeholder="Masukkan kata sandi" required
                        class="w-full pl-10 pr-4 py-2.5 bg-stone-50 border border-stone-300 rounded-xl text-stone-900 placeholder-stone-400 text-sm focus:outline-none focus:ring-1 focus:ring-[#0B2017] focus:border-[#0B2017] transition">
                </div>
            </div>

            <div class="flex items-center justify-between text-xs pt-1">
                <label class="flex items-center gap-2 cursor-pointer text-stone-600 hover:text-stone-900">
                    <input type="checkbox" name="remember" class="rounded border-stone-300 text-[#0B2017] focus:ring-0">
                    <span>Ingat saya di perangkat ini</span>
                </label>
            </div>

            <button type="submit" class="w-full py-3 bg-[#0B2017] hover:bg-[#16382B] text-amber-100 font-semibold rounded-xl text-sm shadow-sm transition flex items-center justify-center gap-2 mt-4">
                <span>Masuk ke Dashboard</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </button>
        </form>

        <div class="mt-6 pt-5 border-t border-stone-200 flex items-center justify-between text-xs">
            <a href="{{ route('home') }}" class="text-stone-500 hover:text-stone-800 transition flex items-center gap-1.5">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i>
                <span>Kembali ke Halaman Utama</span>
            </a>
            <span class="text-stone-400 text-[11px]">Senopati Residence</span>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>

