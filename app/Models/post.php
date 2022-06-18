<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;
use App\Models\comment;
use Illuminate\Database\Eloquent\Relations\HasOne;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class post extends Model
{
    use HasFactory;
/**
 * Get the user that owns the post
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function category(): BelongsTo
{
    return $this->belongsTo(category::class, 'category_id', 'id');
}

    /**
     * Get the user associated with the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

         
        public function user()
        {
            return $this->belongsTo(User::class, 'user_id', 'id');
        }
    
    /**
     * Get all of the comments for the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(comment::class);
    }

}
