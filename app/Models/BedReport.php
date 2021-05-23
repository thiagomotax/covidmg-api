<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedReport extends Model
{
    use HasFactory;
    protected $table = 'bed_reports';

    protected $guarded = ['created_at', 'updated_at'];

    /**
     * Get the user that owns the bed report.
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the county that owns the bad report.
     */
    public function county(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(County::class);
    }
}
