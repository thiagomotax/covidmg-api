<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CaseReport
 *
 * @property int $id
 * @property int $county_id
 * @property int $user_id
 * @property int $suspect
 * @property int $confirmed
 * @property int $discarded
 * @property int $death
 * @property int $recovered
 * @property string $souce
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\County $county
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReportVerification[] $reportVerifications
 * @property-read int|null $report_verifications_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|CaseReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CaseReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CaseReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|CaseReport whereConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseReport whereCountyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseReport whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseReport whereDeath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseReport whereDiscarded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseReport whereRecovered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseReport whereSouce($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseReport whereSuspect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseReport whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseReport whereUserId($value)
 * @mixin \Eloquent
 */
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
