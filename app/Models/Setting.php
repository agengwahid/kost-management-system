<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'kost_name',
        'tagline',
        'phone_wa',
        'email',
        'address',
        'city',
        'map_embed_url',
        'rules',
        'strategic_locations',
        'pricing_extra',
    ];

    protected $casts = [
        'rules' => 'array',
        'strategic_locations' => 'array',
        'pricing_extra' => 'array',
    ];

    public static function current(): self
    {
        return static::first() ?? static::create([
            'kost_name' => 'Kost Eksklusif Senopati Residence',
            'tagline' => 'Hunian Kost Modern, Nyaman & Strategis di Pusat Kota',
            'phone_wa' => '6281234567890',
            'email' => 'info@kostsenopati.com',
            'address' => 'Jl. Senopati Raya No. 45, Senayan, Kebayoran Baru, Jakarta Selatan',
            'city' => 'Jakarta Selatan',
            'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2736465481716!2d106.80556277573165!3d-6.227606093760431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1505c879953%3A0x6b2b733737b83ebc!2sSenopati%2C%20Kec.%20Kby.%20Baru%2C%20Kota%20Jakarta%20Selatan!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid',
            'rules' => [
                'Wajib menjaga ketertiban, ketenangan, dan kebersihan lingkungan kost',
                'Jam berkunjung tamu hingga pukul 22:00 WIB di ruang tamu / area bersama',
                'Dilarang membawa hewan peliharaan tanpa izin pengelola',
                'Dilarang merokok di dalam kamar ber-AC',
                'Parkir kendaraan pada area yang telah ditentukan secara rapi',
                'Pembayaran sewa dilakukan tepat waktu setiap tanggal jatuh tempo',
            ],
            'strategic_locations' => [
                ['name' => 'Halte TransJakarta / MRT Senayan', 'distance' => '5 Menit Jalan Kaki', 'icon' => 'train'],
                ['name' => 'Kawasan Bisnis SCBD Sudirman', 'distance' => '7 Menit Berkendara', 'icon' => 'building'],
                ['name' => 'Pacific Place Mall & Senayan City', 'distance' => '10 Menit Berkendara', 'icon' => 'shopping-bag'],
                ['name' => 'Minimarket & Kuliner Senopati', 'distance' => '2 Menit Jalan Kaki', 'icon' => 'coffee'],
                ['name' => 'RS Siloam & Apotek 24 Jam', 'distance' => '8 Menit Berkendara', 'icon' => 'activity'],
            ],
            'pricing_extra' => [
                ['name' => 'Parkir Mobil', 'price' => 250000, 'unit' => 'bulan'],
                ['name' => 'Laundry Express (Kiloan)', 'price' => 150000, 'unit' => 'bulan'],
                ['name' => 'Extra Bed / Tamu Menginap', 'price' => 50000, 'unit' => 'malam'],
            ]
        ]);
    }
}
