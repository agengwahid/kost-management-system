<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(16);
        $categories = ['Kamar', 'Fasilitas', 'Eksterior', 'Lainnya'];
        return view('admin.gallery.index', compact('galleries', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'category' => 'required|string|in:Kamar,Fasilitas,Eksterior,Lainnya',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $file = $request->file('image');
        $fileName = 'kost_' . Str::slug($request->title) . '_' . time() . '.' . $file->getClientOriginalExtension();
        
        $destinationPath = public_path('images/kost');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $fileName);
        $imagePath = '/images/kost/' . $fileName;

        Gallery::create([
            'title' => $request->title,
            'category' => $request->category,
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Foto baru berhasil diunggah ke koleksi galeri kost!');
    }

    public function destroy(Gallery $gallery)
    {
        // Remove file if exists and not default
        $filePath = public_path(ltrim($gallery->image_path, '/'));
        $defaultFiles = ['deluxe.jpg', 'superior.jpg', 'exterior.jpg', 'communal.jpg'];
        $baseName = basename($filePath);

        if (file_exists($filePath) && !in_array($baseName, $defaultFiles)) {
            @unlink($filePath);
        }

        $gallery->delete();

        return redirect()->back()->with('success', 'Foto berhasil dihapus dari galeri!');
    }
}
