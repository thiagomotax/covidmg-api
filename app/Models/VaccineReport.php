<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\VaccineReport
 *
 * @property int $id
 * @property int $county_id
 * @property int $user_id
 * @property int $first_dose
 * @property int $second_dose
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\County $county
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|VaccineReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VaccineReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VaccineReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|VaccineReport whereCountyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccineReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccineReport whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccineReport whereFirstDose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccineReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccineReport whereSecondDose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccineReport whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccineReport whereUserId($value)
 * @mixin \Eloquent
 */
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
