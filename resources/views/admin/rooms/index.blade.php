@extends('layouts.admin')

@section('title', 'Kelola Kamar Kost | Senopati Residence')
@section('page_title', 'Kelola Tipe Kamar')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="font-serif-title text-2xl font-bold text-stone-900">Daftar Tipe Kamar</h3>
            <p class="text-xs text-stone-500 mt-0.5">Kelola tarif sewa, ketersediaan unit fisik, fasilitas, dan status tayang kamar.</p>
        </div>
        <a href="{{ route('admin.rooms.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#0B2017] hover:bg-[#16382B] text-amber-200 border border-amber-300/30 font-semibold text-xs rounded-xl shadow-xs transition">
            <i data-lucide="plus" class="w-4 h-4"></i>
            <span>Tambah Kamar Baru</span>
        </a>
    </div>

    <!-- Rooms Table Card -->
    <div class="bg-white rounded-2xl border border-stone-200/90 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-stone-600">
                <thead class="bg-stone-50/70 text-[11px] uppercase font-bold tracking-wider text-stone-500 border-b border-stone-100">
                    <tr>
                        <th class="px-6 py-4">Foto & Kamar</th>
                        <th class="px-6 py-4">Kategori & Dimensi</th>
                        <th class="px-6 py-4">Tarif Sewa</th>
                        <th class="px-6 py-4">Ketersediaan Unit</th>
                        <th class="px-6 py-4">Status Tayang</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($rooms as $room)
                    <tr class="hover:bg-stone-50/50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3.5">
                                <img src="{{ $room->thumbnail }}" alt="{{ $room->name }}" class="w-14 h-14 rounded-xl object-cover shrink-0 border border-stone-200 shadow-xs">
                                <div>
                                    <h4 class="font-bold text-stone-900 text-sm">{{ $room->name }}</h4>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-[11px] text-stone-500">{{ $room->bed_type }}</span>
                                        @if($room->is_featured)
                                        <span class="px-1.5 py-0.5 rounded text-[10px] font-bold bg-amber-100 text-stone-900 border border-amber-300/40">Unggulan</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-lg text-[11px] font-bold {{ $room->type === 'Deluxe' ? 'bg-amber-50 text-amber-900 border border-amber-200' : ($room->type === 'Superior' ? 'bg-emerald-50 text-emerald-900 border border-emerald-200' : 'bg-stone-100 text-stone-800') }}">
                                {{ $room->type }}
                            </span>
                            <div class="text-xs text-stone-600 mt-1.5 font-medium">Ukuran: {{ $room->size }}</div>
                            <div class="text-[11px] text-stone-400">{{ $room->bathroom_type }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-bold text-[#16382B] text-sm">{{ $room->formatted_price_monthly }} <span class="text-xs font-normal text-stone-400">/bln</span></div>
                            @if($room->price_yearly)
                            <div class="text-[11px] text-stone-500 mt-0.5">{{ $room->formatted_price_yearly }} /thn</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-xs font-semibold text-stone-800">
                                Sisa <span class="font-bold {{ $room->available_units > 0 ? 'text-[#16382B]' : 'text-rose-600' }}">{{ $room->available_units }}</span> dari {{ $room->total_units }} Unit
                            </div>
                            <div class="w-28 bg-stone-100 rounded-full h-1.5 mt-2 overflow-hidden border border-stone-200/40">
                                @php
                                    $percent = $room->total_units > 0 ? ($room->available_units / $room->total_units) * 100 : 0;
                                @endphp
                                <div class="h-1.5 rounded-full {{ $room->available_units > 0 ? 'bg-[#16382B]' : 'bg-rose-500' }}" style="width: {{ $percent }}%"></div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('admin.rooms.toggle', $room) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" title="Klik untuk mengubah status ketersediaan" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold transition border {{ $room->is_available && $room->available_units > 0 ? 'bg-emerald-50 text-emerald-800 border-emerald-200 hover:bg-emerald-100' : 'bg-rose-50 text-rose-800 border-rose-200 hover:bg-rose-100' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $room->is_available && $room->available_units > 0 ? 'bg-emerald-600' : 'bg-rose-600' }}"></span>
                                    <span>{{ $room->is_available && $room->available_units > 0 ? 'Tersedia' : 'Penuh' }}</span>
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap space-x-1">
                            <a href="{{ route('admin.rooms.edit', $room) }}" class="inline-flex items-center gap-1 px-3 py-1.5 bg-stone-100 hover:bg-stone-200 text-stone-700 rounded-lg text-xs font-semibold transition">
                                <i data-lucide="edit-3" class="w-3.5 h-3.5"></i>
                                <span>Edit</span>
                            </a>
                            <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tipe kamar ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1 p-1.5 text-stone-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition" title="Hapus Kamar">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-stone-400 text-xs">
                            Belum ada tipe kamar yang ditambahkan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($rooms->hasPages())
        <div class="p-4 border-t border-stone-100">
            {{ $rooms->links() }}
        </div>
        @endif
    </div>

</div>
@endsection
