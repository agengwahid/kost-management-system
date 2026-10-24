@extends('layouts.admin')

@section('title', 'Edit Kamar: ' . $room->name . ' | Senopati Residence')
@section('page_title', 'Perbarui Informasi Kamar')

@section('content')
<div class="max-w-4xl space-y-6">

    <div class="flex items-center justify-between">
        <a href="{{ route('admin.rooms.index') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-stone-500 hover:text-stone-900 transition">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            <span>Kembali ke Daftar Kamar</span>
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-stone-200/90 p-6 sm:p-8 shadow-xs">
        <div class="border-b border-stone-100 pb-5 mb-6">
            <h3 class="font-serif-title text-xl font-bold text-stone-900">Perbarui Kamar: {{ $room->name }}</h3>
            <p class="text-xs text-stone-500 mt-1">Ubah tarif, jumlah unit tersedia, atau perbarui foto kamar.</p>
        </div>

        <form action="{{ route('admin.rooms.update', $room) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Kamar -->
                <div class="md:col-span-2">
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Nama Tipe Kamar <span class="text-rose-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $room->name) }}" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-stone-50/30 transition">
                </div>

                <!-- Tipe -->
                <div>
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Kategori Tipe <span class="text-rose-500">*</span></label>
                    <select name="type" required class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-white transition">
                        <option value="Deluxe" {{ old('type', $room->type) == 'Deluxe' ? 'selected' : '' }}>Deluxe</option>
                        <option value="Superior" {{ old('type', $room->type) == 'Superior' ? 'selected' : '' }}>Superior</option>
                        <option value="Standard" {{ old('type', $room->type) == 'Standard' ? 'selected' : '' }}>Standard</option>
                    </select>
                </div>

                <!-- Jenis Penghuni -->
                <div>
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Peruntukan Penghuni <span class="text-rose-500">*</span></label>
                    <select name="gender_type" required class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-white transition">
                        <option value="Campur" {{ old('gender_type', $room->gender_type) == 'Campur' ? 'selected' : '' }}>Campur (Pria / Wanita)</option>
                        <option value="Putra" {{ old('gender_type', $room->gender_type) == 'Putra' ? 'selected' : '' }}>Khusus Putra</option>
                        <option value="Putri" {{ old('gender_type', $room->gender_type) == 'Putri' ? 'selected' : '' }}>Khusus Putri</option>
                    </select>
                </div>

                <!-- Harga Bulanan -->
                <div>
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Harga Sewa Bulanan (Rp) <span class="text-rose-500">*</span></label>
                    <input type="number" name="price_monthly" value="{{ old('price_monthly', $room->price_monthly) }}" min="100000" step="50000" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-stone-50/30 transition">
                </div>

                <!-- Harga Tahunan -->
                <div>
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Harga Sewa Tahunan (Rp, Opsional)</label>
                    <input type="number" name="price_yearly" value="{{ old('price_yearly', $room->price_yearly) }}" step="100000"
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-stone-50/30 transition">
                </div>

                <!-- Ukuran Kamar -->
                <div>
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Ukuran Kamar <span class="text-rose-500">*</span></label>
                    <input type="text" name="size" value="{{ old('size', $room->size) }}" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-stone-50/30 transition">
                </div>

                <!-- Tipe Kasur -->
                <div>
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Tipe Kasur <span class="text-rose-500">*</span></label>
                    <input type="text" name="bed_type" value="{{ old('bed_type', $room->bed_type) }}" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-stone-50/30 transition">
                </div>

                <!-- Kamar Mandi -->
                <div>
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Tipe Kamar Mandi <span class="text-rose-500">*</span></label>
                    <input type="text" name="bathroom_type" value="{{ old('bathroom_type', $room->bathroom_type) }}" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-stone-50/30 transition">
                </div>

                <!-- Listrik -->
                <div>
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Kebijakan Listrik <span class="text-rose-500">*</span></label>
                    <select name="electricity" required class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-white transition">
                        <option value="Token Mandiri" {{ old('electricity', $room->electricity) == 'Token Mandiri' ? 'selected' : '' }}>Token Mandiri (Ditanggung Penghuni)</option>
                        <option value="Termasuk Listrik" {{ old('electricity', $room->electricity) == 'Termasuk Listrik' ? 'selected' : '' }}>Sudah Termasuk Biaya Listrik</option>
                    </select>
                </div>

                <!-- Total Unit -->
                <div>
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Total Unit Kamar <span class="text-rose-500">*</span></label>
                    <input type="number" name="total_units" value="{{ old('total_units', $room->total_units) }}" min="1" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-stone-50/30 transition">
                </div>

                <!-- Unit Tersedia -->
                <div>
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Unit Siap Huni (Tersedia) <span class="text-rose-500">*</span></label>
                    <input type="number" name="available_units" value="{{ old('available_units', $room->available_units) }}" min="0" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-stone-50/30 transition">
                </div>

                <!-- Pilihan & Upload Foto Utama Kamar -->
                <div class="md:col-span-2 space-y-4 p-5 rounded-2xl bg-[#FBF9F6] border border-stone-200">
                    <div>
                        <h4 class="text-sm font-bold text-stone-900 flex items-center gap-2">
                            <i data-lucide="image" class="w-4 h-4 text-[#16382B]"></i>
                            <span>Foto Utama Kamar (Thumbnail)</span>
                        </h4>
                        <p class="text-xs text-stone-500 mt-0.5">Unggah foto baru untuk mengganti foto saat ini atau pilih dari galeri.</p>
                    </div>

                    <!-- Current Photo -->
                    <div class="flex items-center gap-4 p-3 rounded-xl bg-white border border-stone-200">
                        <img src="{{ $room->thumbnail }}" alt="{{ $room->name }}" class="w-24 h-16 object-cover rounded-lg border border-stone-200 shadow-xs">
                        <div>
                            <span class="text-xs font-bold text-stone-800 block">Foto Thumbnail Saat Ini</span>
                            <span class="text-[11px] text-stone-400 font-mono">{{ $room->thumbnail }}</span>
                        </div>
                    </div>

                    <!-- Upload Input Baru -->
                    <div>
                        <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Unggah Foto Baru untuk Mengganti</label>
                        <input type="file" name="image_file" accept="image/*" id="roomImageInput" onchange="previewRoomImage(this)"
                            class="block w-full text-xs text-stone-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#0B2017] file:text-amber-200 hover:file:bg-[#16382B] cursor-pointer border border-stone-300 rounded-xl bg-white">
                        
                        <div id="roomImagePreviewContainer" class="hidden mt-3">
                            <span class="text-[11px] font-semibold text-stone-500 block mb-1">Pratinjau Foto Baru:</span>
                            <img id="roomImagePreview" src="#" alt="Pratinjau Foto" class="w-48 h-32 object-cover rounded-xl border border-stone-200 shadow-xs">
                        </div>
                    </div>

                    <!-- Pilihan dari Galeri yang Ada -->
                    @if(count($availableImages) > 0)
                    <div class="pt-3 border-t border-stone-200">
                        <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Atau Pilih dari Galeri Foto Koleksi</label>
                        
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 max-h-60 overflow-y-auto p-1">
                            @foreach($availableImages as $img)
                            <label class="relative flex flex-col rounded-xl border border-stone-200 p-1.5 cursor-pointer hover:border-[#16382B] transition has-[:checked]:border-[#16382B] has-[:checked]:ring-2 has-[:checked]:ring-[#16382B]/20 bg-white">
                                <input type="radio" name="thumbnail" value="{{ $img->image_path }}" {{ $room->thumbnail === $img->image_path ? 'checked' : '' }} class="sr-only">
                                <img src="{{ $img->image_path }}" alt="{{ $img->title }}" class="w-full h-20 object-cover rounded-lg">
                                <span class="text-[11px] font-bold text-stone-800 truncate mt-1.5 px-0.5" title="{{ $img->title }}">{{ $img->title }}</span>
                                <span class="text-[10px] text-stone-400 px-0.5">{{ $img->category }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Foto Galeri Tambahan (Multiple) -->
                <div class="md:col-span-2 p-5 rounded-2xl bg-[#FBF9F6] border border-stone-200">
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-1">Tambah Foto-Foto Galeri Kamar (Opsional, Lebih dari 1 Foto)</label>
                    <p class="text-xs text-stone-500 mb-3">Foto tambahan akan ditampilkan pada galeri dan modal detail kamar ini.</p>
                    <input type="file" name="gallery_files[]" multiple accept="image/*"
                        class="block w-full text-xs text-stone-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-stone-200 file:text-stone-800 hover:file:bg-stone-300 cursor-pointer border border-stone-300 rounded-xl bg-white">
                </div>

                <!-- Fasilitas (Satu baris per fasilitas) -->
                <div class="md:col-span-2">
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Fasilitas Kamar (Satu item per baris)</label>
                    @php
                        $facilitiesText = is_array($room->facilities) ? implode("\n", $room->facilities) : $room->facilities;
                    @endphp
                    <textarea name="facilities" rows="6" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm font-mono bg-stone-50/30 transition">{{ old('facilities', $facilitiesText) }}</textarea>
                </div>

                <!-- Deskripsi -->
                <div class="md:col-span-2">
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Deskripsi Kamar <span class="text-rose-500">*</span></label>
                    <textarea name="description" rows="4" required class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-stone-50/30 transition">{{ old('description', $room->description) }}</textarea>
                </div>

                <!-- Tampilkan di Unggulan (Featured) -->
                <div class="md:col-span-2 pt-2">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $room->is_featured) ? 'checked' : '' }}
                            class="w-4 h-4 rounded text-[#16382B] focus:ring-[#16382B] border-stone-300">
                        <span class="text-sm font-semibold text-stone-700">Tampilkan sebagai Kamar Pilihan Unggulan (Featured) di Beranda</span>
                    </label>
                </div>
            </div>

            <div class="pt-6 border-t border-stone-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.rooms.index') }}" class="px-5 py-2.5 rounded-xl border border-stone-300 text-stone-600 text-sm font-semibold hover:bg-stone-50 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#0B2017] hover:bg-[#16382B] text-amber-200 border border-amber-300/30 text-sm font-semibold shadow-xs transition flex items-center gap-2">
                    <i data-lucide="check" class="w-4 h-4"></i>
                    <span>Perbarui Data Kamar</span>
                </button>
            </div>
        </form>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function previewRoomImage(input) {
        const container = document.getElementById('roomImagePreviewContainer');
        const preview = document.getElementById('roomImagePreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                container.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
