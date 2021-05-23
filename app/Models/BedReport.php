<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BedReport
 *
 * @property int $id
 * @property int $county_id
 * @property int $user_id
 * @property int $available
 * @property int $busy
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\County $county
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|BedReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BedReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BedReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|BedReport whereAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BedReport whereBusy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BedReport whereCountyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BedReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BedReport whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BedReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BedReport whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BedReport whereUserId($value)
 * @mixin \Eloquent
 */
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
