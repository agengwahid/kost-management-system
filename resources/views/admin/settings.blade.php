@extends('layouts.admin')

@section('title', 'Pengaturan Kost | Kost Senopati')
@section('page_title', 'Pengaturan Profil Kost')

@section('content')
<div class="max-w-4xl space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-xl font-black text-slate-900">Pengaturan Identitas & Kontak Kost</h3>
            <p class="text-xs text-slate-500">Informasi ini akan langsung ditampilkan kepada calon penghuni di halaman utama</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-xs">
        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Kost -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nama Brand Kost *</label>
                    <input type="text" name="kost_name" value="{{ old('kost_name', $setting->kost_name) }}" required
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                </div>

                <!-- Tagline -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Tagline / Slogan *</label>
                    <input type="text" name="tagline" value="{{ old('tagline', $setting->tagline) }}" required
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                </div>

                <!-- Nomor WA -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nomor WhatsApp Pengelola *</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 pointer-events-none text-sm">+</span>
                        <input type="text" name="phone_wa" value="{{ old('phone_wa', $setting->phone_wa) }}" placeholder="6281234567890" required
                            class="w-full pl-8 pr-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                    </div>
                    <p class="text-[11px] text-slate-500 mt-1">Gunakan format internasional diawali 62 (contoh: 6281234567890)</p>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Alamat Email Pengelola</label>
                    <input type="email" name="email" value="{{ old('email', $setting->email) }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                </div>

                <!-- Kota -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Kota / Wilayah *</label>
                    <input type="text" name="city" value="{{ old('city', $setting->city) }}" required
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                </div>

                <!-- Alamat Lengkap -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Alamat Lengkap Kost *</label>
                    <textarea name="address" rows="3" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">{{ old('address', $setting->address) }}</textarea>
                </div>

                <!-- Aturan Kost -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Tata Tertib & Aturan Kost (Satu baris per poin)</label>
                    @php
                        $rulesText = is_array($setting->rules) ? implode("\n", $setting->rules) : $setting->rules;
                    @endphp
                    <textarea name="rules" rows="6" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm font-mono">{{ old('rules', $rulesText) }}</textarea>
                    <p class="text-[11px] text-slate-500 mt-1">Setiap baris baru akan ditampilkan sebagai poin aturan pada halaman landing page.</p>
                </div>
            </div>

            <div class="pt-6 border-t border-slate-100 flex items-center justify-end">
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold shadow-md transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
