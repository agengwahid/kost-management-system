@extends('layouts.admin')

@section('title', 'Jadwal Survey Masuk | Kost Senopati')
@section('page_title', 'Jadwal & Permintaan Survey')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-xl font-black text-slate-900">Permintaan Survey Calon Penghuni</h3>
            <p class="text-xs text-slate-500">Hubungi calon penghuni melalui WhatsApp dan atur jadwal kunjungan kamar</p>
        </div>

        <!-- Filter Status Badges -->
        <div class="flex flex-wrap gap-2 text-xs font-bold">
            <a href="{{ route('admin.surveys.index') }}" class="px-3 py-1.5 rounded-xl border transition {{ !$status ? 'bg-slate-900 text-white border-slate-900' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50' }}">
                Semua ({{ $counts['all'] }})
            </a>
            <a href="{{ route('admin.surveys.index', ['status' => 'pending']) }}" class="px-3 py-1.5 rounded-xl border transition {{ $status === 'pending' ? 'bg-amber-600 text-white border-amber-600' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50' }}">
                Menunggu ({{ $counts['pending'] }})
            </a>
            <a href="{{ route('admin.surveys.index', ['status' => 'confirmed']) }}" class="px-3 py-1.5 rounded-xl border transition {{ $status === 'confirmed' ? 'bg-blue-600 text-white border-blue-600' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50' }}">
                Dikonfirmasi ({{ $counts['confirmed'] }})
            </a>
            <a href="{{ route('admin.surveys.index', ['status' => 'completed']) }}" class="px-3 py-1.5 rounded-xl border transition {{ $status === 'completed' ? 'bg-emerald-600 text-white border-emerald-600' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50' }}">
                Selesai ({{ $counts['completed'] }})
            </a>
        </div>
    </div>

    <!-- Survey List Card -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs uppercase font-bold text-slate-500 border-b border-slate-100">
                    <tr>
                        <th class="px-6 py-4">Calon Penghuni</th>
                        <th class="px-6 py-4">Kamar Minat</th>
                        <th class="px-6 py-4">Jadwal Survey</th>
                        <th class="px-6 py-4">Durasi Sewa & Catatan</th>
                        <th class="px-6 py-4">Status Survey</th>
                        <th class="px-6 py-4 text-right">Aksi & Kontak</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($surveys as $survey)
                    <tr class="hover:bg-slate-50/70 transition">
                        <td class="px-6 py-4">
                            <div class="font-bold text-slate-900 text-sm">{{ $survey->name }}</div>
                            <div class="text-xs text-slate-500 font-mono mt-0.5">{{ $survey->phone }}</div>
                            <span class="text-[11px] text-slate-400">Diajukan: {{ $survey->created_at->diffForHumans() }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-semibold text-slate-800 text-xs">
                                {{ $survey->room ? $survey->room->name : ($survey->room_type_interest ?: 'Pilihan Umum') }}
                            </div>
                            @if($survey->room)
                            <div class="text-[11px] text-emerald-600 font-semibold">{{ $survey->room->formatted_price_monthly }}/bln</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-xs font-bold text-slate-900">
                                {{ \Carbon\Carbon::parse($survey->survey_date)->translatedFormat('d F Y') }}
                            </div>
                            <div class="text-xs text-emerald-700 font-semibold mt-0.5 flex items-center gap-1">
                                <i data-lucide="clock" class="w-3.5 h-3.5"></i>
                                <span>{{ $survey->survey_time }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 max-w-xs">
                            <span class="inline-block px-2 py-0.5 rounded text-[11px] font-bold bg-slate-100 text-slate-700">
                                {{ $survey->duration_plan }}
                            </span>
                            @if($survey->notes)
                            <p class="text-xs text-slate-500 mt-1 italic line-clamp-2">"{{ $survey->notes }}"</p>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('admin.surveys.status', $survey) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="text-xs font-bold rounded-lg border-slate-200 py-1 px-2.5 cursor-pointer {{ $survey->status === 'pending' ? 'bg-amber-50 text-amber-800 border-amber-200' : ($survey->status === 'confirmed' ? 'bg-blue-50 text-blue-800 border-blue-200' : ($survey->status === 'completed' ? 'bg-emerald-50 text-emerald-800 border-emerald-200' : 'bg-slate-100 text-slate-800')) }}">
                                    <option value="pending" {{ $survey->status === 'pending' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                    <option value="confirmed" {{ $survey->status === 'confirmed' ? 'selected' : '' }}>Dikonfirmasi</option>
                                    <option value="completed" {{ $survey->status === 'completed' ? 'selected' : '' }}>Selesai Survey</option>
                                    <option value="cancelled" {{ $survey->status === 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </form>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap space-x-1.5">
                            <!-- WhatsApp Quick Chat -->
                            <a href="{{ $survey->whatsapp_url }}" target="_blank" class="inline-flex items-center gap-1 px-3.5 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold shadow-xs transition">
                                <i data-lucide="message-circle" class="w-3.5 h-3.5"></i>
                                <span>Hubungi WA</span>
                            </a>

                            <form action="{{ route('admin.surveys.destroy', $survey) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data survey ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                            Tidak ada data survey yang ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($surveys->hasPages())
        <div class="p-4 border-t border-slate-100">
            {{ $surveys->links() }}
        </div>
        @endif
    </div>

</div>
@endsection
