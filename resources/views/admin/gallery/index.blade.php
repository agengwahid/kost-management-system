@extends('layouts.admin')

@section('title', 'Koleksi Foto Kost | Senopati Residence')
@section('page_title', 'Kelola Galeri Foto Kost')

@section('content')
<div class="space-y-8">

    <!-- Header info -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="font-serif-title text-2xl font-bold text-stone-900">Koleksi Foto & Aset Visual Kost</h3>
            <p class="text-xs text-stone-500 mt-0.5">Unggah foto kamar, fasilitas, dan eksterior. Foto otomatis tersedia di galeri publik dan pemilihan thumbnail kamar.</p>
        </div>
    </div>

    <!-- Upload Card -->
    <div class="bg-white rounded-2xl border border-stone-200/90 p-6 sm:p-8 shadow-xs">
        <h4 class="font-serif-title text-lg font-bold text-stone-900 mb-4 flex items-center gap-2">
            <i data-lucide="upload-cloud" class="w-5 h-5 text-[#16382B]"></i>
            <span>Unggah Foto Kost Baru</span>
        </h4>

        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- File Input with Preview -->
                <div class="md:col-span-1">
                    <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Pilih File Foto <span class="text-rose-500">*</span></label>
                    <div class="border-2 border-dashed border-stone-300 rounded-2xl p-4 text-center hover:border-[#16382B] transition cursor-pointer relative bg-stone-50/50" onclick="document.getElementById('galleryFileInput').click()">
                        <div id="uploadPlaceholder" class="space-y-2 py-4">
                            <i data-lucide="image-plus" class="w-10 h-10 text-stone-400 mx-auto"></i>
                            <p class="text-xs font-semibold text-stone-600">Klik untuk memilih file foto</p>
                            <span class="text-[11px] text-stone-400 block">JPG, PNG, WEBP (Maks 5MB)</span>
                        </div>
                        <img id="imagePreview" src="#" alt="Pratinjau" class="hidden w-full h-40 object-cover rounded-xl shadow-xs">
                        <input type="file" id="galleryFileInput" name="image" accept="image/*" required class="hidden" onchange="previewUploadImage(this)">
                    </div>
                </div>

                <!-- Fields -->
                <div class="md:col-span-2 space-y-4">
                    <div>
                        <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Judul / Keterangan Foto <span class="text-rose-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Kamar Deluxe Sudut Jendela / Rooftop Sore" required
                            class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-stone-50/30 transition placeholder:text-stone-400">
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">Kategori Foto <span class="text-rose-500">*</span></label>
                        <select name="category" required class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#16382B] focus:border-[#16382B] text-sm bg-white transition">
                            <option value="Kamar">Kamar Tidur</option>
                            <option value="Fasilitas">Fasilitas Bersama (Dapur, Lounge, Coworking)</option>
                            <option value="Eksterior">Eksterior & Area Parkir</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="px-6 py-2.5 bg-[#0B2017] hover:bg-[#16382B] text-amber-200 border border-amber-300/30 text-xs font-semibold rounded-xl shadow-xs transition flex items-center gap-2">
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
            <h4 class="font-serif-title text-xl font-bold text-stone-900">Semua Foto Koleksi ({{ $galleries->total() }} Foto)</h4>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($galleries as $gallery)
            <div class="bg-white rounded-2xl border border-stone-200/90 overflow-hidden shadow-xs hover:shadow-md transition flex flex-col group">
                <div class="relative h-48 bg-stone-100 overflow-hidden">
                    <img src="{{ $gallery->image_path }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute top-3 left-3">
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-[#0B2017]/90 text-amber-200 backdrop-blur-xs border border-amber-300/20">
                            {{ $gallery->category }}
                        </span>
                    </div>
                </div>

                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <h5 class="text-sm font-bold text-stone-900 truncate" title="{{ $gallery->title }}">{{ $gallery->title }}</h5>
                        <p class="text-[11px] text-stone-400 font-mono truncate mt-0.5">{{ $gallery->image_path }}</p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-stone-100 flex items-center justify-between">
                        <a href="{{ $gallery->image_path }}" target="_blank" class="text-xs font-semibold text-[#16382B] hover:underline flex items-center gap-1">
                            <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                            <span>Buka Foto</span>
                        </a>

                        <form action="{{ route('admin.gallery.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Hapus foto ini dari galeri?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-1.5 text-stone-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition" title="Hapus Foto">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-12 text-center text-stone-400 text-xs">
                Belum ada foto dalam galeri. Silakan unggah foto kost di atas.
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
