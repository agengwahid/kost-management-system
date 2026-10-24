@extends('layouts.admin')

@section('title', 'Pengaturan Profil Kost | Senopati Residence')
@section('page_title', 'Pengaturan Profil Kost')

@section('content')
<div class="max-w-4xl space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h3 class="font-serif-title text-2xl font-bold text-stone-900">Pengaturan Identitas & Kontak Kost</h3>
            <p class="text-xs text-stone-500 mt-0.5">Informasi ini langsung diperbarui di halaman landing page utama dan tombol WhatsApp tamu.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-stone-200/90 p-6 sm:p-8 shadow-xs">
        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Kost -->
                <div>
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Nama Brand Kost <span class="text-rose-500">*</span></label>
                    <input type="text" name="kost_name" value="{{ old('kost_name', $setting->kost_name) }}" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-stone-50/30 transition">
                </div>

                <!-- Tagline -->
                <div>
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Tagline / Slogan <span class="text-rose-500">*</span></label>
                    <input type="text" name="tagline" value="{{ old('tagline', $setting->tagline) }}" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-stone-50/30 transition">
                </div>

                <!-- Nomor WA -->
                <div>
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Nomor WhatsApp Pengelola <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-stone-400 pointer-events-none text-sm font-semibold">+</span>
                        <input type="text" name="phone_wa" value="{{ old('phone_wa', $setting->phone_wa) }}" placeholder="6281234567890" required
                            class="w-full pl-8 pr-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-stone-50/30 transition font-mono">
                    </div>
                    <p class="text-[11px] text-stone-500 mt-1.5">Gunakan format angka internasional (diawali 62, contoh: 6281234567890)</p>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Alamat Email Pengelola</label>
                    <input type="email" name="email" value="{{ old('email', $setting->email) }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-stone-50/30 transition">
                </div>

                <!-- Kota -->
                <div>
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Kota / Wilayah <span class="text-rose-500">*</span></label>
                    <input type="text" name="city" value="{{ old('city', $setting->city) }}" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-stone-50/30 transition">
                </div>

                <!-- Alamat Lengkap -->
                <div class="md:col-span-2">
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Alamat Lengkap Kost <span class="text-rose-500">*</span></label>
                    <textarea name="address" rows="3" required class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-stone-50/30 transition">{{ old('address', $setting->address) }}</textarea>
                </div>

                <!-- Aturan Kost -->
                <div class="md:col-span-2">
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-1">Tata Tertib & Kebijakan Kost (Satu baris per poin)</label>
                    <p class="text-[11px] text-stone-500 mb-2">Tiap baris baru akan ditampilkan sebagai poin tersendiri di halaman utama.</p>
                    @php
                        $rulesText = is_array($setting->rules) ? implode("\n", $setting->rules) : $setting->rules;
                    @endphp
                    <textarea name="rules" rows="6" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm font-mono bg-stone-50/30 transition">{{ old('rules', $rulesText) }}</textarea>
                </div>
            </div>

            <div class="pt-6 border-t border-stone-100 flex items-center justify-end">
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#0B2017] hover:bg-[#16382B] text-amber-200 border border-amber-300/30 text-xs font-semibold shadow-xs transition flex items-center gap-2">
                    <i data-lucide="check" class="w-4 h-4"></i>
                    <span>Simpan Perubahan Profil</span>
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
