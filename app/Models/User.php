<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Get the user bed reports.
     */
    public function bedReports(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BedReport::class);
    }

    /**
     * Get the user vaccine reports.
     */
    public function vaccineReports(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(VaccineReport::class);
    }

    /**
     * Get the user case reports.
     */
    public function caseReports(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CaseReport::class);
    }

    /**
     * Get the user report verifications.
     */
    public function reportVerifications(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ReportVerification::class);
    }


}
