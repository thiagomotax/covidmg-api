<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Microregion
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\County[] $counties
 * @property-read int|null $counties_count
 * @method static \Illuminate\Database\Eloquent\Builder|Microregion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Microregion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Microregion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Microregion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Microregion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Microregion whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Microregion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Microregion extends Model
{
    use HasFactory;
    protected $table = 'microregions';

    protected $guarded = ['created_at', 'updated_at'];

    /**
     * Get the microregion counties.
     */
    public function counties(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(County::class);
    }
}
