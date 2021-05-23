<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineReport extends Model
{
    use HasFactory;
    protected $table = 'vaccine_reports';

    protected $guarded = ['created_at', 'updated_at'];

    /**
     * Get the user that owns the vaccine report.
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the county that owns the vaccine report.
     */
    public function county(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(County::class);
    }
}
