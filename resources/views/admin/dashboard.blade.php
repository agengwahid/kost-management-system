@extends('layouts.admin')

@section('title', 'Ikhtisar Operasional | Senopati Residence')
@section('page_title', 'Ikhtisar Operasional')

@section('content')
<div class="space-y-8">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="font-serif-title text-2xl sm:text-3xl font-bold text-stone-900 tracking-tight">
                Ringkasan Pengelolaan Kost
            </h2>
            <p class="text-xs text-stone-500 mt-1">
                Pantau ketersediaan unit fisik, permohonan survei calon penghuni, dan profil properti dalam satu panel.
            </p>
        </div>

        <div class="flex items-center gap-2.5">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200/80 text-xs font-semibold">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Sistem Operasional Aktif</span>
            </span>
        </div>
    </div>

    @php
        $occupiedUnits = max(0, $totalUnits - $availableUnits);
        $occupancyRate = $totalUnits > 0 ? round(($occupiedUnits / $totalUnits) * 100) : 0;
    @endphp

    <!-- Executive KPI Metric Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <!-- Metric 1: Okupansi -->
        <div class="bg-white p-5 sm:p-6 rounded-2xl border border-stone-200/90 shadow-xs flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-3">
                    <span class="text-[10px] font-bold text-stone-500 uppercase tracking-[0.15em]">Tingkat Okupansi</span>
                    <span class="w-8 h-8 rounded-lg bg-stone-100 text-stone-700 flex items-center justify-center">
                        <i data-lucide="pie-chart" class="w-4 h-4"></i>
                    </span>
                </div>
                <div class="flex items-baseline gap-2">
                    <h3 class="font-serif-title text-3xl font-bold text-stone-900">{{ $occupancyRate }}%</h3>
                    <span class="text-xs font-semibold text-stone-500">terisi</span>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-stone-100">
                <div class="w-full bg-stone-100 rounded-full h-1.5 overflow-hidden">
                    <div class="h-1.5 rounded-full bg-[#16382B]" style="width: {{ $occupancyRate }}%"></div>
                </div>
                <p class="text-[11px] text-stone-500 mt-2 flex justify-between">
                    <span>{{ $occupiedUnits }} unit terisi</span>
                    <span class="font-medium text-stone-700">{{ $totalUnits }} total unit</span>
                </p>
            </div>
        </div>

        <!-- Metric 2: Unit Tersedia -->
        <div class="bg-white p-5 sm:p-6 rounded-2xl border border-stone-200/90 shadow-xs flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-3">
                    <span class="text-[10px] font-bold text-stone-500 uppercase tracking-[0.15em]">Unit Siap Sewa</span>
                    <span class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center">
                        <i data-lucide="key" class="w-4 h-4"></i>
                    </span>
                </div>
                <div class="flex items-baseline gap-2">
                    <h3 class="font-serif-title text-3xl font-bold text-[#16382B]">{{ $availableUnits }}</h3>
                    <span class="text-xs font-semibold text-stone-500">kamar kosong</span>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-stone-100 flex items-center justify-between text-[11px]">
                <span class="text-stone-500">Dari {{ $totalRooms }} tipe kamar aktif</span>
                <span class="font-semibold {{ $availableUnits > 0 ? 'text-emerald-700' : 'text-rose-700' }}">
                    {{ $availableUnits > 0 ? 'Siap Huni' : 'Kamar Penuh' }}
                </span>
            </div>
        </div>

        <!-- Metric 3: Permintaan Survei -->
        <div class="bg-white p-5 sm:p-6 rounded-2xl border border-stone-200/90 shadow-xs flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-3">
                    <span class="text-[10px] font-bold text-stone-500 uppercase tracking-[0.15em]">Survei Perlu Konfirmasi</span>
                    <span class="w-8 h-8 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center">
                        <i data-lucide="calendar" class="w-4 h-4"></i>
                    </span>
                </div>
                <div class="flex items-baseline gap-2">
                    <h3 class="font-serif-title text-3xl font-bold text-amber-600">{{ $pendingSurveys }}</h3>
                    <span class="text-xs font-semibold text-stone-500">jadwal baru</span>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-stone-100 flex items-center justify-between text-[11px]">
                <span class="text-stone-500">Akumulasi peminat</span>
                <span class="font-bold text-stone-700">{{ $totalSurveys }} pengajuan</span>
            </div>
        </div>

        <!-- Metric 4: WhatsApp Gateway -->
        <div class="bg-white p-5 sm:p-6 rounded-2xl border border-stone-200/90 shadow-xs flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-3">
                    <span class="text-[10px] font-bold text-stone-500 uppercase tracking-[0.15em]">Layanan Tamu</span>
                    <span class="w-8 h-8 rounded-lg bg-[#0B2017] text-amber-200 flex items-center justify-center">
                        <i data-lucide="phone" class="w-4 h-4"></i>
                    </span>
                </div>
                <h4 class="font-serif-title text-lg font-bold text-stone-900 truncate">+{{ $setting->phone_wa }}</h4>
                <p class="text-[11px] text-stone-500 truncate mt-0.5">{{ $setting->kost_name }}</p>
            </div>
            <div class="mt-4 pt-3 border-t border-stone-100 flex items-center justify-between text-[11px]">
                <span class="text-stone-500">{{ $setting->city }}</span>
                <a href="{{ route('admin.settings.index') }}" class="font-semibold text-[#16382B] hover:underline">Ubah Profil</a>
            </div>
        </div>

    </div>

    <!-- Editorial Executive Action Strip -->
    <div class="bg-[#0B2017] text-white rounded-2xl p-6 sm:p-7 border border-[#16382B] shadow-sm relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div class="space-y-1.5 max-w-xl">
            <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold tracking-wider uppercase bg-[#16382B] text-amber-200 border border-amber-300/20">
                Aksi Cepat Manajemen
            </div>
            <h3 class="font-serif-title text-xl font-bold text-white tracking-tight">
                Pembaruan Unit & Respon Calon Penghuni
            </h3>
            <p class="text-xs text-stone-300 leading-relaxed">
                Segera konfirmasi calon penghuni yang telah memilih waktu survei agar tingkat konversi kamar kost tetap optimal.
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('admin.rooms.create') }}" class="px-4 py-2.5 rounded-xl bg-amber-400 hover:bg-amber-300 text-stone-950 font-bold text-xs tracking-wide shadow-xs transition flex items-center gap-2">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>Tambah Tipe Kamar</span>
            </a>
            <a href="{{ route('admin.surveys.index') }}" class="px-4 py-2.5 rounded-xl bg-[#16382B] hover:bg-[#1E4D3E] text-amber-100 border border-amber-300/20 font-semibold text-xs tracking-wide transition flex items-center gap-2">
                <i data-lucide="calendar-check" class="w-4 h-4"></i>
                <span>Buka Jadwal Survei</span>
            </a>
            <a href="{{ route('admin.gallery.index') }}" class="px-4 py-2.5 rounded-xl text-stone-300 hover:text-white hover:bg-white/5 font-semibold text-xs tracking-wide transition flex items-center gap-2">
                <i data-lucide="image" class="w-4 h-4"></i>
                <span>Galeri Foto</span>
            </a>
        </div>
    </div>

    <!-- Main Dual Column Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left 2 Cols: Recent Surveys -->
        <div class="lg:col-span-2 bg-white rounded-2xl border border-stone-200/90 shadow-xs overflow-hidden flex flex-col justify-between">
            <div>
                <div class="p-5 sm:p-6 border-b border-stone-100 flex items-center justify-between">
                    <div>
                        <h3 class="font-serif-title text-base sm:text-lg font-bold text-stone-900">Permintaan Survei Terkini</h3>
                        <p class="text-xs text-stone-500 mt-0.5">Daftar calon penghuni yang memilih jadwal survei lokasi</p>
                    </div>
                    <a href="{{ route('admin.surveys.index') }}" class="text-xs font-semibold text-[#16382B] hover:text-[#0B2017] flex items-center gap-1 transition">
                        <span>Lihat Semua ({{ $totalSurveys }})</span>
                        <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-stone-600">
                        <thead class="bg-stone-50/70 text-[11px] uppercase font-bold tracking-wider text-stone-500 border-b border-stone-100">
                            <tr>
                                <th class="px-6 py-3.5">Calon Penghuni</th>
                                <th class="px-6 py-3.5">Pilihan Kamar</th>
                                <th class="px-6 py-3.5">Jadwal</th>
                                <th class="px-6 py-3.5">Status</th>
                                <th class="px-6 py-3.5 text-right">Kontak WA</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-100">
                            @forelse($recentSurveys as $survey)
                            <tr class="hover:bg-stone-50/50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-stone-100 text-stone-700 font-bold text-xs flex items-center justify-center shrink-0">
                                            {{ substr($survey->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-stone-900 text-sm">{{ $survey->name }}</p>
                                            <p class="text-xs text-stone-500 font-mono">{{ $survey->phone }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-xs font-semibold text-stone-800 block">
                                        {{ $survey->room ? $survey->room->name : ($survey->room_type_interest ?: 'Pilihan Bebas') }}
                                    </span>
                                    <span class="text-[11px] text-stone-400">Rencana: {{ $survey->duration_plan }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <p class="text-xs font-semibold text-stone-900">
                                        {{ \Carbon\Carbon::parse($survey->survey_date)->translatedFormat('d M Y') }}
                                    </p>
                                    <p class="text-[11px] text-stone-500 flex items-center gap-1 mt-0.5">
                                        <i data-lucide="clock" class="w-3 h-3 text-stone-400"></i>
                                        <span>{{ $survey->survey_time }} WIB</span>
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    @if($survey->status === 'pending')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-50 text-amber-800 border border-amber-200/80">
                                        Menunggu
                                    </span>
                                    @elseif($survey->status === 'confirmed')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-sky-50 text-sky-800 border border-sky-200/80">
                                        Dikonfirmasi
                                    </span>
                                    @elseif($survey->status === 'completed')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-800 border border-emerald-200/80">
                                        Selesai
                                    </span>
                                    @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-stone-100 text-stone-700">
                                        Dibatalkan
                                    </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <a href="{{ $survey->whatsapp_url }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-[#0B2017] hover:bg-[#16382B] text-amber-200 text-xs font-semibold rounded-lg transition border border-amber-300/30">
                                        <i data-lucide="message-circle" class="w-3.5 h-3.5"></i>
                                        <span>Chat WA</span>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-stone-400 text-xs">
                                    Belum ada pengajuan survei baru dari tamu.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="p-4 bg-stone-50/50 border-t border-stone-100 text-right">
                <a href="{{ route('admin.surveys.index') }}" class="text-xs font-semibold text-stone-600 hover:text-stone-900 transition">
                    Buka Halaman Manajemen Survei Lengkap &rarr;
                </a>
            </div>
        </div>

        <!-- Right 1 Col: Room Inventory Snapshot -->
        <div class="bg-white rounded-2xl border border-stone-200/90 shadow-xs overflow-hidden flex flex-col justify-between">
            <div>
                <div class="p-5 sm:p-6 border-b border-stone-100 flex items-center justify-between">
                    <div>
                        <h3 class="font-serif-title text-base sm:text-lg font-bold text-stone-900">Ketersediaan Kamar</h3>
                        <p class="text-xs text-stone-500 mt-0.5">Status unit aktif</p>
                    </div>
                    <a href="{{ route('admin.rooms.index') }}" class="text-xs font-semibold text-[#16382B] hover:text-[#0B2017] transition">
                        Kelola
                    </a>
                </div>

                <div class="p-5 divide-y divide-stone-100">
                    @forelse($rooms as $room)
                    <div class="py-3.5 first:pt-0 last:pb-0 flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3 min-w-0">
                            <img src="{{ $room->thumbnail }}" alt="{{ $room->name }}" class="w-12 h-12 rounded-xl object-cover shrink-0 border border-stone-200/80">
                            <div class="truncate">
                                <h4 class="text-xs font-bold text-stone-900 truncate">{{ $room->name }}</h4>
                                <p class="text-[11px] text-[#16382B] font-semibold mt-0.5">{{ $room->formatted_price_monthly }}/bln</p>
                                <p class="text-[10px] text-stone-400">Total: {{ $room->total_units }} unit</p>
                            </div>
                        </div>

                        <div class="text-right shrink-0">
                            @if($room->is_available && $room->available_units > 0)
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-800 border border-emerald-200/80">
                                Sisa {{ $room->available_units }}
                            </span>
                            @else
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-50 text-rose-800 border border-rose-200/80">
                                Penuh
                            </span>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="py-8 text-center text-stone-400 text-xs">
                        Belum ada tipe kamar. Tambahkan sekarang.
                    </div>
                    @endforelse
                </div>
            </div>

            <div class="p-4 bg-stone-50/50 border-t border-stone-100 text-center">
                <a href="{{ route('admin.rooms.create') }}" class="text-xs font-semibold text-[#16382B] hover:text-stone-900 inline-flex items-center gap-1.5 transition">
                    <i data-lucide="plus" class="w-3.5 h-3.5"></i>
                    <span>Tambah Tipe Kamar Baru</span>
                </a>
            </div>
        </div>

    </div>

</div>
@endsection
