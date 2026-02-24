<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plot extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'plot_number',
        'area_sqft',
        'total_price',
        'status',
        'image',
        'description',
    ];

    protected $casts = [
        'area_sqft' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    /**
     * Determine if the plot is a corner plot.
     */
    public function getIsCornerAttribute(): bool
    {
        $cornerPlots = [8, 21, 51, 44, 43, 36, 35, 28];
        $plotNumber = (int) preg_replace('/\D+/', '', (string) $this->plot_number);

        return in_array($plotNumber, $cornerPlots, true);
    }

    /**
     * Get rate per sqft based on corner/offer rules.
     */
    public function getRatePerSqftAttribute(): float
    {
        if ($this->isSold()) {
            return 1500.0;
        }

        if ($this->is_corner) {
            return 1800.0;
        }

        return 1500.0;
    }

    /**
     * Get the project that owns this plot
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get leads interested in this plot
     */
    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }

    /**
     * Check if plot is sold
     */
    public function isSold(): bool
    {
        return $this->status === 'sold';
    }

    /**
     * Check if plot is booked
     */
    public function isBooked(): bool
    {
        return $this->status === 'booked';
    }

    /**
     * Check if plot is available
     */
    public function isAvailable(): bool
    {
        return $this->status === 'available';
    }

    /**
     * Auto-calculate total price when area or project changes
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($plot) {
            if ($plot->project_id && $plot->area_sqft) {
                $project = Project::find($plot->project_id);
                if ($project) {
                    $plot->total_price = $plot->area_sqft * $project->price_per_sqft;
                }
            }
        });

        static::updating(function ($plot) {
            if ($plot->isDirty('area_sqft') || $plot->isDirty('project_id')) {
                $project = Project::find($plot->project_id);
                if ($project) {
                    $plot->total_price = $plot->area_sqft * $project->price_per_sqft;
                }
            }
        });
    }
}
