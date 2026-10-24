<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Room;
use App\Models\Setting;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::current();
        $rooms = Room::orderBy('price_monthly', 'desc')->get();
        $featuredRooms = Room::where('is_featured', true)->get();

        // Count available rooms
        $availableUnitsCount = Room::where('is_available', true)->sum('available_units');

        // Facilities structure
        $facilities = [
            [
                'category' => 'Fasilitas Kamar',
                'icon' => 'bed',
                'items' => [
                    ['title' => 'AC Dingin & Terawat', 'desc' => 'Setiap kamar ber-AC untuk istirahat nyaman'],
                    ['title' => 'Kamar Mandi Pribadi', 'desc' => 'Tersedia water heater air panas 24 jam'],
                    ['title' => 'Springbed & Linen Berkualitas', 'desc' => 'Kasur empuk orthopedic untuk tidur lelap'],
                    ['title' => 'Meja Kerja & Kursi Ergonomis', 'desc' => 'Ideal untuk WFH, tugas kantor, atau kuliah'],
                    ['title' => 'Lemari Pakaian Luas', 'desc' => 'Dilengkapi cermin full body & gantungan baju'],
                    ['title' => 'Jendela & Ventilasi Segar', 'desc' => 'Sirkulasi udara alami dan pencahayaan matahari'],
                ]
            ],
            [
                'category' => 'Fasilitas Bersama',
                'icon' => 'home',
                'items' => [
                    ['title' => 'Dapur Bersama Modern', 'desc' => 'Kompor gas, kulkas 2 pintu, microwave & peralatan masak'],
                    ['title' => 'Dispenser Air Minum Gratis', 'desc' => 'Air mineral galon RO panas dan dingin unlimited'],
                    ['title' => 'Ruang Santai & Coworking', 'desc' => 'Meja panjang & sofa empuk untuk kerja dan sosialisasi'],
                    ['title' => 'Area Cuci & Jemur Pakaian', 'desc' => 'Mesin cuci otomatis dan jemuran beratap terlindung hujan'],
                    ['title' => 'Parkir Motor & Mobil Aman', 'desc' => 'Area parkir beratap luas di dalam pagar tertutup'],
                    ['title' => 'Rooftop Gazebo', 'desc' => 'Spot santai sore hari menikmati pemandangan kota'],
                ]
            ],
            [
                'category' => 'Keamanan & Kebersihan',
                'icon' => 'shield',
                'items' => [
                    ['title' => 'CCTV 24 Jam Nonstop', 'desc' => 'Kamera pengawas di semua sudut lorong dan parkiran'],
                    ['title' => 'Akses Smart Card / Pin Lock', 'desc' => 'Pintu gerbang dan utama menggunakan akses kartu'],
                    ['title' => 'Penjaga Kost Standby', 'desc' => 'Petugas siap membantu kebutuhan darurat penghuni'],
                    ['title' => 'Pembersihan Rutin Gratis', 'desc' => 'Area komunal dibersihkan setiap hari oleh staf'],
                    ['title' => 'WiFi Fiber Optic 100 Mbps', 'desc' => 'Koneksi stabil di setiap lantai dengan router terpisah'],
                    ['title' => 'Alat Pemadam Api (APAR)', 'desc' => 'Tersedia di setiap lantai untuk keamanan darurat'],
                ]
            ]
        ];

        // Testimonials
        $testimonials = [
            [
                'name' => 'Fikri Aditya',
                'role' => 'Software Engineer (Karyawan SCBD)',
                'avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80',
                'rating' => 5,
                'comment' => 'Sudah 1 tahun tinggal di sini. Suasananya tenang banget buat WFH, WiFi super ngebut dan gak pernah drop. Penjaga kostnya ramah dan gercep kalau ada kendala.',
                'room' => 'Deluxe Queen Suite'
            ],
            [
                'name' => 'Nadia Rahmawati',
                'role' => 'Management Trainee Bank Swasta',
                'avatar' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&auto=format&fit=crop&q=80',
                'rating' => 5,
                'comment' => 'Lokasinya sangat strategis, cuma 5 menit jalan kaki ke halte busway. Kamar mandinya bersih banget dan ada water heater. Sangat recommended untuk perempuan karena aman!',
                'room' => 'Superior Comfort Single'
            ],
            [
                'name' => 'Rian Ramadhan',
                'role' => 'Mahasiswa Magister',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80',
                'rating' => 5,
                'comment' => 'Dapur bersamanya lengkap banget, dispenser dan kulkas selalu bersih. Parkir motor juga lega dan aman karena gerbang selalu terkunci dengan smart lock.',
                'room' => 'Deluxe Queen Suite'
            ]
        ];

        // Gallery Items
        $gallery = Gallery::latest()->get()->map(function ($g) {
            return [
                'title' => $g->title,
                'category' => $g->category,
                'image' => $g->image_path,
            ];
        });

        if ($gallery->isEmpty()) {
            $gallery = collect([
                ['title' => 'Tampak Depan & Parkiran Kost', 'category' => 'Eksterior', 'image' => '/images/kost/exterior.jpg'],
                ['title' => 'Kamar Tipe Deluxe Queen', 'category' => 'Kamar', 'image' => '/images/kost/deluxe.jpg'],
                ['title' => 'Dapur Bersama & Coworking Dining', 'category' => 'Fasilitas', 'image' => '/images/kost/communal.jpg'],
                ['title' => 'Kamar Tipe Superior Comfort', 'category' => 'Kamar', 'image' => '/images/kost/superior.jpg'],
            ]);
        }

        return view('home', compact('setting', 'rooms', 'featuredRooms', 'availableUnitsCount', 'facilities', 'testimonials', 'gallery'));
    }

    public function roomDetail(Room $room)
    {
        return response()->json([
            'room' => $room,
            'formatted_monthly' => $room->formatted_price_monthly,
            'formatted_yearly' => $room->formatted_price_yearly,
        ]);
    }

    public function storeSurvey(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'room_id' => 'nullable|exists:rooms,id',
            'survey_date' => 'required|date|after_or_equal:today',
            'survey_time' => 'required|string',
            'duration_plan' => 'required|string',
            'notes' => 'nullable|string|max:500',
        ]);

        $room = null;
        if (!empty($validated['room_id'])) {
            $room = Room::find($validated['room_id']);
            $validated['room_type_interest'] = $room->name;
        }

        $survey = Survey::create($validated);
        $setting = Setting::current();

        // Build WhatsApp text
        $roomName = $room ? $room->name : 'Kamar Kost';
        $message = "Halo Admin {$setting->kost_name},\n\nSaya ingin konfirmasi pengajuan survey kost:\n"
            . "• Nama: {$survey->name}\n"
            . "• No. WhatsApp: {$survey->phone}\n"
            . "• Tipe Kamar: {$roomName}\n"
            . "• Rencana Tanggal: " . \Carbon\Carbon::parse($survey->survey_date)->translatedFormat('d F Y') . "\n"
            . "• Waktu Kunjungan: {$survey->survey_time}\n"
            . "• Rencana Sewa: {$survey->duration_plan}\n"
            . ($survey->notes ? "• Catatan: {$survey->notes}\n\n" : "\n")
            . "Mohon info ketersediaan slot survey tersebut. Terima kasih!";

        $cleanAdminPhone = preg_replace('/[^0-9]/', '', $setting->phone_wa);
        if (str_starts_with($cleanAdminPhone, '0')) {
            $cleanAdminPhone = '62' . substr($cleanAdminPhone, 1);
        }

        $waUrl = "https://wa.me/{$cleanAdminPhone}?text=" . rawurlencode($message);

        return redirect()->back()
            ->with('success', 'Jadwal survey Anda berhasil dikirim! Tim kami akan segera menghubungi Anda.')
            ->with('wa_url', $waUrl);
    }
}
