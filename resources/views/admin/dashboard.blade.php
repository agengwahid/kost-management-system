@extends('layouts.admin')

@section('title', 'Dashboard Pengelola | Kost Senopati')
@section('page_title', 'Ringkasan Dashboard')

@section('content')
<div class="space-y-8">

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Card 1: Total Kamar -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Tipe Kamar</p>
                <h3 class="text-3xl font-extrabold text-slate-900">{{ $totalRooms }}</h3>
                <span class="text-xs text-slate-500 mt-1 inline-block">Total {{ $totalUnits }} unit fisik</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <i data-lucide="bed" class="w-6 h-6"></i>
            </div>
        </div>

        <!-- Card 2: Kamar Tersedia -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Kamar Kosong</p>
                <h3 class="text-3xl font-extrabold text-emerald-600">{{ $availableUnits }}</h3>
                <span class="text-xs text-emerald-600 mt-1 inline-block font-medium">Siap disewa penghuni baru</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <i data-lucide="key" class="w-6 h-6"></i>
            </div>
        </div>

        <!-- Card 3: Pending Surveys -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Survey Baru</p>
                <h3 class="text-3xl font-extrabold text-amber-600">{{ $pendingSurveys }}</h3>
                <span class="text-xs text-amber-600 mt-1 inline-block font-medium">Perlu dikonfirmasi</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center">
                <i data-lucide="calendar-alert" class="w-6 h-6"></i>
            </div>
        </div>

        <!-- Card 4: Total Permintaan -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Total Peminat</p>
                <h3 class="text-3xl font-extrabold text-teal-600">{{ $totalSurveys }}</h3>
                <span class="text-xs text-slate-500 mt-1 inline-block">Calon penghuni survey</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center">
                <i data-lucide="users" class="w-6 h-6"></i>
            </div>
        </div>
    </div>

    <!-- Quick Action Banner -->
    <div class="bg-gradient-to-r from-slate-900 to-slate-800 text-white rounded-3xl p-6 sm:p-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 shadow-xl">
        <div class="space-y-1 max-w-xl">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                Aksi Cepat Pengelola
            </span>
            <h3 class="text-xl font-bold text-white">Kelola Ketersediaan Kamar & Hubungi Calon Penghuni</h3>
            <p class="text-sm text-slate-300">
                Pastikan unit kamar dan nomor WhatsApp selalu update agar calon penghuni dapat langsung terhubung.
            </p>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.rooms.create') }}" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-500 text-white text-xs sm:text-sm font-bold rounded-xl shadow transition flex items-center gap-2">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>Tambah Tipe Kamar</span>
            </a>
            <a href="{{ route('admin.surveys.index') }}" class="px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-white text-xs sm:text-sm font-bold rounded-xl shadow transition flex items-center gap-2">
                <i data-lucide="list-filter" class="w-4 h-4"></i>
                <span>Lihat Semua Survey</span>
            </a>
        </div>
    </div>

    <!-- Tables Grid: Recent Surveys & Quick Room Overview -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Surveys (2 Cols) -->
        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-base font-bold text-slate-900">Permintaan Survey Terbaru</h3>
                    <p class="text-xs text-slate-500">Daftar calon penghuni yang baru mendaftar survey</p>
                </div>
                <a href="{{ route('admin.surveys.index') }}" class="text-xs font-bold text-emerald-600 hover:text-emerald-700 flex items-center gap-1">
                    <span>Semua Survey</span>
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 text-xs uppercase font-bold text-slate-500 border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-3.5">Calon Penghuni</th>
                            <th class="px-6 py-3.5">Kamar Minat</th>
                            <th class="px-6 py-3.5">Tgl & Jam</th>
                            <th class="px-6 py-3.5">Status</th>
                            <th class="px-6 py-3.5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($recentSurveys as $survey)
                        <tr class="hover:bg-slate-50/70 transition">
                            <td class="px-6 py-4">
                                <div class="font-bold text-slate-900">{{ $survey->name }}</div>
                                <div class="text-xs text-slate-500">{{ $survey->phone }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-xs font-medium text-slate-800">
                                    {{ $survey->room ? $survey->room->name : ($survey->room_type_interest ?: 'Umum') }}
                                </span>
                                <div class="text-[11px] text-slate-400">Rencana: {{ $survey->duration_plan }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-xs font-semibold text-slate-800">
                                    {{ \Carbon\Carbon::parse($survey->survey_date)->format('d M Y') }}
                                </div>
                                <div class="text-[11px] text-slate-500">{{ $survey->survey_time }}</div>
                            </td>
                            <td class="px-6 py-4">
                                @if($survey->status === 'pending')
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-amber-100 text-amber-800">
                                    Menunggu
                                </span>
                                @elseif($survey->status === 'confirmed')
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-blue-800">
                                    Dikonfirmasi
                                </span>
                                @elseif($survey->status === 'completed')
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">
                                    Selesai
                                </span>
                                @else
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-slate-100 text-slate-800">
                                    Dibatalkan
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <a href="{{ $survey->whatsapp_url }}" target="_blank" class="inline-flex items-center gap-1 px-3 py-1.5 bg-emerald-50 text-emerald-700 hover:bg-emerald-600 hover:text-white rounded-lg text-xs font-bold transition">
                                    <i data-lucide="message-circle" class="w-3.5 h-3.5"></i>
                                    <span>Chat WA</span>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-slate-400 text-sm">
                                Belum ada pengajuan survey yang masuk.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Room Quick Status (1 Col) -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-base font-bold text-slate-900">Ketersediaan Kamar</h3>
                    <p class="text-xs text-slate-500">Status kamar terkini</p>
                </div>
                <a href="{{ route('admin.rooms.index') }}" class="text-xs font-bold text-emerald-600 hover:text-emerald-700">
                    Kelola
                </a>
            </div>

            <div class="p-6 divide-y divide-slate-100">
                @foreach($rooms as $room)
                <div class="py-4 first:pt-0 last:pb-0 flex items-center justify-between gap-4">
                    <div class="flex items-center gap-3 min-w-0">
                        <img src="{{ $room->thumbnail }}" alt="{{ $room->name }}" class="w-12 h-12 rounded-xl object-cover shrink-0 border border-slate-100">
                        <div class="truncate">
                            <h4 class="text-sm font-bold text-slate-800 truncate">{{ $room->name }}</h4>
                            <p class="text-xs text-emerald-600 font-semibold">{{ $room->formatted_price_monthly }}/bln</p>
                        </div>
                    </div>
                    <div class="text-right shrink-0">
                        @if($room->is_available && $room->available_units > 0)
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-bold bg-emerald-100 text-emerald-800">
                            Sisa {{ $room->available_units }} Unit
                        </span>
                        @else
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-bold bg-rose-100 text-rose-800">
                            Penuh
                        </span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            <div class="p-4 bg-slate-50 border-t border-slate-100 text-center">
                <a href="{{ route('admin.rooms.create') }}" class="text-xs font-bold text-slate-700 hover:text-emerald-600 inline-flex items-center gap-1.5 transition">
                    <i data-lucide="plus" class="w-3.5 h-3.5"></i> Tambah Tipe Kamar Baru
                </a>
            </div>
        </div>
    </div>

</div>
@endsection
