<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'room_id',
        'room_type_interest',
        'survey_date',
        'survey_time',
        'duration_plan',
        'notes',
        'status',
    ];

    protected $casts = [
        'survey_date' => 'date',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function getWhatsappUrlAttribute(): string
    {
        $cleanPhone = preg_replace('/[^0-9]/', '', $this->phone);
        if (str_starts_with($cleanPhone, '0')) {
            $cleanPhone = '62' . substr($cleanPhone, 1);
        }
        $roomName = $this->room ? $this->room->name : ($this->room_type_interest ?: 'Kamar Kost');
        $text = rawurlencode("Halo Kak {$this->name}, kami dari pengelola Kost Senopati Residence terkait jadwal survey Anda untuk {$roomName} pada tanggal " . ($this->survey_date ? $this->survey_date->format('d M Y') : '') . ". Apakah ada yang bisa kami bantu?");
        return "https://wa.me/{$cleanPhone}?text={$text}";
    }
}
