@extends('layouts.admin')

@section('title', 'Tambah Kamar Baru | Kost Senopati')
@section('page_title', 'Tambah Tipe Kamar Baru')

@section('content')
<div class="max-w-4xl space-y-6">

    <div class="flex items-center justify-between">
        <a href="{{ route('admin.rooms.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-slate-800 transition">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            <span>Kembali ke Daftar Kamar</span>
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-xs">
        <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Kamar -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nama Tipe Kamar *</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Kamar Deluxe Executive" required
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                </div>

                <!-- Tipe -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Kategori Tipe *</label>
                    <select name="type" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                        <option value="Deluxe" {{ old('type') == 'Deluxe' ? 'selected' : '' }}>Deluxe</option>
                        <option value="Superior" {{ old('type') == 'Superior' ? 'selected' : '' }}>Superior</option>
                        <option value="Standard" {{ old('type') == 'Standard' ? 'selected' : '' }}>Standard</option>
                    </select>
                </div>

                <!-- Jenis Penghuni -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Jenis Penghuni *</label>
                    <select name="gender_type" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                        <option value="Campur" {{ old('gender_type') == 'Campur' ? 'selected' : '' }}>Campur (Pria / Wanita)</option>
                        <option value="Putra" {{ old('gender_type') == 'Putra' ? 'selected' : '' }}>Khusus Putra</option>
                        <option value="Putri" {{ old('gender_type') == 'Putri' ? 'selected' : '' }}>Khusus Putri</option>
                    </select>
                </div>

                <!-- Harga Bulanan -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Harga Sewa Bulanan (Rp) *</label>
                    <input type="number" name="price_monthly" value="{{ old('price_monthly', 2000000) }}" min="100000" step="50000" required
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                </div>

                <!-- Harga Tahunan -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Harga Sewa Tahunan (Rp, Opsional)</label>
                    <input type="number" name="price_yearly" value="{{ old('price_yearly') }}" placeholder="Contoh: 22000000" step="100000"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                </div>

                <!-- Ukuran Kamar -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Ukuran Kamar *</label>
                    <input type="text" name="size" value="{{ old('size', '4 x 4 m') }}" placeholder="Contoh: 4 x 4 m" required
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                </div>

                <!-- Tipe Kasur -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Tipe Kasur *</label>
                    <input type="text" name="bed_type" value="{{ old('bed_type', 'Queen Bed (160x200)') }}" placeholder="Contoh: Queen Bed (160x200)" required
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                </div>

                <!-- Kamar Mandi -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Tipe Kamar Mandi *</label>
                    <input type="text" name="bathroom_type" value="{{ old('bathroom_type', 'Kamar Mandi Dalam + Water Heater') }}" required
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                </div>

                <!-- Listrik -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Kebijakan Listrik *</label>
                    <select name="electricity" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                        <option value="Token Mandiri" {{ old('electricity') == 'Token Mandiri' ? 'selected' : '' }}>Token Mandiri (Ditanggung Penghuni)</option>
                        <option value="Termasuk Listrik" {{ old('electricity') == 'Termasuk Listrik' ? 'selected' : '' }}>Sudah Termasuk Listrik</option>
                    </select>
                </div>

                <!-- Total Unit -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Total Unit Kamar *</label>
                    <input type="number" name="total_units" value="{{ old('total_units', 5) }}" min="1" required
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                </div>

                <!-- Unit Tersedia -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Unit Siap Sewa (Tersedia) *</label>
                    <input type="number" name="available_units" value="{{ old('available_units', 2) }}" min="0" required
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                </div>

                <!-- Pilihan & Upload Foto Utama Kamar -->
                <div class="md:col-span-2 space-y-4 p-5 rounded-2xl bg-slate-50 border border-slate-200">
                    <div>
                        <h4 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                            <i data-lucide="image" class="w-4 h-4 text-emerald-600"></i>
                            <span>Foto Utama Kamar (Thumbnail)</span>
                        </h4>
                        <p class="text-xs text-slate-500 mt-0.5">Unggah foto baru langsung dari perangkat Anda ATAU pilih dari koleksi galeri kost di bawah.</p>
                    </div>

                    <!-- Upload Input Baru -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Opsi 1: Unggah Foto Baru dari Komputer / HP</label>
                        <div class="flex items-center gap-4">
                            <input type="file" name="image_file" accept="image/*" id="roomImageInput" onchange="previewRoomImage(this)"
                                class="block w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer border border-slate-300 rounded-xl bg-white">
                        </div>
                        <div id="roomImagePreviewContainer" class="hidden mt-3">
                            <span class="text-[11px] font-semibold text-slate-500 block mb-1">Pratinjau Foto Baru:</span>
                            <img id="roomImagePreview" src="#" alt="Pratinjau Foto" class="w-44 h-28 object-cover rounded-xl border border-slate-200 shadow-xs">
                        </div>
                    </div>

                    <!-- Pilihan dari Galeri yang Ada -->
                    <div class="pt-3 border-t border-slate-200/80">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Opsi 2: Atau Pilih dari Foto yang Sudah Ada</label>
                        
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 max-h-64 overflow-y-auto p-1">
                            @foreach($availableImages as $idx => $img)
                            <label class="relative flex flex-col rounded-xl border-2 border-slate-200 p-1.5 cursor-pointer hover:border-emerald-500 transition has-[:checked]:border-emerald-600 has-[:checked]:bg-emerald-50/40 bg-white">
                                <input type="radio" name="thumbnail" value="{{ $img->image_path }}" {{ $idx === 0 ? 'checked' : '' }} class="sr-only">
                                <img src="{{ $img->image_path }}" alt="{{ $img->title }}" class="w-full h-20 object-cover rounded-lg">
                                <span class="text-[11px] font-bold text-slate-800 truncate mt-1.5 px-0.5" title="{{ $img->title }}">{{ $img->title }}</span>
                                <span class="text-[10px] text-slate-400 px-0.5">{{ $img->category }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Foto Galeri Tambahan (Multiple) -->
                <div class="md:col-span-2 p-5 rounded-2xl bg-slate-50 border border-slate-200">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Upload Foto-Foto Galeri Kamar (Opsional, Bisa Pilih Lebih Dari 1 Foto)</label>
                    <p class="text-xs text-slate-500 mb-3">Foto sudut-sudut kamar, kamar mandi dalam, meja belajar, dll.</p>
                    <input type="file" name="gallery_files[]" multiple accept="image/*"
                        class="block w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-200 file:text-slate-800 hover:file:bg-slate-300 cursor-pointer border border-slate-300 rounded-xl bg-white">
                </div>

                <!-- Fasilitas (Satu baris per fasilitas) -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Fasilitas Kamar (Satu item per baris)</label>
                    <textarea name="facilities" rows="5" placeholder="AC 1 PK&#10;Kamar Mandi Dalam + Water Heater&#10;Smart TV 32 Inch&#10;Meja Kerja & Kursi&#10;WiFi 100 Mbps"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm font-mono">{{ old('facilities', "AC 1 PK Hemat Energi\nKamar Mandi Dalam + Water Heater\nKasur Springbed Berkualitas\nMeja Kerja & Kursi\nLemari Pakaian Luas\nWiFi Fiber 100 Mbps") }}</textarea>
                </div>

                <!-- Deskripsi -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Deskripsi Kamar *</label>
                    <textarea name="description" rows="4" required placeholder="Jelaskan kenyamanan dan keunggulan kamar ini..."
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">{{ old('description', 'Kamar yang dirancang khusus untuk kenyamanan maksimal penghuni. Suasana tenang dengan pencahayaan alami dan fasilitas modern lengkap.') }}</textarea>
                </div>

                <!-- Tampilkan di Unggulan (Featured) -->
                <div class="md:col-span-2">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                            class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500 border-slate-300">
                        <span class="text-sm font-semibold text-slate-700">Tampilkan sebagai Kamar Pilihan Unggulan (Featured) di Beranda</span>
                    </label>
                </div>
            </div>

            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.rooms.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-600 text-sm font-bold hover:bg-slate-50 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold shadow-md transition">
                    Simpan Kamar Baru
                </button>
            </div>
        </form>
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
