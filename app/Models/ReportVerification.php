<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ReportVerification
 *
 * @property-read \App\Models\CaseReport $caseReport
 * @property-read \App\Models\County $county
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ReportVerification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportVerification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportVerification query()
 * @mixin \Eloquent
 */
class ReportVerification extends Model
{
    use HasFactory;
    protected $table = 'report_verifications';

    protected $guarded = ['created_at', 'updated_at'];

    /**
     * Get the county that owns the report verification.
     */
    public function county(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(County::class);
    }

    /**
     * Get the user that owns the report verification.
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the parent reportable model (case_report, bed_report or vaccine_report).
     */
    public function reportable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'reportable_type', 'reportable_id');
    }
}
