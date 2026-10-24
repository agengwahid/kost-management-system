<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->paginate(10);
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        $availableImages = Gallery::latest()->get();
        return view('admin.rooms.create', compact('availableImages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'type' => 'required|string|in:Deluxe,Superior,Standard',
            'gender_type' => 'required|string|in:Campur,Putra,Putri',
            'price_monthly' => 'required|integer|min:100000',
            'price_yearly' => 'nullable|integer',
            'size' => 'required|string|max:50',
            'bed_type' => 'required|string|max:100',
            'bathroom_type' => 'required|string|max:100',
            'electricity' => 'required|string|max:100',
            'total_units' => 'required|integer|min:1',
            'available_units' => 'required|integer|min:0',
            'thumbnail' => 'nullable|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'gallery_files.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'facilities' => 'nullable|string',
            'description' => 'required|string',
        ]);

        $destinationPath = public_path('images/kost');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Handle direct upload of main thumbnail
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $fileName = 'room_' . Str::slug($validated['name']) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $validated['thumbnail'] = '/images/kost/' . $fileName;

            // Also register into Gallery for reuse
            Gallery::create([
                'title' => $validated['name'],
                'category' => 'Kamar',
                'image_path' => $validated['thumbnail'],
            ]);
        } else {
            $validated['thumbnail'] = $validated['thumbnail'] ?: '/images/kost/deluxe.jpg';
        }

        $validated['slug'] = Str::slug($validated['name']) . '-' . rand(100, 999);
        $validated['is_available'] = $validated['available_units'] > 0;
        $validated['is_featured'] = $request->boolean('is_featured');

        // Parse facilities
        if (!empty($validated['facilities'])) {
            $validated['facilities'] = array_values(array_filter(array_map('trim', explode("\n", str_replace("\r", "", $validated['facilities'])))));
        } else {
            $validated['facilities'] = ['AC', 'Kamar Mandi Dalam', 'Kasur Springbed', 'WiFi High Speed'];
        }

        // Handle gallery images
        $gallery = [$validated['thumbnail']];
        if ($request->hasFile('gallery_files')) {
            foreach ($request->file('gallery_files') as $idx => $gFile) {
                $gName = 'gallery_' . Str::slug($validated['name']) . '_' . time() . '_' . $idx . '.' . $gFile->getClientOriginalExtension();
                $gFile->move($destinationPath, $gName);
                $gPath = '/images/kost/' . $gName;
                $gallery[] = $gPath;

                Gallery::create([
                    'title' => $validated['name'] . ' - Detail ' . ($idx + 1),
                    'category' => 'Kamar',
                    'image_path' => $gPath,
                ]);
            }
        } else {
            $gallery[] = '/images/kost/communal.jpg';
            $gallery[] = '/images/kost/exterior.jpg';
        }
        $validated['gallery'] = array_values(array_unique($gallery));

        Room::create($validated);

        return redirect()->route('admin.rooms.index')->with('success', 'Kamar baru dan foto berhasil ditambahkan!');
    }

    public function edit(Room $room)
    {
        $availableImages = Gallery::latest()->get();
        return view('admin.rooms.edit', compact('room', 'availableImages'));
    }

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'type' => 'required|string|in:Deluxe,Superior,Standard',
            'gender_type' => 'required|string|in:Campur,Putra,Putri',
            'price_monthly' => 'required|integer|min:100000',
            'price_yearly' => 'nullable|integer',
            'size' => 'required|string|max:50',
            'bed_type' => 'required|string|max:100',
            'bathroom_type' => 'required|string|max:100',
            'electricity' => 'required|string|max:100',
            'total_units' => 'required|integer|min:1',
            'available_units' => 'required|integer|min:0',
            'thumbnail' => 'nullable|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'gallery_files.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'facilities' => 'nullable|string',
            'description' => 'required|string',
        ]);

        $destinationPath = public_path('images/kost');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Handle uploaded new thumbnail
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $fileName = 'room_' . Str::slug($validated['name']) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $validated['thumbnail'] = '/images/kost/' . $fileName;

            Gallery::create([
                'title' => $validated['name'],
                'category' => 'Kamar',
                'image_path' => $validated['thumbnail'],
            ]);
        } elseif (!empty($validated['thumbnail'])) {
            $validated['thumbnail'] = $validated['thumbnail'];
        }

        $validated['is_available'] = $validated['available_units'] > 0;
        $validated['is_featured'] = $request->boolean('is_featured');

        if (!empty($validated['facilities'])) {
            $validated['facilities'] = array_values(array_filter(array_map('trim', explode("\n", str_replace("\r", "", $validated['facilities'])))));
        }

        // Handle additional gallery files
        $gallery = is_array($room->gallery) ? $room->gallery : [$room->thumbnail];
        if ($request->hasFile('gallery_files')) {
            foreach ($request->file('gallery_files') as $idx => $gFile) {
                $gName = 'gallery_' . Str::slug($validated['name']) . '_' . time() . '_' . $idx . '.' . $gFile->getClientOriginalExtension();
                $gFile->move($destinationPath, $gName);
                $gPath = '/images/kost/' . $gName;
                $gallery[] = $gPath;

                Gallery::create([
                    'title' => $validated['name'] . ' - Detail ' . ($idx + 1),
                    'category' => 'Kamar',
                    'image_path' => $gPath,
                ]);
            }
        }
        if (!empty($validated['thumbnail'])) {
            array_unshift($gallery, $validated['thumbnail']);
        }
        $validated['gallery'] = array_values(array_unique($gallery));

        $room->update($validated);

        return redirect()->route('admin.rooms.index')->with('success', 'Data kamar dan gambar berhasil diperbarui!');
    }

    public function toggleAvailability(Room $room)
    {
        $room->is_available = !$room->is_available;
        if (!$room->is_available) {
            $room->available_units = 0;
        } elseif ($room->available_units == 0) {
            $room->available_units = 1;
        }
        $room->save();

        $status = $room->is_available ? 'Tersedia' : 'Penuh';
        return redirect()->back()->with('success', "Status kamar berhasil diubah menjadi {$status}!");
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Kamar berhasil dihapus!');
    }
}
