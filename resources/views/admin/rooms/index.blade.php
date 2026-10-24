@extends('layouts.admin')

@section('title', 'Kelola Kamar | Kost Senopati')
@section('page_title', 'Kelola Tipe Kamar')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-xl font-black text-slate-900">Daftar Tipe Kamar</h3>
            <p class="text-xs text-slate-500">Kelola informasi, harga, ketersediaan unit, dan fasilitas masing-masing kamar</p>
        </div>
        <a href="{{ route('admin.rooms.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm rounded-xl shadow-md transition">
            <i data-lucide="plus" class="w-4 h-4"></i>
            <span>Tambah Kamar Baru</span>
        </a>
    </div>

    <!-- Rooms Table Card -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs uppercase font-bold text-slate-500 border-b border-slate-100">
                    <tr>
                        <th class="px-6 py-4">Foto & Kamar</th>
                        <th class="px-6 py-4">Tipe & Ukuran</th>
                        <th class="px-6 py-4">Harga Sewa</th>
                        <th class="px-6 py-4">Ketersediaan Unit</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($rooms as $room)
                    <tr class="hover:bg-slate-50/70 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <img src="{{ $room->thumbnail }}" alt="{{ $room->name }}" class="w-14 h-14 rounded-xl object-cover shrink-0 border border-slate-100 shadow-xs">
                                <div>
                                    <h4 class="font-bold text-slate-900 text-sm">{{ $room->name }}</h4>
                                    <div class="flex items-center gap-2 mt-0.5">
                                        <span class="text-[11px] text-slate-500">{{ $room->bed_type }}</span>
                                        @if($room->is_featured)
                                        <span class="px-1.5 py-0.5 rounded text-[10px] font-bold bg-amber-100 text-amber-800">Unggulan</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-lg text-xs font-bold {{ $room->type === 'Deluxe' ? 'bg-purple-100 text-purple-800' : ($room->type === 'Superior' ? 'bg-blue-100 text-blue-800' : 'bg-slate-100 text-slate-800') }}">
                                {{ $room->type }}
                            </span>
                            <div class="text-xs text-slate-500 mt-1">Ukuran: {{ $room->size }}</div>
                            <div class="text-[11px] text-slate-400">{{ $room->bathroom_type }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-bold text-emerald-600 text-sm">{{ $room->formatted_price_monthly }} <span class="text-xs font-normal text-slate-400">/bln</span></div>
                            @if($room->price_yearly)
                            <div class="text-[11px] text-slate-500">{{ $room->formatted_price_yearly }} /thn</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-xs font-semibold text-slate-800">
                                Sisa <span class="font-bold {{ $room->available_units > 0 ? 'text-emerald-600' : 'text-rose-600' }}">{{ $room->available_units }}</span> dari {{ $room->total_units }} Unit
                            </div>
                            <div class="w-24 bg-slate-200 rounded-full h-1.5 mt-1.5 overflow-hidden">
                                @php
                                    $percent = $room->total_units > 0 ? ($room->available_units / $room->total_units) * 100 : 0;
                                @endphp
                                <div class="h-1.5 rounded-full {{ $room->available_units > 0 ? 'bg-emerald-500' : 'bg-rose-500' }}" style="width: {{ $percent }}%"></div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('admin.rooms.toggle', $room) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" title="Klik untuk mengubah status ketersediaan" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold transition {{ $room->is_available && $room->available_units > 0 ? 'bg-emerald-100 text-emerald-800 hover:bg-emerald-200' : 'bg-rose-100 text-rose-800 hover:bg-rose-200' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $room->is_available && $room->available_units > 0 ? 'bg-emerald-600' : 'bg-rose-600' }}"></span>
                                    <span>{{ $room->is_available && $room->available_units > 0 ? 'Tersedia' : 'Penuh' }}</span>
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap space-x-1">
                            <a href="{{ route('admin.rooms.edit', $room) }}" class="inline-flex items-center gap-1 px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-xs font-bold transition">
                                <i data-lucide="edit-3" class="w-3.5 h-3.5"></i>
                                <span>Edit</span>
                            </a>
                            <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tipe kamar ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1 px-2.5 py-1.5 bg-rose-50 hover:bg-rose-600 hover:text-white text-rose-600 rounded-lg text-xs font-bold transition">
                                    <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                            Belum ada tipe kamar yang ditambahkan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($rooms->hasPages())
        <div class="p-4 border-t border-slate-100">
            {{ $rooms->links() }}
        </div>
        @endif
    </div>

</div>
@endsection
