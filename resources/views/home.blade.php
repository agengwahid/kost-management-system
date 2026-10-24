@extends('layouts.app')

@section('title', ($setting->kost_name ?? 'Kost Eksklusif Senopati Residence') . ' | Boutique Living & Suites')

@section('content')

<!-- ========================================== -->
<!-- 1. HERO SANCTUARY SECTION -->
<!-- ========================================== -->
<section class="relative bg-[#0B2017] text-white overflow-hidden">
    <!-- Subtle architectural background image & gentle warm gradient -->
    <div class="absolute inset-0 z-0">
        <img src="/images/kost/exterior.jpg" alt="Eksterior Senopati Residence" class="w-full h-full object-cover object-center opacity-25">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0B2017] via-[#0B2017]/90 to-[#0B2017]/60"></div>
        <div class="absolute inset-0 editorial-hero-pattern opacity-40"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-20 sm:pt-28 sm:pb-28">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left Narrative (7 Cols) -->
            <div class="lg:col-span-7 space-y-6">
                <!-- Status Badge -->
                <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-[#16382B] border border-[#235341] text-xs text-stone-200">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    <span class="font-medium">Ketersediaan Unit: Sisa <strong class="text-white font-bold">{{ $availableUnitsCount }} Kamar</strong> Siap Huni</span>
                </div>

                <!-- Editorial Headline -->
                <h1 class="font-serif-title text-3xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-white leading-[1.15]">
                    Hunian Kost Butik di Senopati.
                    <span class="italic font-normal font-serif-title text-amber-200/90 block mt-1.5 text-2xl sm:text-4xl lg:text-5xl">
                        Privasi & Ketenangan di Pusat Kota.
                    </span>
                </h1>

                <!-- Subtitle -->
                <p class="text-sm sm:text-base text-stone-300 leading-relaxed max-w-2xl font-light">
                    Dirancang untuk profesional, ekspatriat, dan akademisi yang mendambakan kenyamanan tinggal sekelas apartemen pribadi. Dilengkapi AC dingin, kamar mandi dalam air panas, WiFi 100 Mbps, dapur bersama, dan keamanan terpadu 24 jam.
                </p>

                <!-- Actions -->
                <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-3.5">
                    <a href="#kamar" class="px-6 py-3.5 rounded-xl bg-amber-100 hover:bg-white text-[#0B2017] font-semibold text-xs sm:text-sm tracking-wide shadow-sm hover:shadow transition text-center flex items-center justify-center gap-2">
                        <span>Lihat Pilihan Kamar</span>
                        <i data-lucide="arrow-down" class="w-4 h-4 text-[#0B2017]"></i>
                    </a>
                    <a href="#survey" class="px-6 py-3.5 rounded-xl bg-[#16382B] hover:bg-[#1D4A39] text-stone-200 hover:text-white font-medium text-xs sm:text-sm border border-[#235341] transition text-center flex items-center justify-center gap-2">
                        <i data-lucide="calendar" class="w-4 h-4 text-amber-200"></i>
                        <span>Jadwalkan Survey Gratis</span>
                    </a>
                </div>

                <!-- Subtle Amenities Row -->
                <div class="pt-8 grid grid-cols-2 sm:grid-cols-4 gap-4 border-t border-[#1C3E31]">
                    <div class="space-y-1">
                        <div class="flex items-center gap-2 text-amber-200/90 text-xs font-semibold">
                            <i data-lucide="wifi" class="w-4 h-4"></i>
                            <span>100 Mbps Fiber</span>
                        </div>
                        <p class="text-[11px] text-stone-400">Router stabil tiap lantai</p>
                    </div>

                    <div class="space-y-1">
                        <div class="flex items-center gap-2 text-amber-200/90 text-xs font-semibold">
                            <i data-lucide="shield-check" class="w-4 h-4"></i>
                            <span>Keamanan 24 Jam</span>
                        </div>
                        <p class="text-[11px] text-stone-400">CCTV & Smart Card Pin</p>
                    </div>

                    <div class="space-y-1">
                        <div class="flex items-center gap-2 text-amber-200/90 text-xs font-semibold">
                            <i data-lucide="bath" class="w-4 h-4"></i>
                            <span>Kamar Mandi Dalam</span>
                        </div>
                        <p class="text-[11px] text-stone-400">Water heater air panas 24h</p>
                    </div>

                    <div class="space-y-1">
                        <div class="flex items-center gap-2 text-amber-200/90 text-xs font-semibold">
                            <i data-lucide="utensils" class="w-4 h-4"></i>
                            <span>Dapur Komunal</span>
                        </div>
                        <p class="text-[11px] text-stone-400">Peralatan masak & RO free</p>
                    </div>
                </div>
            </div>

            <!-- Right Visual Card (5 Cols) -->
            <div class="lg:col-span-5 hidden lg:block">
                <div class="relative rounded-3xl p-3 bg-gradient-to-b from-[#1C3E31] to-[#122B22] border border-[#235341] shadow-2xl">
                    <div class="relative rounded-2xl overflow-hidden aspect-4/5">
                        <img src="/images/kost/deluxe.jpg" alt="Interior Kamar Deluxe" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0B2017]/90 via-transparent to-transparent"></div>
                        <div class="absolute bottom-5 left-5 right-5 text-white">
                            <span class="text-[10px] uppercase font-bold tracking-widest px-2.5 py-1 rounded bg-[#0B2017]/80 text-amber-200 mb-2 inline-block border border-amber-300/20">
                                Deluxe Queen Suite
                            </span>
                            <h3 class="font-serif-title text-lg font-bold">Kenyamanan Berstandar Hotel Butik</h3>
                            <p class="text-xs text-stone-300 mt-1 line-clamp-2">Pencahayaan alami melimpah, kasur orthopedic, dan workstation nyaman untuk bekerja dari rumah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- 2. KATALOG & PILIHAN KAMAR RESIDENSI -->
<!-- ========================================== -->
<section id="kamar" class="py-20 sm:py-24 bg-[#FBFBF9] scroll-mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <div class="max-w-xl">
                <span class="text-[11px] font-semibold uppercase tracking-[0.2em] text-[#1E4D3E] block mb-2">
                    Koleksi Tipe Kamar
                </span>
                <h2 class="font-serif-title text-3xl sm:text-4xl font-bold text-stone-900 tracking-tight">
                    Ruang Pribadi yang Dirancang untuk Ketenangan & Produktivitas
                </h2>
                <p class="text-stone-600 text-xs sm:text-sm mt-2 font-normal leading-relaxed">
                    Setiap unit berstatus siap huni (full furnished) dengan fasilitas lengkap, ventilasi alami, dan perabot berkualitas tinggi.
                </p>
            </div>

            <!-- Filter Controls -->
            <div class="flex flex-wrap items-center gap-1.5 p-1 bg-stone-100 rounded-xl border border-stone-200/80 self-start md:self-auto" id="roomFilters">
                <button type="button" onclick="filterRooms('all')" class="filter-btn active px-3.5 py-2 rounded-lg text-xs font-semibold transition bg-[#0B2017] text-amber-100 shadow-xs" data-filter="all">
                    Semua Kamar
                </button>
                <button type="button" onclick="filterRooms('Deluxe')" class="filter-btn px-3.5 py-2 rounded-lg text-xs font-medium transition text-stone-600 hover:text-stone-900" data-filter="Deluxe">
                    Deluxe
                </button>
                <button type="button" onclick="filterRooms('Superior')" class="filter-btn px-3.5 py-2 rounded-lg text-xs font-medium transition text-stone-600 hover:text-stone-900" data-filter="Superior">
                    Superior
                </button>
                <button type="button" onclick="filterRooms('Standard')" class="filter-btn px-3.5 py-2 rounded-lg text-xs font-medium transition text-stone-600 hover:text-stone-900" data-filter="Standard">
                    Standard
                </button>
            </div>
        </div>

        <!-- Room Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="roomsContainer">
            @foreach($rooms as $room)
            <div class="room-card bg-white rounded-2xl border border-stone-200/90 shadow-xs hover:shadow-md transition-all duration-300 flex flex-col overflow-hidden group" data-type="{{ $room->type }}">
                <!-- Thumbnail -->
                <div class="relative h-64 overflow-hidden bg-stone-100">
                    <img src="{{ $room->thumbnail }}" alt="{{ $room->name }}" class="w-full h-full object-cover group-hover:scale-103 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

                    <!-- Top Left Type & Gender Badge -->
                    <div class="absolute top-3.5 left-3.5 flex flex-wrap gap-1.5">
                        <span class="px-2.5 py-1 rounded-md text-[11px] font-semibold bg-white/95 text-stone-900 shadow-xs">
                            {{ $room->type }}
                        </span>
                        <span class="px-2.5 py-1 rounded-md text-[11px] font-medium bg-[#0B2017]/85 text-stone-200">
                            {{ $room->gender_type }}
                        </span>
                    </div>

                    <!-- Top Right Availability Badge -->
                    <div class="absolute top-3.5 right-3.5">
                        @if($room->is_available && $room->available_units > 0)
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-medium bg-[#133A2B] text-emerald-200 border border-emerald-400/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                            Sisa {{ $room->available_units }} Unit
                        </span>
                        @else
                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-medium bg-stone-800/90 text-stone-300">
                            Waiting List
                        </span>
                        @endif
                    </div>

                    <!-- Bottom Specs on image -->
                    <div class="absolute bottom-3 left-3.5 right-3.5 text-stone-200 text-xs flex items-center justify-between font-normal">
                        <span class="flex items-center gap-1.5 bg-black/50 px-2 py-0.5 rounded text-[11px]">
                            <i data-lucide="maximize" class="w-3.5 h-3.5 text-amber-200"></i> {{ $room->size }}
                        </span>
                        <span class="flex items-center gap-1.5 bg-black/50 px-2 py-0.5 rounded text-[11px]">
                            <i data-lucide="bed" class="w-3.5 h-3.5 text-amber-200"></i> {{ $room->bed_type }}
                        </span>
                    </div>
                </div>

                <!-- Room Content -->
                <div class="p-5 sm:p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-serif-title text-xl font-bold text-stone-900 group-hover:text-[#1E4D3E] transition">
                            {{ $room->name }}
                        </h3>
                        <p class="text-stone-500 text-xs mt-1.5 line-clamp-2 leading-relaxed">
                            {{ $room->description }}
                        </p>

                        <!-- Key Facilities Pill List -->
                        <div class="mt-4 flex flex-wrap gap-1.5">
                            @if(is_array($room->facilities))
                                @foreach(array_slice($room->facilities, 0, 4) as $facility)
                                <span class="px-2 py-1 rounded text-[11px] font-normal bg-stone-100 text-stone-700">
                                    {{ $facility }}
                                </span>
                                @endforeach
                                @if(count($room->facilities) > 4)
                                <span class="px-2 py-1 rounded text-[11px] font-medium bg-[#EBF3EF] text-[#1E4D3E]">
                                    +{{ count($room->facilities) - 4 }} lainnya
                                </span>
                                @endif
                            @endif
                        </div>
                    </div>

                    <!-- Price & Action Footer -->
                    <div class="mt-6 pt-4 border-t border-stone-100 flex items-center justify-between gap-4">
                        <div>
                            <span class="text-[10px] font-semibold uppercase tracking-wider text-stone-400 block">Harga Sewa</span>
                            <div class="flex items-baseline gap-1">
                                <span class="font-serif-title text-xl font-bold text-[#0B2017]">{{ $room->formatted_price_monthly }}</span>
                                <span class="text-xs text-stone-500 font-normal">/bln</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <button type="button" onclick="openRoomModal({{ json_encode($room) }})" class="px-3.5 py-2 rounded-xl bg-stone-100 hover:bg-stone-200 text-stone-800 text-xs font-semibold transition flex items-center gap-1.5">
                                <i data-lucide="eye" class="w-3.5 h-3.5 text-stone-600"></i>
                                <span>Detail</span>
                            </button>

                            @php
                                $waText = rawurlencode("Halo Concierge {$setting->kost_name}, saya tertarik dengan tipe kamar *{$room->name}* ({$room->formatted_price_monthly}/bulan). Apakah masih ada unit yang tersedia untuk dijadwalkan survey?");
                                $cleanWA = preg_replace('/[^0-9]/', '', $setting->phone_wa ?? '6281234567890');
                            @endphp
                            <a href="https://wa.me/{{ $cleanWA }}?text={{ $waText }}" target="_blank" class="px-3.5 py-2 rounded-xl bg-[#0B2017] hover:bg-[#16382B] text-amber-100 text-xs font-semibold transition flex items-center gap-1.5">
                                <i data-lucide="message-circle" class="w-3.5 h-3.5"></i>
                                <span>Konsultasi</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- 3. SIMULASI BIAYA SEWA (STUDIO KALKULATOR) -->
<!-- ========================================== -->
<section id="simulasi" class="py-20 bg-[#F4EFE6] text-stone-900 relative scroll-mt-16 border-y border-stone-300/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-[11px] font-semibold uppercase tracking-[0.2em] text-[#1E4D3E] block mb-2">
                Transparansi Biaya
            </span>
            <h2 class="font-serif-title text-3xl sm:text-4xl font-bold text-stone-900 tracking-tight">
                Studio Estimasi Biaya Sewa
            </h2>
            <p class="text-stone-600 text-xs sm:text-sm mt-2 leading-relaxed">
                Rencanakan masa tinggal Anda dengan kalkulasi transparan. Dapatkan potongan harga eksklusif untuk durasi sewa yang lebih panjang.
            </p>
        </div>

        <div class="max-w-4xl mx-auto bg-white border border-stone-200/90 rounded-3xl p-6 sm:p-10 shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
                <!-- Inputs (7 cols) -->
                <div class="md:col-span-7 space-y-6">
                    <!-- Step 1: Pilih Tipe Kamar -->
                    <div>
                        <label class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-2">1. Pilih Tipe Kamar</label>
                        <select id="calcRoom" class="w-full bg-stone-50 border border-stone-300 rounded-xl px-4 py-3 text-stone-900 text-sm focus:ring-1 focus:ring-[#0B2017] focus:border-[#0B2017] focus:outline-none">
                            @foreach($rooms as $room)
                            <option value="{{ $room->price_monthly }}" data-name="{{ $room->name }}">
                                {{ $room->name }} &mdash; {{ $room->formatted_price_monthly }}/bulan
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Step 2: Durasi Sewa -->
                    <div>
                        <label class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-2">2. Durasi Sewa & Potongan Diskon</label>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                            <button type="button" onclick="setDuration(1, 0)" class="duration-btn active py-2.5 px-3 rounded-xl border border-[#0B2017] bg-[#0B2017] text-white font-semibold text-xs text-center transition" data-months="1">
                                1 Bulan
                                <span class="block text-[10px] text-stone-300 font-normal">Reguler</span>
                            </button>
                            <button type="button" onclick="setDuration(3, 0.05)" class="duration-btn py-2.5 px-3 rounded-xl border border-stone-300 bg-stone-50 text-stone-700 font-semibold text-xs text-center transition" data-months="3">
                                3 Bulan
                                <span class="block text-[10px] text-emerald-700 font-medium">Diskon 5%</span>
                            </button>
                            <button type="button" onclick="setDuration(6, 0.08)" class="duration-btn py-2.5 px-3 rounded-xl border border-stone-300 bg-stone-50 text-stone-700 font-semibold text-xs text-center transition" data-months="6">
                                6 Bulan
                                <span class="block text-[10px] text-emerald-700 font-medium">Diskon 8%</span>
                            </button>
                            <button type="button" onclick="setDuration(12, 0.12)" class="duration-btn py-2.5 px-3 rounded-xl border border-stone-300 bg-stone-50 text-stone-700 font-semibold text-xs text-center transition" data-months="12">
                                1 Tahun
                                <span class="block text-[10px] text-emerald-700 font-medium">Diskon 12%</span>
                            </button>
                        </div>
                    </div>

                    <!-- Step 3: Layanan Tambahan (Add-ons) -->
                    <div>
                        <label class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-2">3. Layanan Tambahan Opsional</label>
                        <div class="space-y-2">
                            <label class="flex items-center justify-between p-3.5 rounded-xl bg-stone-50 border border-stone-200 cursor-pointer hover:border-stone-400 transition">
                                <div class="flex items-center gap-3">
                                    <input type="checkbox" id="addCarPark" onchange="calculateTotal()" value="250000" class="w-4 h-4 rounded text-[#0B2017] focus:ring-0 border-stone-300">
                                    <span class="text-xs sm:text-sm font-medium text-stone-800">Slot Parkir Mobil Khusus di Dalam Pagar</span>
                                </div>
                                <span class="text-xs font-bold text-stone-700">+Rp 250.000/bln</span>
                            </label>
                            <label class="flex items-center justify-between p-3.5 rounded-xl bg-stone-50 border border-stone-200 cursor-pointer hover:border-stone-400 transition">
                                <div class="flex items-center gap-3">
                                    <input type="checkbox" id="addLaundry" onchange="calculateTotal()" value="150000" class="w-4 h-4 rounded text-[#0B2017] focus:ring-0 border-stone-300">
                                    <span class="text-xs sm:text-sm font-medium text-stone-800">Laundry Kiloan Rutin & Setrika Rapi</span>
                                </div>
                                <span class="text-xs font-bold text-stone-700">+Rp 150.000/bln</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Outputs Slip (5 cols) -->
                <div class="md:col-span-5 bg-[#0B2017] text-white p-6 sm:p-7 rounded-2xl flex flex-col justify-between space-y-6 shadow-sm">
                    <div>
                        <div class="flex items-center justify-between border-b border-[#1A3D31] pb-3">
                            <span class="text-[11px] uppercase font-bold tracking-wider text-amber-200">Rincian Estimasi Sewa</span>
                            <span class="text-[10px] text-stone-400">Senopati Residence</span>
                        </div>

                        <div class="mt-4 space-y-2.5 text-xs text-stone-300">
                            <div class="flex justify-between">
                                <span class="text-stone-400">Biaya Sewa Pokok:</span>
                                <span id="summaryRoom" class="font-medium text-white">Rp 0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-stone-400">Durasi Masa Sewa:</span>
                                <span id="summaryDuration" class="font-medium text-white">1 Bulan</span>
                            </div>
                            <div class="flex justify-between text-emerald-300" id="discountRow" style="display: none;">
                                <span>Potongan Diskon Durasi:</span>
                                <span id="summaryDiscount" class="font-semibold">- Rp 0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-stone-400">Layanan Tambahan:</span>
                                <span id="summaryAddons" class="font-medium text-white">Rp 0</span>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-[#1A3D31]">
                            <span class="text-[11px] text-stone-400 block">Total Estimasi Pembayaran:</span>
                            <div class="font-serif-title text-2xl sm:text-3xl font-bold text-amber-100 mt-1" id="totalAmount">
                                Rp 0
                            </div>
                            <span class="text-[10px] text-stone-400 block mt-1.5 leading-relaxed">
                                *Sudah termasuk fasilitas WiFi 100 Mbps, air minum RO galon, dan pembersihan komunal setiap hari.
                            </span>
                        </div>
                    </div>

                    <a id="btnSimulasiWA" href="#" target="_blank" class="w-full py-3 bg-amber-100 hover:bg-white text-[#0B2017] font-semibold text-xs sm:text-sm rounded-xl text-center transition flex items-center justify-center gap-2">
                        <i data-lucide="message-circle" class="w-4 h-4 text-[#0B2017]"></i>
                        <span>Konfirmasi Estimasi via WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- 4. FASILITAS KOST TERINTEGRASI -->
<!-- ========================================== -->
<section id="fasilitas" class="py-20 sm:py-24 bg-[#FBFBF9] scroll-mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-[11px] font-semibold uppercase tracking-[0.2em] text-[#1E4D3E] block mb-2">
                Fasilitas Komprehensif
            </span>
            <h2 class="font-serif-title text-3xl sm:text-4xl font-bold text-stone-900 tracking-tight">
                Standar Kenyamanan Tanpa Kompromi
            </h2>
            <p class="text-stone-600 text-xs sm:text-sm mt-2 leading-relaxed">
                Seluruh fasilitas dirawat secara berkala oleh staf internal kami demi menjamin kebersihan, higienitas, dan keamanan optimal warga kost.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            @foreach($facilities as $fGroup)
            <div class="bg-white border border-stone-200/90 rounded-2xl p-7 hover:border-stone-400 transition-all shadow-xs">
                <div class="flex items-center gap-3.5 mb-6">
                    <div class="w-11 h-11 rounded-xl bg-[#0B2017] text-amber-200 flex items-center justify-center">
                        <i data-lucide="{{ $fGroup['icon'] }}" class="w-5 h-5"></i>
                    </div>
                    <h3 class="font-serif-title text-lg font-bold text-stone-900">{{ $fGroup['category'] }}</h3>
                </div>

                <ul class="space-y-4">
                    @foreach($fGroup['items'] as $item)
                    <li class="flex items-start gap-3">
                        <div class="w-4 h-4 rounded-full bg-[#EBF3EF] text-[#1E4D3E] flex items-center justify-center shrink-0 mt-0.5">
                            <i data-lucide="check" class="w-3 h-3"></i>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-stone-800">{{ $item['title'] }}</h4>
                            <p class="text-[11px] text-stone-500 mt-0.5 leading-relaxed">{{ $item['desc'] }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>

        <!-- Featured Communal Card -->
        <div class="mt-12 bg-[#0B2017] rounded-3xl p-8 sm:p-10 text-white overflow-hidden relative">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                <div class="lg:col-span-6 space-y-4">
                    <span class="text-[11px] font-semibold uppercase tracking-wider text-amber-200">
                        Ruang Komunal & Dapur Bersama
                    </span>
                    <h3 class="font-serif-title text-2xl sm:text-3xl font-bold leading-snug">
                        Dapur Modern & Meja Coworking untuk Relaksasi dan Produktivitas
                    </h3>
                    <p class="text-stone-300 text-xs sm:text-sm leading-relaxed font-light">
                        Seduh kopi di pagi hari atau siapkan makan malam dengan tenang. Dapur bersama kami dilengkapi peralatan masak bersih, microwave, kulkas 2 pintu, serta dispenser air RO panas-dingin tanpa batas.
                    </p>
                    <div class="pt-2 flex flex-wrap items-center gap-5 text-xs text-amber-200/90 font-medium">
                        <span class="flex items-center gap-1.5"><i data-lucide="coffee" class="w-4 h-4"></i> Free Air RO 24 Jam</span>
                        <span class="flex items-center gap-1.5"><i data-lucide="wifi" class="w-4 h-4"></i> Koneksi WiFi Kuat</span>
                        <span class="flex items-center gap-1.5"><i data-lucide="sparkles" class="w-4 h-4"></i> Kebersihan Harian Rutin</span>
                    </div>
                </div>
                <div class="lg:col-span-6">
                    <img src="/images/kost/communal.jpg" alt="Dapur & Coworking Kost" class="rounded-2xl shadow-xl border border-white/10 w-full object-cover h-64 sm:h-72">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- 5. GALERI FOTO SUASANA ASLI -->
<!-- ========================================== -->
<section id="galeri" class="py-20 sm:py-24 bg-[#F4EFE6] scroll-mt-16 border-t border-stone-300/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-[11px] font-semibold uppercase tracking-[0.2em] text-[#1E4D3E] block mb-2">
                Dokumentasi Asli
            </span>
            <h2 class="font-serif-title text-3xl sm:text-4xl font-bold text-stone-900 tracking-tight">
                Galeri Suasana Properti
            </h2>
            <p class="text-stone-600 text-xs sm:text-sm mt-2 leading-relaxed">
                Foto nyata tanpa filter berlebihan. Apa yang Anda lihat di foto adalah apa yang akan Anda rasakan saat berkunjung.
            </p>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($gallery as $item)
            <div class="group relative rounded-2xl overflow-hidden bg-stone-200 shadow-xs hover:shadow-md transition-all duration-300 aspect-4/3 cursor-pointer" onclick="openLightbox('{{ $item['image'] }}', '{{ $item['title'] }}')">
                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-transparent to-transparent opacity-80 group-hover:opacity-100 transition"></div>
                <div class="absolute bottom-3.5 left-3.5 right-3.5 text-white">
                    <span class="text-[10px] font-semibold uppercase tracking-wider px-2 py-0.5 rounded bg-black/60 text-stone-200 mb-1 inline-block border border-white/20">
                        {{ $item['category'] }}
                    </span>
                    <h4 class="text-xs font-semibold truncate">{{ $item['title'] }}</h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- 6. LOKASI STRATEGIS & AKSES SEKITAR -->
<!-- ========================================== -->
<section id="lokasi" class="py-20 sm:py-24 bg-[#FBFBF9] scroll-mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left Info (6 Cols) -->
            <div class="lg:col-span-6 space-y-6">
                <div>
                    <span class="text-[11px] font-semibold uppercase tracking-[0.2em] text-[#1E4D3E] block mb-2">
                        Lokasi & Akses
                    </span>
                    <h2 class="font-serif-title text-3xl sm:text-4xl font-bold text-stone-900 tracking-tight">
                        Dekat Pusat Bisnis SCBD, Hemat Waktu Perjalanan
                    </h2>
                    <p class="text-stone-600 text-xs sm:text-sm mt-2 leading-relaxed">
                        Terletak di titik prestisius Senopati, dikelilingi kafe ternama, halte transportasi publik, dan pusat bisnis terpadu Sudirman-Thamrin.
                    </p>
                </div>

                <!-- Strategic Points List -->
                <div class="space-y-2.5">
                    @if(is_array($setting->strategic_locations))
                        @foreach($setting->strategic_locations as $loc)
                        <div class="flex items-center justify-between p-3.5 rounded-xl bg-white border border-stone-200/90 hover:border-stone-400 transition">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-[#EBF3EF] text-[#1E4D3E] flex items-center justify-center shrink-0">
                                    <i data-lucide="{{ $loc['icon'] ?? 'map-pin' }}" class="w-4 h-4"></i>
                                </div>
                                <span class="font-semibold text-stone-800 text-xs sm:text-sm">{{ $loc['name'] }}</span>
                            </div>
                            <span class="text-[11px] font-semibold px-2.5 py-0.5 rounded-full bg-stone-100 text-stone-700">
                                {{ $loc['distance'] }}
                            </span>
                        </div>
                        @endforeach
                    @endif
                </div>

                <!-- Address card -->
                <div class="p-4 rounded-xl bg-stone-100 border border-stone-200 flex items-start gap-3">
                    <i data-lucide="map-pin" class="w-4 h-4 text-[#1E4D3E] shrink-0 mt-0.5"></i>
                    <div>
                        <h4 class="text-[11px] font-bold text-stone-900 uppercase tracking-wider">Alamat Properti</h4>
                        <p class="text-xs text-stone-600 mt-0.5">{{ $setting->address ?? 'Jl. Senopati Raya No. 45, Kebayoran Baru, Jakarta Selatan' }}</p>
                    </div>
                </div>
            </div>

            <!-- Right Map Embed (6 Cols) -->
            <div class="lg:col-span-6">
                <div class="bg-white rounded-2xl overflow-hidden border border-stone-300 shadow-sm aspect-4/3 sm:aspect-16/10">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2736465481716!2d106.80556277573165!3d-6.227606093760431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1505c879953%3A0x6b2b733737b83ebc!2sSenopati%2C%20Kec.%20Kby.%20Baru%2C%20Kota%20Jakarta%20Selatan!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="w-full h-full">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- 7. TATA TERTIB & KETENTUAN TINGGAL -->
<!-- ========================================== -->
<section id="aturan" class="py-20 bg-[#F4EFE6] scroll-mt-16 border-y border-stone-300/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-[11px] font-semibold uppercase tracking-[0.2em] text-[#1E4D3E] block mb-2">
                Tata Tertib
            </span>
            <h2 class="font-serif-title text-3xl sm:text-4xl font-bold text-stone-900 tracking-tight">
                Ketentuan Kenyamanan Bersama
            </h2>
            <p class="text-stone-600 text-xs sm:text-sm mt-2 leading-relaxed">
                Diberlakukan untuk memelihara privasi, ketenangan beristirahat, dan keselamatan seluruh penghuni kost.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @if(is_array($setting->rules))
                @foreach($setting->rules as $index => $rule)
                <div class="bg-white p-5 rounded-xl border border-stone-200/90 shadow-xs flex items-start gap-3.5">
                    <div class="w-7 h-7 rounded-lg bg-[#EBF3EF] text-[#0B2017] font-bold text-xs flex items-center justify-center shrink-0">
                        {{ $index + 1 }}
                    </div>
                    <p class="text-xs font-medium text-stone-700 leading-relaxed mt-0.5">
                        {{ $rule }}
                    </p>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- 8. TESTIMONI PENGHUNI -->
<!-- ========================================== -->
<section class="py-20 sm:py-24 bg-[#FBFBF9]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-[11px] font-semibold uppercase tracking-[0.2em] text-[#1E4D3E] block mb-2">
                Pengalaman Penghuni
            </span>
            <h2 class="font-serif-title text-3xl sm:text-4xl font-bold text-stone-900 tracking-tight">
                Kisah Nyata Dari Mereka yang Tinggal
            </h2>
            <p class="text-stone-600 text-xs sm:text-sm mt-2 leading-relaxed">
                Ulasan murni dari para profesional dan mahasiswa yang telah merasakan kenyamanan Senopati Residence.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-7">
            @foreach($testimonials as $t)
            <div class="bg-white p-7 rounded-2xl border border-stone-200/90 flex flex-col justify-between shadow-xs hover:border-stone-400 transition">
                <div>
                    <!-- Star Ratings -->
                    <div class="flex items-center gap-1 text-amber-500 mb-4">
                        @for($i = 0; $i < $t['rating']; $i++)
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-400 text-amber-400"></i>
                        @endfor
                    </div>
                    <p class="text-xs text-stone-600 leading-relaxed italic mb-6">
                        "{{ $t['comment'] }}"
                    </p>
                </div>

                <div class="flex items-center gap-3 pt-4 border-t border-stone-100">
                    <img src="{{ $t['avatar'] }}" alt="{{ $t['name'] }}" class="w-10 h-10 rounded-full object-cover border border-stone-200">
                    <div>
                        <h4 class="text-xs font-bold text-stone-900">{{ $t['name'] }}</h4>
                        <p class="text-[10px] text-stone-500">{{ $t['role'] }}</p>
                        <span class="text-[10px] font-medium text-[#1E4D3E]">Penghuni {{ $t['room'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- 9. FORMULIR JADWAL SURVEY & RESERVASI -->
<!-- ========================================== -->
<section id="survey" class="py-20 sm:py-24 bg-[#0B2017] text-white relative overflow-hidden scroll-mt-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-[11px] font-semibold uppercase tracking-[0.2em] text-amber-200 block mb-2">
                Pemesanan & Kunjungan
            </span>
            <h2 class="font-serif-title text-3xl sm:text-4xl font-bold text-white tracking-tight">
                Jadwalkan Kunjungan Survey Anda
            </h2>
            <p class="text-stone-300 text-xs sm:text-sm mt-2 leading-relaxed font-light">
                Silakan lengkapi formulir di bawah ini. Tim concierge kami akan segera menyambut dan mengonfirmasi jadwal kunjungan langsung ke WhatsApp Anda.
            </p>
        </div>

        <div class="bg-white text-stone-800 rounded-3xl p-6 sm:p-10 shadow-xl border border-stone-200">
            <form action="{{ route('survey.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1.5">Nama Lengkap *</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Budi Santoso" required
                            class="w-full px-4 py-2.5 bg-stone-50 border border-stone-300 rounded-xl text-stone-900 placeholder-stone-400 text-sm focus:ring-1 focus:ring-[#0B2017] focus:border-[#0B2017] focus:outline-none">
                    </div>

                    <!-- Nomor WhatsApp -->
                    <div>
                        <label class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1.5">Nomor WhatsApp Aktif *</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Contoh: 081234567890" required
                            class="w-full px-4 py-2.5 bg-stone-50 border border-stone-300 rounded-xl text-stone-900 placeholder-stone-400 text-sm focus:ring-1 focus:ring-[#0B2017] focus:border-[#0B2017] focus:outline-none">
                    </div>

                    <!-- Pilihan Kamar Minat -->
                    <div>
                        <label class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1.5">Pilihan Tipe Kamar</label>
                        <select name="room_id" class="w-full px-4 py-2.5 bg-stone-50 border border-stone-300 rounded-xl text-stone-900 text-sm focus:ring-1 focus:ring-[#0B2017] focus:border-[#0B2017] focus:outline-none">
                            <option value="">-- Bebas / Konsultasi Saat Survey --</option>
                            @foreach($rooms as $room)
                            <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                                {{ $room->name }} ({{ $room->formatted_price_monthly }})
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Rencana Durasi Sewa -->
                    <div>
                        <label class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1.5">Rencana Durasi Sewa *</label>
                        <select name="duration_plan" required class="w-full px-4 py-2.5 bg-stone-50 border border-stone-300 rounded-xl text-stone-900 text-sm focus:ring-1 focus:ring-[#0B2017] focus:border-[#0B2017] focus:outline-none">
                            <option value="1 Bulan" {{ old('duration_plan') == '1 Bulan' ? 'selected' : '' }}>1 Bulan</option>
                            <option value="3 Bulan" {{ old('duration_plan') == '3 Bulan' ? 'selected' : '' }}>3 Bulan</option>
                            <option value="6 Bulan" {{ old('duration_plan') == '6 Bulan' ? 'selected' : '' }}>6 Bulan</option>
                            <option value="1 Tahun" {{ old('duration_plan') == '1 Tahun' ? 'selected' : '' }}>1 Tahun (Diskon 12%)</option>
                        </select>
                    </div>

                    <!-- Tanggal Survey -->
                    <div>
                        <label class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1.5">Rencana Tanggal Kunjungan *</label>
                        <input type="date" name="survey_date" value="{{ old('survey_date', date('Y-m-d', strtotime('+1 day'))) }}" min="{{ date('Y-m-d') }}" required
                            class="w-full px-4 py-2.5 bg-stone-50 border border-stone-300 rounded-xl text-stone-900 text-sm focus:ring-1 focus:ring-[#0B2017] focus:border-[#0B2017] focus:outline-none">
                    </div>

                    <!-- Jam Kunjungan -->
                    <div>
                        <label class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1.5">Perkiraan Waktu Kunjungan *</label>
                        <select name="survey_time" required class="w-full px-4 py-2.5 bg-stone-50 border border-stone-300 rounded-xl text-stone-900 text-sm focus:ring-1 focus:ring-[#0B2017] focus:border-[#0B2017] focus:outline-none">
                            <option value="Pagi (09:00 - 11:30 WIB)">Pagi (09:00 - 11:30 WIB)</option>
                            <option value="Siang (11:30 - 14:30 WIB)">Siang (11:30 - 14:30 WIB)</option>
                            <option value="Sore (14:30 - 17:30 WIB)" selected>Sore (14:30 - 17:30 WIB)</option>
                            <option value="Malam (18:30 - 19:30 WIB)">Malam (18:30 - 19:30 WIB)</option>
                        </select>
                    </div>

                    <!-- Catatan Tambahan -->
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1.5">Catatan Khusus / Pertanyaan (Opsional)</label>
                        <textarea name="notes" rows="3" placeholder="Contoh: Rencana survey berdua dengan keluarga, mohon info ketersediaan slot parkir mobil."
                            class="w-full px-4 py-2.5 bg-stone-50 border border-stone-300 rounded-xl text-stone-900 placeholder-stone-400 text-sm focus:ring-1 focus:ring-[#0B2017] focus:border-[#0B2017] focus:outline-none">{{ old('notes') }}</textarea>
                    </div>
                </div>

                <div class="pt-3">
                    <button type="submit" class="w-full py-3.5 bg-[#0B2017] hover:bg-[#16382B] text-amber-100 font-semibold text-sm rounded-xl shadow-xs transition flex items-center justify-center gap-2">
                        <i data-lucide="send" class="w-4 h-4"></i>
                        <span>Kirim Permintaan Survey & Lanjut ke WhatsApp</span>
                    </button>
                    <p class="text-center text-[11px] text-stone-500 mt-2.5">
                        Layanan survey kunjungan kamar ini 100% bebas biaya (Gratis).
                    </p>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- MODAL DETAIL KAMAR -->
<!-- ========================================== -->
<div id="roomDetailModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/60 backdrop-blur-xs transition-opacity">
    <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl relative">
        <button type="button" onclick="closeRoomModal()" class="absolute top-3.5 right-3.5 z-10 w-8 h-8 rounded-full bg-black/60 hover:bg-black text-white flex items-center justify-center transition">
            <i data-lucide="x" class="w-4 h-4"></i>
        </button>

        <div class="h-64 sm:h-72 relative bg-stone-100">
            <img id="modalImg" src="" alt="Detail Kamar" class="w-full h-full object-cover">
            <div class="absolute bottom-3.5 left-3.5">
                <span id="modalType" class="px-2.5 py-1 rounded text-xs font-semibold bg-white text-stone-900 shadow-xs"></span>
            </div>
        </div>

        <div class="p-6 sm:p-7 space-y-6">
            <div>
                <h3 id="modalName" class="font-serif-title text-2xl font-bold text-stone-900"></h3>
                <div class="flex items-baseline gap-1.5 mt-1">
                    <span id="modalPrice" class="font-serif-title text-2xl font-bold text-[#0B2017]"></span>
                    <span class="text-xs text-stone-500">/bulan</span>
                </div>
                <p id="modalDesc" class="text-xs sm:text-sm text-stone-600 mt-2.5 leading-relaxed"></p>
            </div>

            <!-- Specs Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 text-xs">
                <div class="p-3 rounded-xl bg-stone-50 border border-stone-200">
                    <span class="text-stone-400 block text-[10px] uppercase font-semibold">Ukuran Kamar</span>
                    <span id="modalSize" class="font-bold text-stone-800 mt-0.5 block"></span>
                </div>
                <div class="p-3 rounded-xl bg-stone-50 border border-stone-200">
                    <span class="text-stone-400 block text-[10px] uppercase font-semibold">Tipe Kasur</span>
                    <span id="modalBed" class="font-bold text-stone-800 mt-0.5 block"></span>
                </div>
                <div class="p-3 rounded-xl bg-stone-50 border border-stone-200">
                    <span class="text-stone-400 block text-[10px] uppercase font-semibold">Kamar Mandi</span>
                    <span id="modalBath" class="font-bold text-stone-800 mt-0.5 block"></span>
                </div>
                <div class="p-3 rounded-xl bg-stone-50 border border-stone-200">
                    <span class="text-stone-400 block text-[10px] uppercase font-semibold">Listrik</span>
                    <span id="modalElectricity" class="font-bold text-stone-800 mt-0.5 block"></span>
                </div>
            </div>

            <!-- Facilities List -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-stone-400 mb-2.5">Fasilitas Lengkap Kamar</h4>
                <div id="modalFacilities" class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-stone-700"></div>
            </div>

            <!-- Modal CTA -->
            <div class="pt-4 border-t border-stone-100 flex items-center justify-between gap-3">
                <button type="button" onclick="closeRoomModal()" class="px-4 py-2 rounded-xl border border-stone-300 text-stone-600 text-xs font-semibold hover:bg-stone-50 transition">
                    Tutup
                </button>
                <a id="modalWABtn" href="#" target="_blank" class="px-5 py-2.5 rounded-xl bg-[#0B2017] hover:bg-[#16382B] text-amber-100 text-xs font-semibold shadow-xs transition flex items-center gap-2">
                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                    <span>Tanya & Booking via WhatsApp</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- LIGHTBOX MODAL -->
<!-- ========================================== -->
<div id="lightboxModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/85 backdrop-blur-xs transition-opacity" onclick="closeLightbox()">
    <div class="relative max-w-4xl w-full text-center" onclick="event.stopPropagation()">
        <button type="button" onclick="closeLightbox()" class="absolute -top-10 right-0 text-white hover:text-amber-200 text-xs font-semibold flex items-center gap-1">
            <i data-lucide="x" class="w-5 h-5"></i>
            <span>Tutup</span>
        </button>
        <img id="lightboxImg" src="" alt="Pratinjau Foto" class="max-h-[80vh] w-auto mx-auto rounded-xl shadow-2xl object-contain">
        <h4 id="lightboxTitle" class="text-white text-sm font-semibold mt-3"></h4>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // -------------------------------------------------------------
    // 1. Filter Rooms
    // -------------------------------------------------------------
    function filterRooms(type) {
        document.querySelectorAll('#roomFilters .filter-btn').forEach(btn => {
            if (btn.dataset.filter === type) {
                btn.classList.add('bg-[#0B2017]', 'text-amber-100', 'shadow-xs');
                btn.classList.remove('text-stone-600', 'hover:text-stone-900');
            } else {
                btn.classList.remove('bg-[#0B2017]', 'text-amber-100', 'shadow-xs');
                btn.classList.add('text-stone-600', 'hover:text-stone-900');
            }
        });

        const cards = document.querySelectorAll('#roomsContainer .room-card');
        cards.forEach(card => {
            if (type === 'all' || card.dataset.type === type) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // -------------------------------------------------------------
    // 2. Room Detail Modal
    // -------------------------------------------------------------
    const roomModal = document.getElementById('roomDetailModal');
    const adminPhone = "{{ preg_replace('/[^0-9]/', '', $setting->phone_wa ?? '6281234567890') }}";

    function openRoomModal(room) {
        document.getElementById('modalImg').src = room.thumbnail || '/images/kost/deluxe.jpg';
        document.getElementById('modalType').innerText = room.type + ' • ' + room.gender_type;
        document.getElementById('modalName').innerText = room.name;
        document.getElementById('modalPrice').innerText = 'Rp ' + Number(room.price_monthly).toLocaleString('id-ID');
        document.getElementById('modalDesc').innerText = room.description || '';
        document.getElementById('modalSize').innerText = room.size || '-';
        document.getElementById('modalBed').innerText = room.bed_type || '-';
        document.getElementById('modalBath').innerText = room.bathroom_type || '-';
        document.getElementById('modalElectricity').innerText = room.electricity || '-';

        const facilitiesContainer = document.getElementById('modalFacilities');
        facilitiesContainer.innerHTML = '';
        if (room.facilities && Array.isArray(room.facilities)) {
            room.facilities.forEach(fac => {
                const item = document.createElement('div');
                item.className = 'flex items-center gap-2 p-2 rounded-lg bg-stone-50';
                item.innerHTML = '<i data-lucide="check" class="w-3.5 h-3.5 text-[#1E4D3E] shrink-0"></i> <span>' + fac + '</span>';
                facilitiesContainer.appendChild(item);
            });
        }

        const waText = encodeURIComponent("Halo Concierge {{ $setting->kost_name }}, saya tertarik dengan " + room.name + " (Rp " + Number(room.price_monthly).toLocaleString('id-ID') + "/bulan). Mohon info ketersediaan unit dan jadwal survey.");
        document.getElementById('modalWABtn').href = "https://wa.me/" + adminPhone + "?text=" + waText;

        roomModal.classList.remove('hidden');
        roomModal.classList.add('flex');
        lucide.createIcons();
    }

    function closeRoomModal() {
        roomModal.classList.add('hidden');
        roomModal.classList.remove('flex');
    }

    // -------------------------------------------------------------
    // 3. Calculator Logic
    // -------------------------------------------------------------
    let currentDurationMonths = 1;
    let currentDiscountRate = 0;

    function setDuration(months, discountRate) {
        currentDurationMonths = months;
        currentDiscountRate = discountRate;

        document.querySelectorAll('.duration-btn').forEach(btn => {
            if (parseInt(btn.dataset.months) === months) {
                btn.classList.remove('bg-stone-50', 'text-stone-700', 'border-stone-300');
                btn.classList.add('bg-[#0B2017]', 'text-white', 'border-[#0B2017]');
            } else {
                btn.classList.remove('bg-[#0B2017]', 'text-white', 'border-[#0B2017]');
                btn.classList.add('bg-stone-50', 'text-stone-700', 'border-stone-300');
            }
        });

        calculateTotal();
    }

    function calculateTotal() {
        const roomSelect = document.getElementById('calcRoom');
        const roomPriceMonthly = parseInt(roomSelect.value) || 0;
        const selectedOption = roomSelect.options[roomSelect.selectedIndex];
        const roomName = selectedOption ? selectedOption.dataset.name : 'Kamar Kost';

        const carPark = document.getElementById('addCarPark').checked ? 250000 : 0;
        const laundry = document.getElementById('addLaundry').checked ? 150000 : 0;
        const totalAddonsMonthly = carPark + laundry;

        const baseRoomTotal = roomPriceMonthly * currentDurationMonths;
        const discountAmount = Math.round(baseRoomTotal * currentDiscountRate);
        const netRoomTotal = baseRoomTotal - discountAmount;
        const addonsTotal = totalAddonsMonthly * currentDurationMonths;
        const grandTotal = netRoomTotal + addonsTotal;

        document.getElementById('summaryRoom').innerText = 'Rp ' + baseRoomTotal.toLocaleString('id-ID');
        document.getElementById('summaryDuration').innerText = currentDurationMonths + ' Bulan';

        const discountRow = document.getElementById('discountRow');
        if (discountAmount > 0) {
            discountRow.style.display = 'flex';
            document.getElementById('summaryDiscount').innerText = '- Rp ' + discountAmount.toLocaleString('id-ID');
        } else {
            discountRow.style.display = 'none';
        }

        document.getElementById('summaryAddons').innerText = 'Rp ' + addonsTotal.toLocaleString('id-ID');
        document.getElementById('totalAmount').innerText = 'Rp ' + grandTotal.toLocaleString('id-ID');

        let addonList = [];
        if (carPark > 0) addonList.push("Parkir Mobil");
        if (laundry > 0) addonList.push("Laundry Kiloan");
        const addonText = addonList.length > 0 ? addonList.join(", ") : "Tidak ada";

        const waMsg = "Halo Concierge {{ $setting->kost_name }},\n\nSaya ingin memesan / menanyakan sewa kost dengan rincian estimasi:\n"
            + "• Tipe Kamar: " + roomName + "\n"
            + "• Durasi Masa Sewa: " + currentDurationMonths + " Bulan\n"
            + (discountAmount > 0 ? "• Diskon Durasi: Rp " + discountAmount.toLocaleString('id-ID') + "\n" : "")
            + "• Tambahan Layanan: " + addonText + "\n"
            + "• Total Estimasi Pembayaran: Rp " + grandTotal.toLocaleString('id-ID') + "\n\n"
            + "Apakah tipe kamar ini masih tersedia untuk periode tersebut? Terima kasih!";

        document.getElementById('btnSimulasiWA').href = "https://wa.me/" + adminPhone + "?text=" + encodeURIComponent(waMsg);
    }

    document.getElementById('calcRoom').addEventListener('change', calculateTotal);
    calculateTotal();

    // -------------------------------------------------------------
    // 4. Lightbox Modal
    // -------------------------------------------------------------
    const lightboxModal = document.getElementById('lightboxModal');
    function openLightbox(src, title) {
        document.getElementById('lightboxImg').src = src;
        document.getElementById('lightboxTitle').innerText = title;
        lightboxModal.classList.remove('hidden');
        lightboxModal.classList.add('flex');
        lucide.createIcons();
    }
    function closeLightbox() {
        lightboxModal.classList.add('hidden');
        lightboxModal.classList.remove('flex');
    }
</script>
@endpush

