<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'type',
        'gender_type',
        'price_monthly',
        'price_yearly',
        'size',
        'bed_type',
        'bathroom_type',
        'electricity',
        'total_units',
        'available_units',
        'is_available',
        'is_featured',
        'thumbnail',
        'gallery',
        'facilities',
        'description',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'is_featured' => 'boolean',
        'facilities' => 'array',
        'gallery' => 'array',
        'price_monthly' => 'integer',
        'price_yearly' => 'integer',
        'total_units' => 'integer',
        'available_units' => 'integer',
    ];

    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }

    public function getFormattedPriceMonthlyAttribute(): string
    {
        return 'Rp ' . number_format($this->price_monthly, 0, ',', '.');
    }

    public function getFormattedPriceYearlyAttribute(): string
    {
        return $this->price_yearly ? 'Rp ' . number_format($this->price_yearly, 0, ',', '.') : '-';
    }
}
