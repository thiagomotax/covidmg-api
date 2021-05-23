<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\County
 *
 * @property int $id
 * @property int $microregion_id
 * @property string $name
 * @property int $population
 * @property string $facebook
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Alert[] $alerts
 * @property-read int|null $alerts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BedReport[] $bedReports
 * @property-read int|null $bed_reports_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CaseReport[] $caseReports
 * @property-read int|null $case_reports_count
 * @property-read \App\Models\Microregion $microregion
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReportVerification[] $reportVerifications
 * @property-read int|null $report_verifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VaccineReport[] $vaccineReports
 * @property-read int|null $vaccine_reports_count
 * @method static \Illuminate\Database\Eloquent\Builder|County newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|County newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|County query()
 * @method static \Illuminate\Database\Eloquent\Builder|County whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|County whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|County whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|County whereMicroregionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|County whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|County wherePopulation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|County whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
