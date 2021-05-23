<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseReport extends Model
{
    use HasFactory;
    protected $table = 'case_reports';

    protected $guarded = ['created_at', 'updated_at'];

    /**
     * Get the user that owns the case report.
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the county that owns the case report.
     */
    public function county(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(County::class);
    }

    /**
     * Get the case report report verifications.
     */
    public function reportVerifications(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ReportVerification::class);
    }
}
