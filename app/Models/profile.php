<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasOne;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\country;

class profile extends Model
{
    use HasFactory;
    /**
     * Get the user that owns the profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'profile_id', 'id');
    }
    /**
     * Get the user associated with the profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function country(): HasOne
    {
        return $this->hasOne(country::class, 'id', 'country_id');
    }
}
