<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'project_id',
        'scheduled_date',
        'customer_name',
        'customer_email',
        'customer_phone',
        'status',
        'notes',
        'reminder_sent_at',
    ];

    protected $casts = [
        'scheduled_date' => 'datetime',
        'reminder_sent_at' => 'datetime',
    ];

    /**
     * Get the lead associated with the site visit
     */
    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }

    /**
     * Get the project associated with the site visit
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
