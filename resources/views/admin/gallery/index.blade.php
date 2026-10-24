@extends('layouts.admin')

@section('title', 'Kelola Galeri Foto Kost | Kost Senopati')
@section('page_title', 'Kelola Galeri Foto Kost')

@section('content')
<div class="space-y-8">

    <!-- Header info -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-xl font-black text-slate-900">Koleksi Foto & Gambar Kost</h3>
            <p class="text-xs text-slate-500">Unggah foto kamar, fasilitas, dan eksterior baru. Foto yang diunggah akan otomatis tersedia di pilihan gambar kamar dan galeri publik.</p>
        </div>
    </div>

    <!-- Upload Card -->
    <div class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-xs">
        <h4 class="text-base font-bold text-slate-900 mb-4 flex items-center gap-2">
            <i data-lucide="upload-cloud" class="w-5 h-5 text-emerald-600"></i>
            <span>Unggah Foto Kost Baru</span>
        </h4>

        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- File Input with Preview -->
                <div class="md:col-span-1">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Pilih File Foto *</label>
                    <div class="border-2 border-dashed border-slate-300 rounded-2xl p-4 text-center hover:border-emerald-500 transition cursor-pointer relative bg-slate-50" onclick="document.getElementById('galleryFileInput').click()">
                        <div id="uploadPlaceholder" class="space-y-2 py-4">
                            <i data-lucide="image-plus" class="w-10 h-10 text-slate-400 mx-auto"></i>
                            <p class="text-xs font-semibold text-slate-600">Klik untuk memilih file foto</p>
                            <span class="text-[11px] text-slate-400 block">JPG, PNG, WEBP (Maks 5MB)</span>
                        </div>
                        <img id="imagePreview" src="#" alt="Pratinjau" class="hidden w-full h-40 object-cover rounded-xl shadow-xs">
                        <input type="file" id="galleryFileInput" name="image" accept="image/*" required class="hidden" onchange="previewUploadImage(this)">
                    </div>
                </div>

                <!-- Fields -->
                <div class="md:col-span-2 space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Judul / Keterangan Foto *</label>
                        <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Kamar Deluxe Sudut Jendela / Rooftop Sore" required
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Kategori Foto *</label>
                        <select name="category" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                            <option value="Kamar">Kamar Tidur</option>
                            <option value="Fasilitas">Fasilitas Bersama (Dapur, Ruang Santai, dll)</option>
                            <option value="Eksterior">Eksterior & Area Parkir</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold rounded-xl shadow-md transition flex items-center gap-2">
                            <i data-lucide="plus-circle" class="w-4 h-4"></i>
                            <span>Unggah Foto Sekarang</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Gallery Grid -->
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <h4 class="text-base font-bold text-slate-900">Semua Foto Koleksi ({{ $galleries->total() }} Foto)</h4>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($galleries as $gallery)
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-md transition flex flex-col group">
                <div class="relative h-48 bg-slate-100 overflow-hidden">
                    <img src="{{ $gallery->image_path }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <div class="absolute top-3 left-3">
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-900/80 text-white backdrop-blur-xs">
                            {{ $gallery->category }}
                        </span>
                    </div>
                </div>

                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <h5 class="text-sm font-bold text-slate-800 truncate" title="{{ $gallery->title }}">{{ $gallery->title }}</h5>
                        <p class="text-[11px] text-slate-400 font-mono truncate mt-0.5">{{ $gallery->image_path }}</p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                        <a href="{{ $gallery->image_path }}" target="_blank" class="text-xs font-semibold text-emerald-600 hover:text-emerald-700 flex items-center gap-1">
                            <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                            <span>Lihat Foto</span>
                        </a>

                        <form action="{{ route('admin.gallery.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Hapus foto ini dari galeri?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition" title="Hapus">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-12 text-center text-slate-400 text-sm">
                Belum ada foto dalam galeri. Silakan unggah foto kost pertama Anda di atas.
            </div>
            @endforelse
        </div>

        @if($galleries->hasPages())
        <div class="pt-4">
            {{ $galleries->links() }}
        </div>
        @endif
    </div>

</div>

@push('scripts')
<script>
    function previewUploadImage(input) {
        const preview = document.getElementById('imagePreview');
        const placeholder = document.getElementById('uploadPlaceholder');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
@endsection
