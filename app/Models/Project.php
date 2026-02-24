<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'description',
        'featured_image',
        'gallery_images',
        'video_url',
        'brochure_pdf',
        'price_per_sqft',
        'total_plots',
        'status',
    ];

    protected $casts = [
        'price_per_sqft' => 'decimal:2',
        'total_plots' => 'integer',
        'gallery_images' => 'array',
    ];

    /**
     * Get all plots for this project
     */
    public function plots(): HasMany
    {
        return $this->hasMany(Plot::class);
    }

    /**
     * Get project statistics
     */
    public function getStatsAttribute(): array
    {
        return [
            'total' => $this->plots()->count(),
            'available' => $this->plots()->where('status', 'available')->count(),
            'booked' => $this->plots()->where('status', 'booked')->count(),
            'sold' => $this->plots()->where('status', 'sold')->count(),
        ];
    }
}
