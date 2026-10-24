<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin Account
        User::updateOrCreate(
            ['email' => 'admin@kost.com'],
            [
                'name' => 'Pengelola Kost Senopati',
                'password' => bcrypt('password123'),
            ]
        );

        // Settings
        \App\Models\Setting::current();

        // Seed Rooms
        $room1 = \App\Models\Room::updateOrCreate(
            ['slug' => 'deluxe-queen-suite'],
            [
                'name' => 'Kamar Deluxe Queen Suite',
                'type' => 'Deluxe',
                'gender_type' => 'Campur',
                'price_monthly' => 2500000,
                'price_yearly' => 28000000,
                'size' => '4 x 4.5 m',
                'bed_type' => 'Queen Bed (160x200)',
                'bathroom_type' => 'Kamar Mandi Dalam + Water Heater',
                'electricity' => 'Token Mandiri',
                'total_units' => 6,
                'available_units' => 2,
                'is_available' => true,
                'is_featured' => true,
                'thumbnail' => '/images/kost/deluxe.jpg',
                'gallery' => [
                    '/images/kost/deluxe.jpg',
                    '/images/kost/exterior.jpg',
                    '/images/kost/communal.jpg',
                ],
                'facilities' => [
                    'AC 1 PK Daikin Hemat Energi',
                    'Kamar Mandi Dalam + Shower & Closet Duduk',
                    'Water Heater Air Panas 24 Jam',
                    'Kasur Queen Orthopedic + Sprei Lembut',
                    'Smart TV 32" Full HD (Netflix Ready)',
                    'Meja Kerja Ergonomis & Kursi Putar',
                    'Lemari Pakaian 2 Pintu Full Cermin',
                    'High-Speed WiFi Fiber 100 Mbps',
                    'Jendela Menghadap Taman Luar',
                    'Free Cleaning Kamar 2x per Bulan',
                ],
                'description' => 'Kamar tipe Deluxe Queen Suite dirancang khusus untuk kenyamanan maksimal bagi profesional muda, pekerja remote, dan eksekutif. Kamar tidur berukuran lapang dengan pencahayaan alami melimpah, kasur Queen-size premium, meja kerja nyaman dengan ambient LED lighting, serta kamar mandi dalam modern berpemanas air.',
            ]
        );

        $room2 = \App\Models\Room::updateOrCreate(
            ['slug' => 'superior-comfort-single'],
            [
                'name' => 'Kamar Superior Comfort Single',
                'type' => 'Superior',
                'gender_type' => 'Campur',
                'price_monthly' => 1850000,
                'price_yearly' => 20500000,
                'size' => '3.5 x 4 m',
                'bed_type' => 'Single Bed (120x200)',
                'bathroom_type' => 'Kamar Mandi Dalam',
                'electricity' => 'Token Mandiri',
                'total_units' => 8,
                'available_units' => 1,
                'is_available' => true,
                'is_featured' => true,
                'thumbnail' => '/images/kost/superior.jpg',
                'gallery' => [
                    '/images/kost/superior.jpg',
                    '/images/kost/communal.jpg',
                    '/images/kost/exterior.jpg',
                ],
                'facilities' => [
                    'AC 1/2 PK Dingin & Hemat Listrik',
                    'Kamar Mandi Dalam Bersih & Rapi',
                    'Kasur Single Springbed Nyaman',
                    'Meja Belajar / Kerja Kayu Solid',
                    'Lemari Pakaian Minimalis',
                    'High-Speed WiFi Fiber 100 Mbps',
                    'Ventilasi Udara Segar & Jendela Luar',
                    'Stop Kontak Banyak untuk Gadget',
                ],
                'description' => 'Pilihan ideal bagi mahasiswa dan karyawan yang mengutamakan privasi dan efisiensi. Dilengkapi AC dingin, kamar mandi pribadi, meja kerja menghadap jendela, dan koneksi internet super cepat tanpa hambatan untuk bekerja maupun istirahat berkualitas.',
            ]
        );

        $room3 = \App\Models\Room::updateOrCreate(
            ['slug' => 'standard-cozy'],
            [
                'name' => 'Kamar Standard Cozy',
                'type' => 'Standard',
                'gender_type' => 'Campur',
                'price_monthly' => 1350000,
                'price_yearly' => 15000000,
                'size' => '3 x 3.5 m',
                'bed_type' => 'Single Bed (100x200)',
                'bathroom_type' => 'Kamar Mandi Luar (Rasio 1:2)',
                'electricity' => 'Sudah Termasuk Listrik',
                'total_units' => 4,
                'available_units' => 0,
                'is_available' => false,
                'is_featured' => false,
                'thumbnail' => '/images/kost/deluxe.jpg',
                'gallery' => [
                    '/images/kost/deluxe.jpg',
                    '/images/kost/communal.jpg',
                ],
                'facilities' => [
                    'AC 1/2 PK',
                    'Kasur Single Foam Empuk',
                    'Meja & Kursi Minimalis',
                    'Lemari Pakaian 1 Pintu',
                    'High-Speed WiFi 100 Mbps',
                    'Kamar Mandi Luar Dibersihkan Rutin Setiap Hari',
                    'Biaya Listrik Pemakaian Wajar Sudah Termasuk',
                ],
                'description' => 'Kamar bernuansa hangat dengan harga sangat bersahabat tanpa mengurangi kenyamanan tinggal di pusat kota. Akses ke dapur bersama, kulkas, dispenser air minum, dan area santai tetap dapat dinikmati sepuasnya.',
            ]
        );

        // Seed Sample Surveys
        \App\Models\Survey::updateOrCreate(
            ['phone' => '081298765432'],
            [
                'name' => 'Dimas Prasetyo',
                'room_id' => $room1->id,
                'room_type_interest' => 'Deluxe Queen Suite',
                'survey_date' => now()->addDays(2)->format('Y-m-d'),
                'survey_time' => '14:00 WIB',
                'duration_plan' => '6 Bulan',
                'notes' => 'Bawa motor, butuh slot parkir motor yang aman.',
                'status' => 'pending',
            ]
        );

        \App\Models\Survey::updateOrCreate(
            ['phone' => '085711223344'],
            [
                'name' => 'Sarah Amanda',
                'room_id' => $room2->id,
                'room_type_interest' => 'Superior Comfort Single',
                'survey_date' => now()->addDay()->format('Y-m-d'),
                'survey_time' => '10:30 WIB',
                'duration_plan' => '1 Tahun',
                'notes' => 'Rencana masuk awal bulan depan, ingin lihat kamar langsung besok.',
                'status' => 'confirmed',
            ]
        );

        // Seed Galleries
        $defaultGalleries = [
            ['title' => 'Tampak Depan & Area Parkir', 'category' => 'Eksterior', 'image_path' => '/images/kost/exterior.jpg'],
            ['title' => 'Kamar Deluxe Queen Suite', 'category' => 'Kamar', 'image_path' => '/images/kost/deluxe.jpg'],
            ['title' => 'Kamar Superior Comfort', 'category' => 'Kamar', 'image_path' => '/images/kost/superior.jpg'],
            ['title' => 'Dapur Bersama & Coworking Dining', 'category' => 'Fasilitas', 'image_path' => '/images/kost/communal.jpg'],
        ];

        foreach ($defaultGalleries as $g) {
            \App\Models\Gallery::updateOrCreate(
                ['image_path' => $g['image_path']],
                ['title' => $g['title'], 'category' => $g['category']]
            );
        }
    }
}
