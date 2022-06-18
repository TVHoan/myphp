<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Access;
use App\Models\profile;
use App\Models\post;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   /**
    * Get the user associated with the User
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
   public function access(): HasOne
   {
       return $this->hasOne(Access::class, 'id', 'access_id');
   }

   public function profile(): HasOne
   {
       return $this->hasOne(profile::class, 'id', 'profile_id');
   }

   /**
    * Get all of the comments for the User
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function comments()
   {
       return $this->hasMany(comment::class);
   }


   /**
    * Get all of the comments for the User
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function posts()
   {
       return $this->hasMany(post::class);
   }
/**
 * Get the user that owns the User
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */

}
