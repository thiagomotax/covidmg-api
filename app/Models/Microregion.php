<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
