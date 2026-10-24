<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kost Eksklusif Senopati Residence | Boutique Living & Suites')</title>
    <meta name="description" content="@yield('meta_description', 'Kost eksklusif modern di Senopati Jakarta Selatan. Fasilitas lengkap AC, Kamar Mandi Dalam, Water Heater, WiFi Fiber, Dapur Bersama, Keamanan 24 Jam. Pesan survey sekarang!')">

    <!-- Google Fonts: Playfair Display (Editorial Display) + Plus Jakarta Sans (Clean Modern Body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

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
<body class="bg-[#FBFBF9] text-stone-800 antialiased selection:bg-[#1E4D3E] selection:text-white min-h-screen flex flex-col">

    <!-- Top Concierge Announcement Bar -->
    <div class="bg-[#0F2920] text-stone-200 text-xs py-2.5 px-4 border-b border-[#1A3D31]">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center gap-2.5">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-[#1D4A3A] text-emerald-200 border border-emerald-500/20">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    Unit Terbatas
                </span>
                <span class="text-stone-300 hidden sm:inline text-xs">
                    Tersedia penawaran istimewa potongan biaya sewa s/d 12% untuk reservasi tahunan.
                </span>
            </div>
            <div class="flex items-center gap-5 text-xs text-stone-300">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->phone_wa ?? '6281234567890') }}?text=Halo%20Concierge%20Kost%20Senopati%2C%20saya%20ingin%20konsultasi%20kamar" target="_blank" class="hover:text-white flex items-center gap-1.5 transition">
                    <i data-lucide="phone" class="w-3.5 h-3.5 text-emerald-400"></i>
                    <span class="font-medium">WhatsApp: +{{ $setting->phone_wa ?? '6281234567890' }}</span>
                </a>

                {{-- Tampilkan tombol admin HANYA jika pengelola sedang login --}}
                @auth
                <span class="text-stone-600 hidden sm:inline">|</span>
                <a href="{{ route('admin.dashboard') }}" class="px-2.5 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 hover:bg-emerald-500/30 text-[11px] font-semibold transition flex items-center gap-1">
                    <i data-lucide="shield-check" class="w-3 h-3"></i>
                    <span>Masuk Dashboard</span>
                </a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <header class="sticky top-0 z-40 bg-[#FBFBF9]/95 backdrop-blur-md border-b border-stone-200/80 transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Identity -->
                <a href="{{ route('home') }}" class="flex items-center gap-3.5 group">
                    <div class="w-11 h-11 rounded-xl bg-[#0F2920] border border-[#1A3D31] flex items-center justify-center text-amber-100 shadow-xs group-hover:border-amber-400/40 transition">
                        <i data-lucide="building" class="w-5 h-5 text-amber-200/90"></i>
                    </div>
                    <div>
                        <span class="font-serif-title text-xl font-bold text-stone-900 tracking-tight block">
                            {{ $setting->kost_name ?? 'Senopati Residence' }}
                        </span>
                        <span class="text-[10px] font-semibold uppercase tracking-widest text-[#1E4D3E] block">
                            Boutique Living & Suites
                        </span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center gap-7 text-sm font-medium text-stone-600">
                    <a href="#kamar" class="hover:text-stone-900 transition-colors">Tipe Kamar</a>
                    <a href="#fasilitas" class="hover:text-stone-900 transition-colors">Fasilitas</a>
                    <a href="#simulasi" class="hover:text-stone-900 transition-colors">Kalkulator Sewa</a>
                    <a href="#galeri" class="hover:text-stone-900 transition-colors">Galeri</a>
                    <a href="#lokasi" class="hover:text-stone-900 transition-colors">Lokasi & Akses</a>
                    <a href="#aturan" class="hover:text-stone-900 transition-colors">Tata Tertib</a>
                </nav>

                <!-- Action Button & Auth Badge -->
                <div class="hidden md:flex items-center gap-4">
                    @auth
                    <a href="{{ route('admin.dashboard') }}" class="text-xs font-semibold text-emerald-800 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200 hover:bg-emerald-100 transition flex items-center gap-1.5">
                        <i data-lucide="layout-dashboard" class="w-3.5 h-3.5"></i>
                        <span>Panel Admin</span>
                    </a>
                    @endauth

                    <a href="#survey" class="px-5 py-2.5 rounded-xl bg-[#0F2920] hover:bg-[#163B2F] text-white text-xs font-semibold tracking-wide shadow-sm hover:shadow transition flex items-center gap-2">
                        <i data-lucide="calendar" class="w-3.5 h-3.5 text-amber-200"></i>
                        <span>Jadwalkan Survey</span>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center md:hidden">
                    <button id="mobileMenuBtn" type="button" class="p-2.5 rounded-xl text-stone-700 hover:bg-stone-100 focus:outline-none transition" aria-label="Menu">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-[#FBFBF9] border-b border-stone-200 px-6 py-6 shadow-xl transition-all">
            <div class="flex flex-col space-y-3.5 text-sm font-medium text-stone-700">
                <a href="#kamar" class="mobile-nav-link hover:text-stone-900 py-1">Tipe Kamar</a>
                <a href="#fasilitas" class="mobile-nav-link hover:text-stone-900 py-1">Fasilitas Kost</a>
                <a href="#simulasi" class="mobile-nav-link hover:text-stone-900 py-1">Kalkulator Estimasi Sewa</a>
                <a href="#galeri" class="mobile-nav-link hover:text-stone-900 py-1">Galeri Foto</a>
                <a href="#lokasi" class="mobile-nav-link hover:text-stone-900 py-1">Lokasi & Akses Sekitar</a>
                <a href="#aturan" class="mobile-nav-link hover:text-stone-900 py-1">Tata Tertib Kost</a>

                @auth
                <div class="pt-2">
                    <a href="{{ route('admin.dashboard') }}" class="mobile-nav-link w-full py-2.5 px-3 rounded-lg bg-emerald-50 text-emerald-800 text-xs font-semibold flex items-center justify-center gap-2 border border-emerald-200">
                        <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                        <span>Ke Dashboard Admin</span>
                    </a>
                </div>
                @endauth

                <div class="pt-4 border-t border-stone-200 flex flex-col gap-2.5">
                    <a href="#survey" class="mobile-nav-link w-full py-3 text-center rounded-xl bg-[#0F2920] text-white text-xs font-semibold tracking-wide shadow-sm">
                        Jadwalkan Kunjungan Survey
                    </a>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->phone_wa ?? '6281234567890') }}" target="_blank" class="w-full py-2.5 text-center rounded-xl border border-stone-300 text-stone-800 text-xs font-medium hover:bg-stone-50 flex items-center justify-center gap-2">
                        <i data-lucide="message-circle" class="w-4 h-4 text-[#1E4D3E]"></i> Chat WhatsApp Pengelola
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Flash Messages (Survey Success Notification) -->
    @if(session('success'))
    <div class="max-w-4xl mx-auto px-4 mt-6">
        <div class="bg-stone-50 border border-emerald-600/30 text-stone-900 px-6 py-4 rounded-2xl shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-full bg-[#0F2920] text-white flex items-center justify-center shrink-0">
                    <i data-lucide="check" class="w-5 h-5 text-emerald-300"></i>
                </div>
                <div>
                    <h4 class="font-bold text-stone-900 text-sm">Permintaan Survey Berhasil Dikirim!</h4>
                    <p class="text-xs text-stone-600 mt-0.5">{{ session('success') }}</p>
                </div>
            </div>
            @if(session('wa_url'))
            <a href="{{ session('wa_url') }}" target="_blank" class="shrink-0 px-4 py-2 bg-[#1E4D3E] hover:bg-[#163B2F] text-white text-xs font-semibold rounded-xl shadow-xs transition flex items-center gap-2">
                <i data-lucide="message-circle" class="w-4 h-4"></i>
                <span>Lanjutkan ke WhatsApp</span>
            </a>
            @endif
        </div>
    </div>
    @endif

    <!-- Main Content Slot -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Floating Concierge WhatsApp Action -->
    <div class="fixed bottom-6 right-6 z-50 group">
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->phone_wa ?? '6281234567890') }}?text=Halo%20Concierge%20Kost%20Senopati%2C%20saya%20ingin%20konsultasi%20kamar" target="_blank" class="relative flex items-center justify-center w-13 h-13 sm:w-14 sm:h-14 bg-[#0F2920] hover:bg-[#163B2F] text-amber-200 rounded-full shadow-xl shadow-stone-950/20 hover:scale-105 transition-all duration-300 border border-amber-300/20">
            <i data-lucide="message-circle" class="w-6 h-6"></i>
        </a>
        <div class="absolute right-full mr-3 top-1/2 -translate-y-1/2 bg-stone-900 text-stone-100 text-xs font-medium px-3.5 py-1.5 rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition shadow-lg pointer-events-none hidden sm:block border border-stone-800">
            Hubungi Concierge Kost via WhatsApp
        </div>
    </div>

    <!-- Editorial Footer -->
    <footer class="bg-[#0A1A14] text-stone-300 pt-16 pb-10 border-t border-[#132C22]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-14">
                <!-- Col 1: Identity & Philosophy -->
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 rounded-xl bg-[#132C22] border border-stone-700/60 flex items-center justify-center text-amber-200">
                            <i data-lucide="building" class="w-4 h-4"></i>
                        </div>
                        <span class="font-serif-title text-xl font-bold text-white tracking-tight">
                            {{ $setting->kost_name ?? 'Senopati Residence' }}
                        </span>
                    </div>
                    <p class="text-xs text-stone-400 leading-relaxed mb-6 font-light">
                        {{ $setting->tagline ?? 'Hunian eksklusif dengan privasi terjaga, standar fasilitas modern, dan kenyamanan serasa di rumah sendiri di jantung Jakarta Selatan.' }}
                    </p>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-[11px] font-medium bg-[#132C22] text-stone-300 border border-stone-700/60">
                        <i data-lucide="shield-check" class="w-3.5 h-3.5 text-emerald-400"></i>
                        <span>Hunian Terverifikasi & Resmi</span>
                    </div>
                </div>

                <!-- Col 2: Navigation -->
                <div>
                    <h4 class="font-serif-title text-white font-semibold text-base mb-4 tracking-tight">Eksplorasi</h4>
                    <ul class="space-y-2.5 text-xs text-stone-400 font-normal">
                        <li><a href="#kamar" class="hover:text-stone-200 transition">Koleksi Tipe Kamar</a></li>
                        <li><a href="#fasilitas" class="hover:text-stone-200 transition">Fasilitas Kamar & Komunal</a></li>
                        <li><a href="#simulasi" class="hover:text-stone-200 transition">Kalkulator Simulasi Biaya</a></li>
                        <li><a href="#galeri" class="hover:text-stone-200 transition">Galeri Suasana Properti</a></li>
                        <li><a href="#lokasi" class="hover:text-stone-200 transition">Aksesibilitas SCBD & Transportasi</a></li>
                        <li><a href="#aturan" class="hover:text-stone-200 transition">Tata Tertib & Ketentuan Tinggal</a></li>
                    </ul>
                </div>

                <!-- Col 3: Concierge & Address -->
                <div>
                    <h4 class="font-serif-title text-white font-semibold text-base mb-4 tracking-tight">Kontak & Lokasi</h4>
                    <ul class="space-y-3 text-xs text-stone-400">
                        <li class="flex items-start gap-2.5">
                            <i data-lucide="map-pin" class="w-4 h-4 text-amber-200/80 shrink-0 mt-0.5"></i>
                            <span class="leading-relaxed">{{ $setting->address ?? 'Jl. Senopati Raya No. 45, Kebayoran Baru, Jakarta Selatan' }}</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i data-lucide="phone" class="w-4 h-4 text-amber-200/80 shrink-0"></i>
                            <span>+{{ $setting->phone_wa ?? '6281234567890' }}</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i data-lucide="mail" class="w-4 h-4 text-amber-200/80 shrink-0"></i>
                            <span>{{ $setting->email ?? 'concierge@senopatiresidence.com' }}</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i data-lucide="clock" class="w-4 h-4 text-amber-200/80 shrink-0"></i>
                            <span>Waktu Survey: 08:30 – 19:30 WIB</span>
                        </li>
                    </ul>
                </div>

                <!-- Col 4: Visit & Survey Booking -->
                <div>
                    <h4 class="font-serif-title text-white font-semibold text-base mb-4 tracking-tight">Kunjungan Properti</h4>
                    <p class="text-xs text-stone-400 leading-relaxed mb-4">
                        Rasakan langsung atmosfer tenang, pencahayaan alami, dan kebersihan setiap sudut kamar sebelum memutuskan menyewa.
                    </p>
                    <a href="#survey" class="w-full inline-block py-2.5 px-4 bg-[#1A3D31] hover:bg-[#234F3F] text-amber-100 text-center text-xs font-semibold rounded-xl transition border border-[#2B5D4C]">
                        Reservasi Jadwal Survey
                    </a>
                </div>
            </div>

            <!-- Bottom Sub-Footer: Copyright + Discrete Admin Access -->
            <div class="pt-8 border-t border-stone-800/80 flex flex-col sm:flex-row items-center justify-between text-[11px] text-stone-500 gap-4">
                <p>&copy; {{ date('Y') }} {{ $setting->kost_name ?? 'Senopati Residence' }}. Hak Cipta Dilindungi.</p>

                <!-- Discrete Admin Link: Samar, kecil di pojok footer, tidak mengganggu calon penyewa -->
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.dashboard') }}" class="text-stone-500 hover:text-stone-400 transition flex items-center gap-1.5 opacity-60 hover:opacity-100" title="Akses Pengelola Kost">
                        <i data-lucide="lock" class="w-3 h-3"></i>
                        <span>Akses Pengelola</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Initialize Lucide Icons & Mobile Menu Toggle -->
    <script>
        lucide.createIcons();

        const mobileBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileBtn && mobileMenu) {
            mobileBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
            document.querySelectorAll('.mobile-nav-link').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                });
            });
        }
    </script>
    @stack('scripts')
</body>
</html>

