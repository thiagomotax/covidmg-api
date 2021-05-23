<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;
    protected $table = 'counties';

    protected $guarded = ['created_at', 'updated_at'];


    /**
     * Get the microregion that owns the county.
     */
    public function microregion(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Microregion::class);
    }

    /**
     * Get the county alerts.
     */
    public function alerts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Alert::class);
    }

    /**
     * Get the county bed reports.
     */
    public function bedReports(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BedReport::class);
    }

    /**
     * Get the county vaccine reports.
     */
    public function vaccineReports(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(VaccineReport::class);
    }

    /**
     * Get the county report verifications.
     */
    public function reportVerifications(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ReportVerification::class);
    }

    /**
     * Get the county case reports.
     */
    public function caseReports(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CaseReport::class);
    }
}
