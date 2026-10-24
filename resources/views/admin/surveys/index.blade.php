@extends('layouts.admin')

@section('title', 'Jadwal Survei Masuk | Senopati Residence')
@section('page_title', 'Jadwal & Permintaan Survei')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="font-serif-title text-2xl font-bold text-stone-900">Permintaan Survei Calon Penghuni</h3>
            <p class="text-xs text-stone-500 mt-0.5">Hubungi calon penghuni melalui WhatsApp dan atur konfirmasi kunjungan lokasi.</p>
        </div>

        <!-- Filter Status Badges -->
        <div class="flex flex-wrap gap-2 text-xs font-semibold">
            <a href="{{ route('admin.surveys.index') }}" class="px-3.5 py-1.5 rounded-xl border transition {{ !$status ? 'bg-[#0B2017] text-amber-200 border-[#0B2017]' : 'bg-white text-stone-600 border-stone-200 hover:bg-stone-50' }}">
                Semua ({{ $counts['all'] }})
            </a>
            <a href="{{ route('admin.surveys.index', ['status' => 'pending']) }}" class="px-3.5 py-1.5 rounded-xl border transition {{ $status === 'pending' ? 'bg-amber-500 text-stone-950 font-bold border-amber-500' : 'bg-white text-stone-600 border-stone-200 hover:bg-stone-50' }}">
                Menunggu ({{ $counts['pending'] }})
            </a>
            <a href="{{ route('admin.surveys.index', ['status' => 'confirmed']) }}" class="px-3.5 py-1.5 rounded-xl border transition {{ $status === 'confirmed' ? 'bg-sky-600 text-white border-sky-600' : 'bg-white text-stone-600 border-stone-200 hover:bg-stone-50' }}">
                Dikonfirmasi ({{ $counts['confirmed'] }})
            </a>
            <a href="{{ route('admin.surveys.index', ['status' => 'completed']) }}" class="px-3.5 py-1.5 rounded-xl border transition {{ $status === 'completed' ? 'bg-[#16382B] text-amber-200 border-[#16382B]' : 'bg-white text-stone-600 border-stone-200 hover:bg-stone-50' }}">
                Selesai ({{ $counts['completed'] }})
            </a>
        </div>
    </div>

    <!-- Survey List Card -->
    <div class="bg-white rounded-2xl border border-stone-200/90 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-stone-600">
                <thead class="bg-stone-50/70 text-[11px] uppercase font-bold tracking-wider text-stone-500 border-b border-stone-100">
                    <tr>
                        <th class="px-6 py-4">Calon Penghuni</th>
                        <th class="px-6 py-4">Minat Kamar</th>
                        <th class="px-6 py-4">Jadwal Kunjungan</th>
                        <th class="px-6 py-4">Durasi & Catatan</th>
                        <th class="px-6 py-4">Status Survei</th>
                        <th class="px-6 py-4 text-right">Kontak & Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($surveys as $survey)
                    <tr class="hover:bg-stone-50/50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-stone-100 text-stone-700 font-bold text-xs flex items-center justify-center shrink-0">
                                    {{ substr($survey->name, 0, 1) }}
                                </div>
                                <div>
                                    <div class="font-bold text-stone-900 text-sm">{{ $survey->name }}</div>
                                    <div class="text-xs text-stone-500 font-mono mt-0.5">{{ $survey->phone }}</div>
                                    <span class="text-[10px] text-stone-400">Diajukan: {{ $survey->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-semibold text-stone-800 text-xs">
                                {{ $survey->room ? $survey->room->name : ($survey->room_type_interest ?: 'Pilihan Bebas') }}
                            </div>
                            @if($survey->room)
                            <div class="text-[11px] text-[#16382B] font-semibold mt-0.5">{{ $survey->room->formatted_price_monthly }}/bln</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-xs font-bold text-stone-900">
                                {{ \Carbon\Carbon::parse($survey->survey_date)->translatedFormat('d F Y') }}
                            </div>
                            <div class="text-xs text-[#16382B] font-semibold mt-0.5 flex items-center gap-1">
                                <i data-lucide="clock" class="w-3.5 h-3.5"></i>
                                <span>{{ $survey->survey_time }} WIB</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 max-w-xs">
                            <span class="inline-block px-2.5 py-0.5 rounded text-[11px] font-medium bg-stone-100 text-stone-700">
                                {{ $survey->duration_plan }}
                            </span>
                            @if($survey->notes)
                            <p class="text-xs text-stone-500 mt-1 italic line-clamp-2">"{{ $survey->notes }}"</p>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('admin.surveys.status', $survey) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="text-xs font-semibold rounded-lg border-stone-200 py-1.5 px-3 cursor-pointer {{ $survey->status === 'pending' ? 'bg-amber-50 text-amber-900 border-amber-300' : ($survey->status === 'confirmed' ? 'bg-sky-50 text-sky-900 border-sky-300' : ($survey->status === 'completed' ? 'bg-emerald-50 text-emerald-900 border-emerald-300' : 'bg-stone-100 text-stone-800')) }}">
                                    <option value="pending" {{ $survey->status === 'pending' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                    <option value="confirmed" {{ $survey->status === 'confirmed' ? 'selected' : '' }}>Dikonfirmasi</option>
                                    <option value="completed" {{ $survey->status === 'completed' ? 'selected' : '' }}>Selesai Survei</option>
                                    <option value="cancelled" {{ $survey->status === 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </form>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap space-x-2">
                            <!-- WhatsApp Quick Chat -->
                            <a href="{{ $survey->whatsapp_url }}" target="_blank" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 bg-[#0B2017] hover:bg-[#16382B] text-amber-200 rounded-xl text-xs font-semibold shadow-xs transition border border-amber-300/30">
                                <i data-lucide="message-circle" class="w-3.5 h-3.5"></i>
                                <span>Chat WA</span>
                            </a>

                            <form action="{{ route('admin.surveys.destroy', $survey) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data survei ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 text-stone-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition" title="Hapus Data">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-stone-400 text-xs">
                            Tidak ada permohonan survei yang sesuai filter.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($surveys->hasPages())
        <div class="p-4 border-t border-stone-100">
            {{ $surveys->links() }}
        </div>
        @endif
    </div>

</div>
@endsection
